<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'product_id', 'quantity', 'price', 'image',
    ];

    // Relación con el carrito
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relación con el producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}