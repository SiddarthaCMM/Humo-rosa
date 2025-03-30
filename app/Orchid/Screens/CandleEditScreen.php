<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Candle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Alert;

class CandleEditScreen extends Screen
{
    public $candle;

    public function query(Candle $candle): array
    {
        return [
            'candle' => $candle
        ];
    }

    public function name(): ?string
    {
        return $this->candle->exists ? 'Editar Vela' : 'Crear Vela';
    }

    public function description(): ?string
    {
        return 'Formulario para crear o editar velas';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Cancelar')
                ->icon('arrow-left')
                ->route('platform.candles'),

            Button::make('Guardar')
                ->icon('check')
                ->method('save'),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->candle->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('candle.name')
                    ->title('Nombre')
                    ->required(),

                TextArea::make('candle.description')
                    ->title('Descripción'),

                Input::make('candle.price')
                    ->title('Precio')
                    ->type('number')
                    ->step(0.01)
                    ->required(),

                Input::make('candle.stock')
                    ->title('Stock')
                    ->type('number')
                    ->required(),

                Picture::make('candle.image')
                    ->title('Imagen'),
            ])
        ];
    }

    public function save(Candle $candle, \Orchid\Screen\Fields\Input $request)
    {
        $candle->fill($request->get('candle'))->save();

        Alert::info('La vela fue guardada correctamente.');

        return redirect()->route('platform.candles');
    }

    public function remove(Candle $candle)
    {
        $candle->delete();

        Alert::info('La vela fue eliminada.');

        return redirect()->route('platform.candles');
    }
}
