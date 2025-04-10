<?php

namespace App\Orchid\Screens;

use App\Models\Mensaje;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;  // Usamos Input en lugar de Display
use Orchid\Screen\Actions\Link;

class MessageDetailScreen extends Screen
{
    public $mensaje;

    public function query(Mensaje $mensaje): array
    {
        return [
            'mensaje' => $mensaje,
        ];
    }

    public function name(): ?string
    {
        return 'Detalle del mensaje';
    }

    public function description(): ?string
    {
        return 'Detalles del mensaje';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Volver')
                ->icon('arrow-left')
                ->route('platform.messages', ['mensaje' => $this->mensaje]),  // Pasamos el modelo mensaje completo
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('mensaje.nombre')  // Usamos Input con disabled en lugar de Display
                    ->title('Nombre')
                    ->value($this->mensaje->nombre)
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),  // Estilo específico para cambiar color y fondo

                Input::make('mensaje.email')  // Usamos Input con disabled en lugar de Display
                    ->title('Email')
                    ->value($this->mensaje->email)
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),  // Estilo específico para cambiar color y fondo

                Input::make('mensaje.mensaje')  // Usamos Input con disabled en lugar de Display
                    ->title('Mensaje')
                    ->value($this->mensaje->mensaje)
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),  // Estilo específico para cambiar color y fondo

                Input::make('mensaje.created_at')  // Usamos Input con disabled en lugar de Display
                    ->title('Fecha')
                    ->value($this->mensaje->created_at->format('d-m-Y H:i'))
                    ->disabled()
                    ->style('color: #333; background-color: #f9f9f9;'),  // Estilo específico para cambiar color y fondo
            ])
        ];
    }
}