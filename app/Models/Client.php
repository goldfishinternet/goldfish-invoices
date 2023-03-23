<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'clients';

    public $orderable = [
        'id',
        'name',
    ];

    public $filterable = [
        'id',
        'name',
    ];

    protected $fillable = [
        'name',
        'address_1',
        'address_2',
        'city',
        'region',
        'country',
        'postcode',
        'website',
        'tax_status',
        'client_notes',
        'tax_code',
        'default_tax_1_desc',
        'default_tax_1_rate',
        'default_tax_2_desc',
        'default_tax_2_rate',
        'default_days_payment_due',
        'default_payment_instructions',
        'default_invoice_notes',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invoices() {
        return $this->belongsTo(Client::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
