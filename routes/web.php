<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\InstEnt;
use App\Http\Controllers\InstEntController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Login Routes
Route::get('/', [LoginController::class, 'show'])->name('login.index');
Route::post('/', [LoginController::class, 'consult'])->name('login.consult');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/activities', [LoginController::class, 'activity_view'])->middleware('auth')->name('login.activites');

// Creates
// Instituciones
Route::get('/activities/registro_instituciones', [InstEntController::class, 'create'])
    ->name('instituciones.create')->middleware(['auth', 'noSelected']);

Route::post('/activities/store_instituciones_nac', [InstEntController::class, 'store_nac'])
    ->name('instituciones.store_nac')->middleware(['auth']);

Route::post('/activities/store_instituciones_int', [InstEntController::class, 'store_int'])
    ->name('instituciones.store_int')->middleware(['auth']);

// Convenios 
Route::get('/activities/registro_convenios', [ConvenioController::class, 'create'])
    ->name('convenios.create')->middleware(['auth', 'noSelected']);

Route::post('/activities/store_convenios_nac', [ConvenioController::class, 'store_nac'])
    ->name('convenios.store_nac')->middleware(['auth']);

Route::post('/activities/store_convenios_int', [ConvenioController::class, 'store_int'])
    ->name('convenios.store_int')->middleware(['auth']);

// Mostrar
// Instituciones

Route::get('/activities/cons_instituciones_int', [InstEntController::class, 'index_int'])
    ->name('instituciones.show_int')->middleware(['auth', 'noSelected']);

//Donwload
Route::get('/download_ints_nac/{file}', [InstEntController::class, 'download_nac']);
Route::get('/download_conv_nac/{file}', [ConvenioController::class, 'download_nac']);
Route::get('/download_conv_int/{file}', [ConvenioController::class, 'download_int']);
