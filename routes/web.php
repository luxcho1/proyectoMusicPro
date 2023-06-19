<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\BoletaController;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    return view('auth.login');
});

/* Route::get('/producto', function () {
    return view('producto.index');
});

Route::get('/producto/create',[ProductoController::class,'create']);
*/


Auth::routes();

Route::get('/', [ProductoController::class, 'index'])->name('home');

//Route::group(['middleware' => 'auth.users'], function() {

    Route::resource('producto', ProductoController::class);
    Route::resource('carro', BoletaController::class);

    Route::get('/home', [ProductoController::class, 'index'])->name('home');
    Route::get('añadir_al_carrito/{id}', [ProductoController::class, 'añadirCarrito'])->name('añadir_al_carrito');
    Route::delete('remove-from-cart', 'ProductoController@remove');
    Route::get('carro', [ProductoController::class, 'carro'])->name('carro');
    
//});


