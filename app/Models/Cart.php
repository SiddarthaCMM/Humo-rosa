<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    // Relación muchos a muchos con Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products') // Especifica la tabla intermedia
                    ->withPivot('quantity', 'price', 'image') // Asegúrate de que estos campos estén en la tabla intermedia
                    ->withTimestamps();
    }
}