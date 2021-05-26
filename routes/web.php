<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controladores;

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

Auth:: routes(['register' => false]);

Route::get('/home', [Controladores\HomeController::class, 'index'])->name('home');

Route::resource('users', Controladores\UserController::class)->middleware('auth');
Route::resource('productos', Controladores\ProductoController::class)->middleware('auth');
Route::resource('clientes', Controladores\ClienteController::class)->middleware('auth');
Route::resource('especie-mascotas', Controladores\EspecieMascotaController::class)->middleware('auth');
Route::resource('mascotas', Controladores\MascotaController::class)->middleware('auth');
Route::resource('servicios', Controladores\ServicioController::class)->middleware('auth');
Route::resource('estado_ventas', Controladores\EstadoVentaController::class)->middleware('auth');
Route::resource('ventas', Controladores\VentaController::class)->middleware('auth');
Route::resource('detalle_venta_productos', Controladores\DetalleVentaProductoController::class)->middleware('auth');
Route::resource('detalle_venta_servicios', Controladores\DetalleVentaServicioController::class)->middleware('auth');