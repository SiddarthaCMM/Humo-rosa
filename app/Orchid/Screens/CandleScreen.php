<?php

namespace App\Orchid\Screens;

use App\Models\Candle;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class CandleScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'candles' => Candle::paginate()
        ];
    }

    public function name(): ?string
    {
        return 'Velas';
    }

    public function description(): ?string
    {
        return 'Listado de velas en inventario';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Agregar nueva vela')
                ->icon('plus')
                ->route('platform.candles.create'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('candles', [
                TD::make('name', 'Nombre')
                    ->render(fn (Candle $candle) => Link::make($candle->name)
                        ->route('platform.candles.edit', $candle)),

                TD::make('description', 'Descripción'),
                TD::make('price', 'Precio'),
                TD::make('stock', 'Stock'),
                TD::make('created_at', 'Creado'),
            ]),
        ];
    }
}
