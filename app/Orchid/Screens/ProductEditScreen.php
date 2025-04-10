<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Product;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Alert;
use Illuminate\Http\Request;

class ProductEditScreen extends Screen
{
    public $product;

    public function query(Product $product): array
    {
        return [
            'product' => $product,
        ];
    }

    public function name(): ?string
    {
        return $this->product->exists ? 'Editar Producto' : 'Crear Producto';
    }

    public function description(): ?string
    {
        return 'Formulario para crear o editar productos';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Cancelar')
                ->icon('arrow-left')
                ->route('platform.products'),

            Button::make('Guardar')
                ->icon('check')
                ->method('save'),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->product->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('product.name')
                    ->title('Nombre')
                    ->required(),

                Input::make('product.category')
                    ->title('Categoría')
                    ->required(),

                Input::make('product.ingredients')
                    ->title('Ingredientes'),

                Input::make('product.aroma')
                    ->title('Aroma'),

                Input::make('product.Contenido')
                    ->title('Contenido'),

                TextArea::make('product.description')
                    ->title('Descripción'),

                Input::make('product.price')
                    ->title('Precio')
                    ->type('number')
                    ->step(0.01)
                    ->required(),

                Input::make('product.stock')
                    ->title('Stock')
                    ->type('number')
                    ->required(),

                Input::make('product.image')
                    ->title('Imagen')
                    ->type('file')
                    ->accept('image/*')
            ])
        ];
    }

    public function save(Product $product, Request $request)
    {
        // Verificar si se ha subido una imagen
        if ($request->hasFile('product.image')) {
            // Obtener el archivo de la imagen
            $image = $request->file('product.image');

            // Guardar la imagen en el directorio 'public/products' y obtener el nombre del archivo
            $imagePath = $image->store('images', 'public');

            // Guardar la ruta de la imagen en la base de datos
            $product->image = $imagePath;
        }

        $product->fill($request->get('product'))->save();

        Alert::info('El producto fue guardado correctamente.');

        return redirect()->route('platform.products');
    }

    public function remove(Product $product)
    {
        $product->delete();

        Alert::info('El producto fue eliminado.');

        return redirect()->route('platform.products');
    }
}