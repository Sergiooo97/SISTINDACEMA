<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/personal/i', [App\Http\Controllers\personalController::class, 'index'])->name('personal.index');
Route::get('/personal/c', [App\Http\Controllers\personalController::class, 'create'])->name('personal.create');
Route::post('/personal/s', [App\Http\Controllers\personalController::class, 'store'])->name('personal.store');
Route::get('/personal/{id}/detalles', [App\Http\Controllers\personalController::class, 'show'])->name('personal.show');
Route::patch('/personal/update/{id}', [App\Http\Controllers\personalController::class, 'update'])->name('personal.update');

Route::get('/historial-laboral/i', [App\Http\Controllers\historialLaboralController::class, 'index'])->name('historial-laboral.index');
Route::get('/historial-laboral/c/{id}', [App\Http\Controllers\historialLaboralController::class, 'create'])->name('historial-laboral.create');
Route::post('/historial-laboral/s', [App\Http\Controllers\historialLaboralController::class, 'store'])->name('historial-laboral.store');

Route::get('/prestamos/i', [App\Http\Controllers\prestamosController::class, 'index'])->name('prestamos.index');
Route::get('/prestamos/c/{id}', [App\Http\Controllers\prestamosController::class, 'create'])->name('prestamos.create');
Route::post('/prestamos/s', [App\Http\Controllers\prestamosController::class, 'store'])->name('prestamos.store');

Route::get('/vacaciones/{id}/c', [App\Http\Controllers\vacacionesController::class, 'create'])->name('vacaciones.create');
Route::get('/vacaciones/i', [App\Http\Controllers\vacacionesController::class, 'index'])->name('vacaciones.index');
Route::post('/vacaciones/s', [App\Http\Controllers\vacacionesController::class, 'store'])->name('vacaciones.store');
