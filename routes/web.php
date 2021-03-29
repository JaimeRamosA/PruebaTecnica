<?php

use Illuminate\Support\Facades\Route;
use App\Mail\sendMailable;
use Illuminate\Support\Facades\Mail;

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

Route::get('/perfil', function () {
    return view('user.perfil');
})->middleware('auth');

Route::get('/consultas', function () {
    return view('consultas.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('BuscarUsusario', [App\Http\Controllers\HomeController::class, 'buscarUsuario'])->middleware('auth')->name('buscarUsuario');
Route::get('user/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('user/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update')->middleware('auth');
Route::delete('user/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy')->middleware('auth');


Route::get('Redactar', [App\Http\Controllers\CorreoController::class, 'index'])->name('Redactar')->middleware('auth');
Route::post('Enviar', [App\Http\Controllers\CorreoController::class, 'enviar'])->name('Enviar')->middleware('auth');
Route::get('Enviados', [App\Http\Controllers\CorreoController::class, 'Enviados'])->name('Enviados')->middleware('auth');

Route::get('/send', function () {
    $correo = new sendMailable;

    Mail::to('fabiocordoba@gmail.com')->send($correo);
    return "correo enviado";
})->middleware('auth');
