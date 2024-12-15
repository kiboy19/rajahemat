<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'name',
        'type',
        'category_id',
        'price',
        'min',
        'max',
        'refill',
        'description',
    ];

    /**
     * Mendefinisikan relasi Many-to-One dengan Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
