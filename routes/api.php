<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EncomiendaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/producto',[ProductoController::class, 'getProducto']);
Route::get('/producto/{id}',[ProductoController::class, 'getProductoid']);
//post
Route::post('/producto/insert',[ProductoController::class, 'insertProducto']);
//put
Route::put('/producto/update/{id}',[ProductoController::class, 'updateProducto']);
//delete
Route::delete('/producto/delete/{id}',[ProductoController::class, 'deleteProducto']);



Route::get('/encomienda',[EncomiendaController::class, 'getEncomienda']);

