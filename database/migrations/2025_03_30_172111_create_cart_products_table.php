<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    public function up()
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id(); // ID del producto en el carrito
            $table->foreignId('cart_id')->constrained()->onDelete('cascade'); // Relaciona con el carrito
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relaciona con el producto
            $table->integer('quantity')->default(1); // Cantidad del producto
            $table->decimal('price', 10, 2); // Precio del producto al agregarlo
            $table->string('image'); // Imagen del producto
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}