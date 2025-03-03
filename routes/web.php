<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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

Route::view('/', 'welcome');

Route::get('crear-rol', [RoleController::class, 'create']);
Route::get('ver-rol', [RoleController::class, 'index']);
Route::get('actualizar-rol', [RoleController::class, 'update']);
Route::get('eliminar-rol', [RoleController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Ruta segura para obligar a iniciar sesión*/
/*Todas las rutas que se coloquen aqui van a obligar al usuario a iniciar sesión*/
/*
Route::group(['middleware' => ['auth']], function() {
    Route::view('/', 'welcome');
});
*/