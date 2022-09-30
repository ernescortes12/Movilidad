<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\ConvenioIntController;
use App\Http\Controllers\ConvenioNacController;
use App\Http\Controllers\InstEntIntController;
use App\Http\Controllers\InstEntNacController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovilidadIntEntController;
use App\Http\Controllers\MovilidadIntSalController;
use App\Http\Controllers\MovilidadNacEntController;
use App\Http\Controllers\MovilidadNacSalController;
use App\Http\Controllers\UserController;
use App\Models\ConvenioNac;

// Login Routes
Route::get('/', [LoginController::class, 'show'])->name('login.index');
Route::post('/', [LoginController::class, 'consult'])->name('login.consult');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/activities', [LoginController::class, 'activity_view'])->middleware('auth')->name('login.activites');

// Usuarios
Route::resource('users', UserController::class)->middleware(['auth', 'super']);
Route::get('user/password/{id}/edit', [UserController::class, 'editpass'])->name('password.edit')->middleware(['auth', 'super']);
Route::put('user/password/{id}/update', [UserController::class, 'updatepass'])->name('password.update')->middleware(['auth', 'super']);

// Create
// Instituciones
Route::get('/activities/registro_instituciones_int', [InstEntIntController::class, 'create'])
    ->name('institucionesInt.create')->middleware('auth');

Route::get('/activities/registro_instituciones_nac', [InstEntNacController::class, 'create'])
    ->name('institucionesNac.create')->middleware('auth');

Route::post('/store_instituciones_nac', [InstEntNacController::class, 'store'])
    ->name('instituciones.store_nac')->middleware(['auth']);

Route::post('/store_instituciones_int', [InstEntIntController::class, 'store'])
    ->name('instituciones.store_int')->middleware(['auth']);

// Convenios 
Route::get('/activities/registro_convenios_nac', [ConvenioNacController::class, 'create'])
    ->name('conveniosInt.create')->middleware('auth');

Route::get('/activities/registro_convenios_int', [ConvenioIntController::class, 'create'])
    ->name('conveniosNac.create')->middleware('auth');

Route::post('/store_convenios_nac', [ConvenioNacController::class, 'store'])
    ->name('convenios.store_nac')->middleware(['auth']);

Route::post('/store_convenios_int', [ConvenioIntController::class, 'store'])
    ->name('convenios.store_int')->middleware(['auth']);

// Movilidades
// Nacional
// Entrante
Route::get('/activities/registro_movilidad_nac/entrante', [MovilidadNacEntController::class, 'create'])
    ->name('movilidadNacEnt.create');

Route::post('/store_movilidad_nac_ent', [MovilidadNacEntController::class, 'store'])
    ->name('movilidadNacEnt.store')->middleware(['auth']);

// Saliente
Route::get('/activities/registro_movilidad_nac/saliente', [MovilidadNacSalController::class, 'create'])
    ->name('movilidadNacSal.create');

Route::post('/store_movilidad_nac_sal', [MovilidadNacSalController::class, 'store'])
    ->name('movilidadNacSal.store')->middleware(['auth']);

// Internacional
// Entrante
Route::get('/activities/registro_movilidad_int/entrante', [MovilidadIntEntController::class, 'create'])
    ->name('movilidadIntEnt.create');

Route::post('/store_movilidad_int_ent', [MovilidadIntEntController::class, 'store'])
    ->name('movilidadIntEnt.store')->middleware(['auth']);

// Saliente
Route::get('/activities/registro_movilidad_int/saliente', [MovilidadIntSalController::class, 'create'])
    ->name('movilidadIntSal.create');

Route::post('/store_movilidad_int_sal', [MovilidadIntSalController::class, 'store'])
    ->name('movilidadIntSal.store')->middleware(['auth']);

// Read
// Instituciones
Route::get('/activities/cons_instituciones_int', [InstEntIntController::class, 'index'])
    ->name('instituciones.show_int')->middleware('auth');

Route::get('/activities/cons_instituciones_nac', [InstEntNacController::class, 'index'])
    ->name('instituciones.show_nac')->middleware('auth');

// Convenios
Route::get('/activities/cons_convenios_int', [ConvenioIntController::class, 'index'])
    ->name('convenios.show_int')->middleware('auth');

Route::get('/activities/cons_convenios_nac', [ConvenioNacController::class, 'index'])
    ->name('convenios.show_nac')->middleware('auth');

//Update
//Instituciones
Route::get('/activities/institucion_int/{inst_id}/edit', [InstEntIntController::class, 'edit'])
    ->name('institucion_int.edit')->middleware('auth');

Route::put('/activities/institucion_int/{inst_id}', [InstEntIntController::class, 'update'])
    ->name('institucion_int.update')->middleware('auth');

Route::get('/activities/institucion_nac/{inst_id}/edit', [InstEntNacController::class, 'edit'])
    ->name('institucion_nac.edit')->middleware('auth');

Route::put('/activities/institucion_nac/{inst_id}', [InstEntNacController::class, 'update'])
    ->name('institucion_nac.update')->middleware('auth');


//Convenios
Route::get('/activities/convenio_int/{conv_id}/edit', [ConvenioIntController::class, 'edit'])
    ->name('convenios_int.edit')->middleware('auth');

Route::put('/activities/convenio_int/{conv_id}', [ConvenioIntController::class, 'update'])
    ->name('convenios_int.update')->middleware('auth');

Route::get('/activities/convenio_nac/{conv_id}/edit', [ConvenioNacController::class, 'edit'])
    ->name('convenios_nac.edit')->middleware('auth');

Route::put('/activities/convenio_nac/{conv_id}', [ConvenioNacController::class, 'update'])
    ->name('convenios_nac.update')->middleware('auth');


// Delete
// Instituciones
Route::post('/delete_inst_int/{inst_id}', [InstEntIntController::class, 'destroy'])
    ->name('institucion_int.destroy')->middleware('auth');

Route::post('/delete_inst_nac/{inst_id}', [InstEntNacController::class, 'destroy'])
    ->name('institucion_nac.destroy')->middleware('auth');

// Convenios
Route::post('/delete_conv_int/{conv_id}', [ConvenioIntController::class, 'destroy'])
    ->name('convenio_int.destroy')->middleware('auth');

Route::post('/delete_conv_nac/{conv_id}', [ConvenioNacController::class, 'destroy'])
    ->name('convenio_nac.destroy')->middleware('auth');


//Donwload files
Route::get('/download_ints_nac/{file}', [InstEntNacController::class, 'download']);
Route::get('/download_conv_nac/{file}', [ConvenioNacController::class, 'download']);
Route::get('/download_conv_int/{file}', [ConvenioIntController::class, 'download']);
