<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\facturasController;

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
    return view('welcomesi');
});
//Ruta para enviar un mensaje por URL
Route::get('/nuevo', function () {
    return "Hola estudiantes de verano DISI";
});
//Ruta para mostrar una vista
Route::view('/ruta-vista-nueva', 'vistaNueva');

//Ruta para enviar parámetros por medio de la URL
Route::view('/ruta-vista-nueva', 'vistaNueva', 
['nombreVariable' => 'Punto de venta']);

//Ruta que llama a una vista por medio de un controlador
use App\Http\Controllers\vistaNuevaController;
Route::get('/ruta-controlador', [vistaNuevaController::class,'index']);

//Ruta para recibir parámetros en URL
Route::get('/ruta-nueva-vista', function(Request $request){
    return "El id recibido es: ". $request->get('id');
});

//Ruta para recibir parámetros en la URL por medio de controlador
Route::get('/ruta-controlador/{id}', [vistaNuevaController::class, 
'recibirParametros']);

//Grupo de rutas desde una vista
Route::prefix('ruta')->group(function(){
    Route::name('ruta.')->group(function(){
        Route::get('/productos', function(){
            return view('vistaNueva', ['nombreVariable' => 'Punto de venta']);
        })->name('productos');

        Route::get('/productos/create', [vistaNuevaController::class,'create'])
        ->name('productos.create');

        Route::get('/productos/show', [vistaNuevaController::class,'show'])
        ->name('productos.show');

        Route::get('/productos/edit', [vistaNuevaController::class,'edit'])
        ->name('productos.edit');

        Route::get('/productos/delete', [vistaNuevaController::class,'destroy'])
        ->name('productos.delete');
    });
});

Route::prefix('ruta')->group(function(){
    Route::name('ruta.')->group(function(){
        Route::get('/clientes', function(){
            return view('vistaNueva', ['nombreVariable' => 'Punto de venta']);
        })->name('clientes');

        Route::get('/clientes/create', [vistaNuevaController::class,'create'])
        ->name('clientes.create');

        Route::get('/clientes/show', [vistaNuevaController::class,'show'])
        ->name('clientes.show');

        Route::get('/clientes/edit', [vistaNuevaController::class,'edit'])
        ->name('clientes.edit');

        Route::get('/clientes/delete', [vistaNuevaController::class,'destroy'])
        ->name('clientes.delete');
    });
});

Route::resource('/ruta/productos', vistaNuevaController::class);

Route::resource('/ruta/clientes', vistaNuevaController::class);

Auth::routes();
Route::group(['middleware'=>['auth']], function(){
    Route::resource('productos', ProductoController::class);
});

Route::group(['middleware'=>['auth']], function(){
    Route::resource('clientes', ClienteController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('facturas', facturasController::class);
    Route::get('productos-pdf', [ProductoController::class, 'exportPDF'])->name('productos.pdf');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
