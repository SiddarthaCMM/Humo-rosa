<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class PaymentScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'orders' => Order::with('user')->paginate()  // Consulta los pedidos con relación al usuario
        ];
    }

    public function name(): ?string
    {
        return 'Lista de Pedidos';
    }

    public function description(): ?string
    {
        return 'Pedidos realizados por los clientes';
    }

    public function commandBar(): array
    {
        // Puedes agregar botones si es necesario, por ejemplo, para agregar un nuevo pedido
        return [];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('orders', [
                TD::make('id', 'ID')
                    ->render(function (Order $order) {
                        return $order->id;
                    }),

                TD::make('nombre', 'Nombre')
                    ->render(function (Order $order) {
                        return $order->nombre;  // Mostrar el nombre del usuario
                    }),

                TD::make('total', 'Total')
                    ->render(function (Order $order) {
                        return '$' . number_format($order->total, 2);  // Mostrar el total de la orden
                    }),

                TD::make('created_at', 'Fecha')
                    ->render(function (Order $order) {
                        return $order->created_at->format('d-m-Y H:i');  // Mostrar la fecha de creación
                    }),

                TD::make('Acciones', 'Acciones')
                    ->render(function (Order $order) {
                        return Link::make('Ver detalles')
                            ->route('platform.orders.show', $order);  // Enlace para ver los detalles del pedido
                    }),
            ]),
        ];
    }
}