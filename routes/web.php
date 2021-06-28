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
Route::resource('providers', Controladores\ProviderController::class)->middleware('auth');
Route::resource('productos', Controladores\ProductoController::class)->middleware('auth');
Route::resource('clientes', Controladores\ClienteController::class)->middleware('auth');
Route::resource('especie-mascotas', Controladores\EspecieMascotaController::class)->middleware('auth');
Route::resource('mascotas', Controladores\MascotaController::class)->middleware('auth');
Route::resource('servicios', Controladores\ServicioController::class)->middleware('auth');
Route::resource('ventas', Controladores\VentaController::class)->except(['store'])->middleware('auth');
Route::get('consultas/atencion',[Controladores\ConsultaController::class,'atencion'])->middleware('auth')->name('consultas.atencion');
Route::get('consultas/programacion',[Controladores\ConsultaController::class,'programacion'])->middleware('auth')->name('consultas.programacion');
Route::resource('consultas', Controladores\ConsultaController::class)->middleware('auth');
Route::get('consultas/{consulta}/editDetail',[Controladores\ConsultaController::class,'editDetail'])->middleware('auth')->name('consultas.editDetail');
Route::patch('consultas/{consulta}',[Controladores\ConsultaController::class,'saveDetail'])->middleware('auth')->name('consultas.saveDetail');
