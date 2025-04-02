<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Chart;

class ChartsLayout extends Chart
{
    /**
     * Get the data for the layout.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            // Aquí puedes pasar datos si lo necesitas para el gráfico.
            'chartData' => [
                'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril'],
                'datasets' => [
                    [
                        'label' => 'Ventas',
                        'data' => [10, 20, 15, 30],
                        'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    ]
                ]
            ]
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('platform::charts'),  // Llamamos a la vista para los gráficos
        ];
    }
}
