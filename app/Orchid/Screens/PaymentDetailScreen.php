<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Link;

class PaymentDetailScreen extends Screen
{
    public $order;

    public function query(Order $order): array
    {
        return [
            'order' => $order,
        ];
    }

    public function name(): ?string
    {
        return 'Detalle de la orden';
    }

    public function description(): ?string
    {
        return 'Detalles de la orden con los productos';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Volver')
                ->icon('arrow-left')
                ->route('platform.orders'),  // Volver a la lista de órdenes
        ];
    }

    public function layout(): array
    {
        $orderItems = $this->order->orderItems; // Obtener los productos de la orden

        // Construir un array de campos de Input para cada producto
        $productFields = [];
        foreach ($orderItems as $orderItem) {
            $productFields[] = Layout::rows([
                Input::make('producto_' . $orderItem->id)  // Un ID único por producto
                    ->title('Producto: ' . $orderItem->product->name)
                    ->value($orderItem->product->name)
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),

                Input::make('cantidad_' . $orderItem->id)
                    ->title('Cantidad')
                    ->value($orderItem->cantidad)
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),

                Input::make('precio_unitario_' . $orderItem->id)
                    ->title('Precio unitario')
                    ->value($orderItem->precio_unitario)
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),

                Input::make('subtotal_' . $orderItem->id)
                    ->title('Subtotal')
                    ->value($orderItem->cantidad * $orderItem->precio_unitario)
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),
            ]);
        }

        // Ahora devolvemos los campos generados para los productos junto con los detalles de la orden
        return array_merge(
            [ // Detalles de la orden
                Layout::rows([
                    Input::make('order.nombre')  
                        ->title('Nombre')
                        ->value($this->order->nombre)
                        ->disabled()
                        ->style('color: #333; background-color: #f9f9f9;'),

                    Input::make('order.total')  
                        ->title('Total')
                        ->value($this->order->total)
                        ->disabled()
                        ->style('color: #333; background-color: #f9f9f9;'),

                    Input::make('order.created_at')  
                        ->title('Fecha')
                        ->value($this->order->created_at->format('d-m-Y H:i'))
                        ->disabled()
                        ->style('color: #333; background-color: #f9f9f9;'),
                ])
            ],
            $productFields  // Agregar los productos
        );
    }
}