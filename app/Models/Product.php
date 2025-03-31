<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'ingredients', 'aroma',  'Contenido', 'description', 'price', 'image', 'stock'];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products') // Especifica la tabla intermedia
                    ->withPivot('quantity', 'price', 'image')
                    ->withTimestamps();
    }
}

