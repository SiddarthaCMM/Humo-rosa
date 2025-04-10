<?php

namespace App\Orchid\Screens;

use App\Models\Mensaje;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class MessageScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'messages' => Mensaje::paginate()  // Consulta los mensajes paginados
        ];
    }

    public function name(): ?string
    {
        return 'Mensajes';
    }

    public function description(): ?string
    {
        return 'Mensajes recibidos por los clientes';
    }

    public function commandBar(): array
    {
        // Un botón para agregar un nuevo mensaje si lo deseas
        return [];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('messages', [
                TD::make('id', 'ID')
                    ->render(function (Mensaje $mensaje) {
                        return $mensaje->id;
                    }),

                TD::make('nombre', 'Nombre')
                    ->render(function (Mensaje $mensaje) {
                        return $mensaje->nombre;
                    }),

                TD::make('email', 'Email')
                    ->render(function (Mensaje $mensaje) {
                        return $mensaje->email;
                    }),

                TD::make('created_at', 'Fecha')
                    ->render(function (Mensaje $mensaje) {
                        return $mensaje->created_at->format('d-m-Y H:i');
                    }),

                TD::make('Acciones', 'Acciones')
                    ->render(function (Mensaje $mensaje) {
                        return Link::make('Ver detalles')
                            ->route('platform.messages.show', $mensaje);  // Enlace para ver el detalle
                    }),
            ]),
        ];
    }
}