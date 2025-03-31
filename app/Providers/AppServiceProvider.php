<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
        {
            View::composer('*', function ($view) {
                $user = Auth::user();

                if ($user) {
                    $cartProducts = DB::table('cart_products')
                        ->join('products', 'cart_products.product_id', '=', 'products.id')
                        ->where('cart_products.cart_id', $user->cart->id ?? null)
                        ->select('products.*', 'cart_products.quantity', 'cart_products.price', 'cart_products.image')
                        ->get();
                } else {
                    $cartProducts = collect(); // Carrito vacío si no hay usuario autenticado
                }

                $view->with('cartProducts', $cartProducts);
            });
        }
}
