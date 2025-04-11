<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;

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
Route::post('/remove-from-cart/{productId}', [CartController::class, 'removeFromCart']);

/*Proceder al pago en el carrito*/
Route::get('/payment', [PaymentController::class, 'getCartSummary'])->name('cart.summary');
Route::get('/payment', [PaymentController::class, 'getCartSummary'])->name('payment');

Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

/*Rutas Generales*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*About Us*/
Route::view('/about-us', 'aboutus')->name('aboutus');

/*Contacto*/
Route::view('/contacto', 'contacto')->name('contacto');
Route::post('/contacto', [ContactoController::class, 'guardarMensaje'])->name('contacto.guardarMensaje');

/*Productos por Temporada*/
Route::view('/temporada', 'temporada')->name('temporada');

/*Configuración del perfil*/
Route::middleware('auth')->group(function () {
    // Ruta para mostrar la página de configuración del perfil
    Route::get('/configuration', [ProfileController::class, 'showConfiguration'])->name('configuration');

    // Ruta para actualizar la foto de perfil
    Route::put('/configuration', [ProfileController::class, 'update'])->name('profile.update');
});

    /*Secundarios de configuración de Perfil*/
    Route::view('/configuration/configurar_direcciones', 'menu_compras.index_agregar_direccion')->name('direcciones');
    Route::view('/configuration/compras', 'menu_compras.index_compras')->name('compras');
    Route::view('/configuration/billetera', 'menu_compras.index_con_billetera')->name('billetera');


/*Ruta segura para obligar a iniciar sesión*/
/*Todas las rutas que se coloquen aqui van a obligar al usuario a iniciar sesión*/
/*
Route::group(['middleware' => ['auth']], function() {
    Route::view('/', 'welcome');
});
*/