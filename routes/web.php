<?php

use App\Http\Controllers\reservaController;
use App\Http\Controllers\salasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [salasController::class, 'index'])->name('inicio');

Route::get('/lista_Salas', [salasController::class, 'lista'])->name('listaSalas');

Route::get('/nueva_Reserva', [salasController::class, 'nuevaReserva'])->name('nuevaReserva');

Route::post('/reserva',[reservaController::class,'store'])->name('agregarReserva');

Route::resource('salas', salasController::class);
