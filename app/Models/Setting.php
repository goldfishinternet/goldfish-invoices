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
        'company_name',
        'city',
        'primary_contact',
        'currency_symbol',
    ];

    public $filterable = [
        'id',
        'invoice_number',
        'date_issued',
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
        'logo_pdf',
        'invoice_note_default',
        'currency_type',
        'currency_symbol',
        'tax_code',
        'tax_1_desc',
        'tax_1_rate',
        'tax_2_desc',
        'tax_2_rate',
        'days_payment_due',
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
