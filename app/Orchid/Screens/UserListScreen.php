<?php

namespace App\Orchid\Screens;

use App\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Layouts\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Sight;

class UserListScreen extends Screen
{
    public function query(): array
    {
        return [
            'users' => User::filters()
                ->defaultSort('created_at', 'desc')
                ->paginate(10),
        ];
    }

    public function name(): ?string
    {
        return 'Usuarios registrados';
    }

    public function description(): ?string
    {
        return 'Lista de usuarios que se han registrado en la página';
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('filters.name')
                    ->type('text')
                    ->title('Buscar por nombre')
                    ->placeholder('Escribe un nombre...'),

                Input::make('filters.email')
                    ->type('text')
                    ->title('Buscar por correo')
                    ->placeholder('Escribe un email...'),
            ]),

            Layout::table('users', [
                TD::make('name', 'Nombre')
                    ->sort()
                    ->cantHide(),

                TD::make('email', 'Correo Electrónico')
                    ->sort(),

                TD::make('created_at', 'Fecha de Registro')
                    ->sort()
                    ->render(fn ($user) => $user->created_at->toDayDateTimeString()),

                TD::make('Rol')
                    ->render(fn ($user) => $user->roles->pluck('name')->join(', '))
                    ->cantHide(),

                TD::make('Acciones')
                    ->alignCenter()
                    ->render(fn ($user) =>
                        Link::make('Editar')
                            ->route('platform.systems.users.edit', $user->id)
                            ->icon('pencil')
                    ),
            ]),
        ];
    }
}