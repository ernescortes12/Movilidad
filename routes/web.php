<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\InstEnt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Login Routes
Route::get('/', [LoginController::class, 'show'])->name('login.index');
Route::post('/', [LoginController::class, 'consult'])->name('login.consult');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/activities', [LoginController::class, 'activity_view'])->middleware('auth')->name('login.activites');

// Creates
// Instituciones
Route::get('/activities/registro_instituciones', [InstEnt::class, 'create'])
    ->name('instituciones.create')->middleware(['auth', 'noSelected']);

Route::post('/activities/store_instituciones_nac', [InstEnt::class, 'store_nac'])
    ->name('instituciones.store_nac')->middleware(['auth']);

// Convenios 
Route::get('/activities/registro_convenios', [ConvenioController::class, 'create'])
    ->name('convenios.create')->middleware(['auth', 'noSelected']);

Route::post('/activities/store_covenios', []);
