<?php

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

Route::get('/', function () {
    return view('layouts.app');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/diploma/salvar', [App\Http\Controllers\DiplomaController::class, 'salvarDiploma'])->name('diploma.salvar');
Route::get('/diploma/enviar', [App\Http\Controllers\DiplomaController::class, 'enviarDiploma'])->name('diploma.enviar');
Route::get('/diploma/assinar', [App\Http\Controllers\DiplomaController::class, 'assinarDiploma'])->name('diploma.assinar');
Route::get('/diploma/exibir', [App\Http\Controllers\DiplomaController::class, 'exibirDiplomasEnviados'])->name('diploma.exibir');
Route::get('/diploma', [App\Http\Controllers\DiplomaController::class, 'index'])->name('diploma.index')->name('diploma.index');
