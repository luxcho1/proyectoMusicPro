<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\DetalleBoletaController;
use App\Http\Controllers\IntegracionApiController;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta por defecto para mostrar la vista de inicio de sesión
Route::get('/', function () {
    return view('auth.login');
})->name('home');

// Rutas de recursos para los controladores
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('carro', BoletaController::class)->middleware('auth');
Route::resource('encomienda', EncomiendaController::class)->middleware('auth');
Route::resource('boleta', BoletaController::class)->middleware('auth');
Route::resource('integracionapi', IntegracionApiController::class)->middleware('auth');
Route::resource('detalle', DetalleBoletaController::class)->middleware('auth');

Auth::routes([]);

Route::group(['middleware' => 'auth'], function() {

    //CONTROLADOR PRODUCTO
    Route::get('/', [ProductoController::class, 'index'])->name('home');
    Route::get('carro', [ProductoController::class, 'carro'])->name('carro');
    
    //CONTROLADOR ENCOMIENDA
    Route::get('/encomienda', [EncomiendaController::class, 'index']);



    Route::get('inventario', [EncomiendaController::class, 'inventario']);

    //CONTROLADOR BOLETA
    Route::get('boleta', [BoletaController::class, 'index']);

    //CONTROLADOR BOLETA DETALLE
    Route::get('/boleta/{id}/detalle', [BoletaController::class, 'edit']);
    
    //CONTROLADOR INTEGRACION
    Route::get('integracionapi', [IntegracionApiController::class, 'index']);

    //CONTROLADOR DETALLE BOLETA
    Route::get('detalle', [DetalleBoletaController::class, 'detalle']);
    
    // Rutas adicionales
    Route::get('añadir_al_carrito/{id}', [ProductoController::class, 'añadirCarrito'])->name('añadir_al_carrito');
    Route::delete('remove-from-cart', 'ProductoController@remove')->name('eliminar-porducto');
});

//php artisan route:clear
