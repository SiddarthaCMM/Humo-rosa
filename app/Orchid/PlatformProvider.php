<?php

declare(strict_types=1);

namespace App\Orchid;

use Illuminate\Support\Facades\Route;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use App\Orchid\Screens\ProductScreen;
use Orchid\Platform\Screens\UserEditScreen;
use App\Orchid\Screens\UserListScreen;
use App\Orchid\Screens\MessageScreen;
use App\Orchid\Screens\MessageDetailScreen;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Inicializa el dashboard de Orchid.
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);
    }

    /**
     * Registra los elementos principales del menú.
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Productos')
                ->icon('fire')
                ->title('Contenido')
                ->route('platform.products'),

            Menu::make('Usuarios Registrados')
                ->icon('user')
                ->route('platform.registered.users'),

            Menu::make('Mensajes')
                ->icon('notebook')
                ->route('platform.messages'),

            Menu::make('Ordenes')
                ->icon('basket-loaded')
                ->route('platform.orders'),
        ];
    }

    /**
     * Registra el menú de perfil del usuario.
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Perfil')
                ->icon('user')
                ->route('platform.profile'),
        ];
    }

    /**
     * Permisos del sistema para roles y usuarios.
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group('Sistema')
                ->addPermission('platform.systems.roles', 'Roles')
                ->addPermission('platform.systems.users', 'Usuarios')
                ->addPermission('platform.products', 'Productos') // Añadir permiso para productos
                ->addPermission('platform.systems.files', 'Archivos'),
        ];
    }

    /**
     * Registra rutas personalizadas del panel Orchid.
     */
    public function registerRoutes(): void
    {
        parent::registerRoutes(); // Carga las rutas por defecto de Orchid

        // Ruta personalizada para tu pantalla de velas
        Route::screen('products', ProductScreen::class)->name('platform.products');
        Route::screen('users', UserListScreen::class)->name('platform.registered.users');
        Route::screen('mensajes', MessageScreen::class)->name('platform.messages');
        Route::screen('mensajes/{mensaje}', MessageDetailScreen::class)->name('platform.messages.show');  // Ruta para el detalle del mensaje
        Route::screen('order', MessageScreen::class)->name('platform.messages');
    }
}