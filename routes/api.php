<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//Se colocan en esta parte asi se requiere que el usuario este auteticado
Route::middleware('auth:sanctum')->group(function () {

    //Obtener usuario
    Route::get('/user', function (Request $request) {//Para poder entrar a esta ruta necesitamos un Token
        return $request->user();
    });

    //Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    /* En vez de utilizar esta forma que utilizariamos para web.

    Route::get('/categorias', [CategoriaController::class, 'index']);

    Es mejor utilizar el metodo apiResource y de esta forma se pueden eliminar
    los nombres de los controladores quedarian asi:

    Route::apiResource('/categorias', CategoriaController::class); */

    //Almacenar Ordenes

   

});
Route::apiResource('/pedidos', PedidoController::class);
Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/productos', ProductoController::class);

//Podemos ver los Endpoints de la API

//Route::apiResource('/pedidos', PedidoController::class);
//Route::apiResource('/categorias', CategoriaController::class);
//Route::apiResource('/productos', ProductoController::class);

//Si quieres hacer debug de la API saca del middleware la ruta que deseas ver y coloca:
//Route::apiResource('/categorias', CategoriaController::class);
//http://localhost/api/productos 


//Autentificacion

Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);