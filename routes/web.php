<?php

use App\Http\Controllers\reservaController;
use App\Http\Controllers\salasController;
use App\Models\reserva;
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

// Route::post('/postItems', [itemsController::class, 'store']);

Route::put('/updateSala/{sala}', [salasController::class, 'updateSala']);

Route::delete('/deleteSala/{sala}', [salasController::class, 'eliminarSala']);

Route::post('/addSala', [salasController::class, 'addSala']);

Route::get('/getReservas', [reservaController::class, 'getReservas']);

Route::delete('/deleteReserva/{reserva}', [reservaController::class, 'deleteReserva']);

Route::put('/updateReserva/{reserva}', [reservaController::class, 'updateReserva']);

Route::post('/addReserva', [reservaController::class, 'addReserva']);

Route::get('/getSalas', [salasController::class, 'getSalas']);

Route::get('/HttpReservas', [reservaController::class, 'HttpReservas']);

Route::get('/reservas', [reservaController::class, 'index'])->name('reservas');

Route::get('/', [salasController::class, 'index'])->name('inicio');

Route::get('/lista_Salas', [salasController::class, 'lista'])->name('listaSalas');

Route::get('/nueva_Reserva', [salasController::class, 'nuevaReserva'])->name('nuevaReserva');

Route::patch('/reserva/{reserva}', [reservaController::class, 'update'])->name('modificarReserva');

Route::delete('/reserva/destroy/{reserva}', [reservaController::class, 'destroy'])->name('eliminarRerserva');

Route::post('/reserva', [reservaController::class, 'store'])->name('agregarReserva');

Route::resource('salas', salasController::class);
