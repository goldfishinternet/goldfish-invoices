<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'invoice_items';

    public $orderable = [
        'id',
        'invoice_id',
    ];

    public $filterable = [
        'id',
        'invoice_id',
    ];

    protected $fillable = [
        'invoice_id',
        'amount',
        'quantity',
        'work_description',
        'taxable',
    ];

    protected $dates = [
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
