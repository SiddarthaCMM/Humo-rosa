<?php

namespace App\Orchid\Screens;

use App\Models\Product;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class ProductScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'products' => Product::paginate()
        ];
    }

    public function name(): ?string
    {
        return 'Productos';
    }

    public function description(): ?string
    {
        return 'Listado de productos disponibles';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Agregar nuevo producto')
                ->icon('plus')
                ->route('platform.products.create'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('products', [
                TD::make('id', 'ID')
                    ->render(function (Product $product) {
                        return $product->id;  // Mostrar el ID como un valor simple
                    }),

                TD::make('name', 'Nombre')
                    ->render(function (Product $product) {
                        return Link::make($product->name)
                            ->route('platform.products.edit', $product);
                    }),

                TD::make('category', 'Categoría')
                    ->render(function (Product $product) {
                        return $product->category;  // Muestra la categoría
                    }),

                TD::make('ingredients', 'Ingredientes')
                    ->render(function (Product $product) {
                        return $product->ingredients;  // Muestra los ingredientes
                    }),

                TD::make('aroma', 'Aroma')
                    ->render(function (Product $product) {
                        return $product->aroma;  // Muestra el aroma
                    }),

                TD::make('Contenido', 'Contenido')
                    ->render(function (Product $product) {
                        return $product->getContent();  // Muestra el contenido usando el método getContent()
                    }),

                TD::make('price', 'Precio')
                    ->render(function (Product $product) {
                        return "$" . number_format($product->price, 2);  // Muestra el precio con formato
                    }),

                TD::make('stock', 'Stock')
                    ->render(function (Product $product) {
                        return $product->stock;  // Muestra el stock
                    }),

                TD::make('created_at', 'Creado')
                    ->render(function (Product $product) {
                        return $product->created_at->format('d-m-Y H:i');  // Muestra la fecha de creación
                    }),
            ]),
        ];
    }
}