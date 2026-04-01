<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'images',
        'description',
        'price',
        'devise',
        'stock',
        'is_active',
        'category_product_id',
    ];
    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];
    public function category()
    {
       return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }
}
