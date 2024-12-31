<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'link',
        'quantity',
        'price',
        'total',
        'status',
    ];

    /**
     * Relasi dengan User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan Service.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
