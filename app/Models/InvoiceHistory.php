<?php

namespace App\Models;

use Carbon\Carbon;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceHistory extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'invoice_histories';

    public $orderable = [
        'id',
        'invoice_id',
        'recipient',
    ];

    public $filterable = [
        'id',
        'invoice_id',
        'recipient',
    ];

    protected $fillable = [
        'invoice_id',
        'recipient',
        'message',
        'send',
        'attach',
        'date_sent',
    ];

    protected $dates = [
        'date_sent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'date_sent' => 'date:d/m/Y'
    ];

    public function invoice() : BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
    public function setDateSentAttribute($value) {
        $this->attributes['date_sent'] = Carbon::createFromFormat('d/m/Y', ($value))->format('Y-m-d');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
