<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'settings';

    public $orderable = [
        'id',
        'name',
        'city',
        'primary_contact',
        'currency_symbol',
    ];

    public $filterable = [
        'id',
        'name',
        'city',
        'primary_contact',
        'currency_symbol',
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
        'primary_contact',
        'primary_contact_email',
        'logo',
        'currency_type',
        'currency_symbol',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
