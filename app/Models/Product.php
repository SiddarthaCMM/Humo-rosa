<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'ingredients', 'aroma', 'Contenido', 'description', 'price', 'image', 'stock'];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products')
                    ->withPivot('quantity', 'price', 'image')
                    ->withTimestamps();
    }

    /**
     * Método para obtener el contenido (por ejemplo, descripción).
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->Contenido ?? ''; // Devuelve el valor del campo 'Contenido'
    }
}