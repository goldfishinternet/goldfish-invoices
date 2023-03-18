<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientContact extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'client_contacts';

    public $orderable = [
        'id',
        'first_name',
        'last_name',
        'email',
    ];

    public $filterable = [
        'id',
        'first_name',
        'last_name',
        'email',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'email',
        'phone',
        'mobile',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
