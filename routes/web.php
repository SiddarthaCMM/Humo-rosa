<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Vista Principal*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::view('/home', 'welcome');


/*Creación de objetos para el carrito*/
Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::post('/create', [ProductController::class, 'store'])->name('store');
Route::get('/catalogue', [App\Http\Controllers\ProductController::class, 'showCatalog'])->name('catalogue');

/*Creación del usuario*/
Route::get('crear-rol', [RoleController::class, 'create']);
Route::get('ver-rol', [RoleController::class, 'index']);
Route::get('actualizar-rol', [RoleController::class, 'update']);
Route::get('eliminar-rol', [RoleController::class, 'delete']);

/*Agregar Productos al Carrito*/
Route::post('/cart/add/{productId}/{quantity}', [CartController::class, 'addToCart'])->name('cart.add');


Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{productId}/{quantity}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/show', [CartController::class, 'showCart'])->name('cart.show');
    Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

/*Mostrar el Carrito*/
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/update-cart/{productId}', [CartController::class, 'updateCart']);

/*Proceder al pago en el carrito*/
Route::get('/payment', [PaymentController::class, 'totalPayment'])->name('payment');

/*Rutas Generales*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Ruta segura para obligar a iniciar sesión*/
/*Todas las rutas que se coloquen aqui van a obligar al usuario a iniciar sesión*/
/*
Route::group(['middleware' => ['auth']], function() {
    Route::view('/', 'welcome');
});
*/