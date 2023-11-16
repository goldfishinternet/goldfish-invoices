<?php

namespace App\Models;

use Carbon\Carbon;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    protected $table = 'invoices';

    protected $appends = array('amount_paid','amount_outstanding','days_overdue','total_no_tax','total_tax_1','total_tax_2','total_with_tax','payment_status');

    public $orderable = [
        'id',
        'invoice_number',
        'date_issued',
    ];

    public $filterable = [
        'id',
        'invoice_number',
        'client.name',
        'date_issued',
    ];

    protected $fillable = [
        'invoice_number',
        'client_id',
        'date_issued',
        'tax_1_desc',
        'tax_1_rate',
        'tax_2_desc',
        'tax_2_rate',
        'days_payment_due',
        'payment_instructions',
        'invoice_notes',
    ];

    protected $dates = [
        'date_issued',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'date_issued' => 'date:d/m/Y'
    ];

    protected $with = [
        'client',
        'invoiceItems',
        'invoicePayments',
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function invoiceItems() : HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function invoiceHistories() : HasMany
    {
        return $this->hasMany(InvoiceHistory::class);
    }

    public function invoicePayments() : HasMany
    {
        return $this->hasMany(InvoicePayment::class);
    }
    public function setDateIssuedAttribute($value) {
        $this->attributes['date_issued'] = Carbon::createFromFormat('d/m/Y', ($value))->format('Y-m-d');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function getAmountPaidAttribute()
    {
        //$amountsPaid = DB::table('invoice_payments')->select( DB::raw('ROUND(SUM(invoice_payments.amount_paid),2) AS amount_paid'))->where('invoice_id','=', $this->id)->get()->first();
        //return $amountsPaid->amount_paid;
        return number_format((float)$this->invoicePayments()->sum("amount_paid"), 2, '.', '');
    }
    protected function getAmountOutstandingAttribute()
    {
        return number_format(abs($this->total_with_tax - $this->amount_paid), 2, '.', '');
    }
    protected function getTotalNoTaxAttribute()
    {
        //$totalsNoTax = DB::table('invoice_items')->select(DB::raw('ROUND(SUM(invoice_items.amount * invoice_items.quantity),2) AS total_no_tax'))->where('invoice_id','=', $this->id)->get()->first();
        //return $totalsNoTax->total_no_tax;
        return number_format((float)$this->invoiceItems->sum(function($invoiceItem) {
          return ($invoiceItem->quantity * $invoiceItem->amount);
        }), 2, '.', '');
    }
    protected function getTotalTax1Attribute()
    {
        //$totalsTax1 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select(DB::raw('ROUND(SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_1_rate/100 * invoice_items.taxable),2) AS total_tax_1'))->where('invoice_id','=', $this->id)->get()->first();
        //return $totalsTax1->total_tax_1;
        return number_format((float)$this->invoiceItems->sum(function($invoiceItem) {
          return (($invoiceItem->quantity * $invoiceItem->amount) * ($this->tax_1_rate/100 * $invoiceItem->taxable));
        }), 2, '.', '');
    }
    protected function getTotalTax2Attribute()
    {
        //$totalsTax2 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select(DB::raw('ROUND(SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_2_rate/100 * invoice_items.taxable),2) AS total_tax_2'))->where('invoice_id','=', $this->id)->get()->first();
        //return $totalsTax2->total_tax_2;
        return number_format((float)$this->invoiceItems->sum(function($invoiceItem) {
          return (($invoiceItem->quantity * $invoiceItem->amount) * ($this->tax_2_rate/100 * $invoiceItem->taxable));
        }), 2, '.', '');
    }
    protected function getTotalWithTaxAttribute()
    {
        //$totalsWithTax = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select(DB::raw('ROUND(SUM(invoice_items.amount * invoice_items.quantity + ROUND((invoice_items.amount * invoice_items.quantity * (invoices.tax_1_rate/100 + invoices.tax_2_rate/100) * invoice_items.taxable), 2)),2) AS total_with_tax'))->where('invoice_id','=', $this->id)->get()->first();
        //return $totalsWithTax->total_with_tax;
        return number_format((float)$this->invoiceItems->sum(function($invoiceItem) {
          return ($invoiceItem->quantity * $invoiceItem->amount) + (($invoiceItem->quantity * $invoiceItem->amount) * ($this->tax_1_rate/100 * $invoiceItem->taxable)) + (($invoiceItem->quantity * $invoiceItem->amount) * ($this->tax_2_rate/100 * $invoiceItem->taxable));
        }), 2, '.', '');
    }
    protected function getDaysOverdueAttribute()
    {
        //$daysOverdue = DB::table('invoices')->select(DB::raw('TO_DAYS(curdate()) - TO_DAYS(invoices.date_issued) AS days_overdue'))->where('id','=', $this->id)->get()->first();
        //return ($daysOverdue!=null)? $daysOverdue->days_overdue: 0;
        $datediff = (time() - strtotime($this->date_issued));
        return (round($datediff / (60 * 60 * 24)) > (int)$this->days_payment_due) ? round($datediff / (60 * 60 * 24)) - (int)$this->days_payment_due: 0;
    }
    protected function getPaymentStatusAttribute()
    {
        if ($this->total_with_tax == 0) {
            return "Draft";
        }
        if ($this->amount_paid >= $this->total_with_tax) {
            return "Paid";
        }
        if ($this->days_overdue > 0) {
            return "Overdue";
        }
        return "Pending";
    }
}
