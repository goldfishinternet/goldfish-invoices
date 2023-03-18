<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePayment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'invoice_payments';

    public $orderable = [
        'id',
        'invoice_id',
        'date_paid',
        'amount_paid',
    ];

    public $filterable = [
        'id',
        'invoice_id',
        'date_paid',
        'amount_paid',
    ];

    protected $fillable = [
        'invoice_id',
        'date_paid',
        'amount_paid',
        'payment_note',
    ];

    protected $dates = [
        'date_paid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invoice() : BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
