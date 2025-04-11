<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nombre', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items') // Especifica el nombre de la tabla
                    ->withPivot('quantity', 'price'); // Campos adicionales en la tabla intermedia
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
