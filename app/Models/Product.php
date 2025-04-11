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

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items') // Especifica el nombre de la tabla
                    ->withPivot('quantity', 'price'); // Campos adicionales en la tabla intermedia
    }
}