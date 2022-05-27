<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\InstEntController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Login Routes
Route::get('/', [LoginController::class, 'show'])->name('login.index');
Route::post('/', [LoginController::class, 'consult'])->name('login.consult');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/activities', [LoginController::class, 'activity_view'])->middleware('auth')->name('login.activites');

// Create
// Instituciones
Route::get('/activities/registro_instituciones', [InstEntController::class, 'create'])
    ->name('instituciones.create')->middleware('auth');

Route::post('/store_instituciones_nac', [InstEntController::class, 'store_nac'])
    ->name('instituciones.store_nac')->middleware(['auth']);

Route::post('/store_instituciones_int', [InstEntController::class, 'store_int'])
    ->name('instituciones.store_int')->middleware(['auth']);

// Convenios 
Route::get('/activities/registro_convenios', [ConvenioController::class, 'create'])
    ->name('convenios.create')->middleware('auth');

Route::post('/store_convenios_nac', [ConvenioController::class, 'store_nac'])
    ->name('convenios.store_nac')->middleware(['auth']);

Route::post('/store_convenios_int', [ConvenioController::class, 'store_int'])
    ->name('convenios.store_int')->middleware(['auth']);

// Read
// Instituciones
Route::get('/activities/cons_instituciones_int', [InstEntController::class, 'index_int'])
    ->name('instituciones.show_int')->middleware('auth');

Route::get('/activities/cons_instituciones_nac', [InstEntController::class, 'index_nac'])
    ->name('instituciones.show_nac')->middleware('auth');

// Convenios
Route::get('/activities/cons_convenios_int', [ConvenioController::class, 'index_int'])
    ->name('convenios.show_int')->middleware('auth');

Route::get('/activities/cons_convenios_nac', [ConvenioController::class, 'index_nac'])
    ->name('convenios.show_nac')->middleware('auth');

//Update
//Instituciones
Route::get('/activities/institucion_int/{inst_id}/edit', [InstEntController::class, 'edit_int'])
    ->name('institucion_int.edit')->middleware('auth');

Route::put('/activities/institucion_int/{inst_id}', [InstEntController::class, 'update_int'])
    ->name('institucion_int.update')->middleware('auth');

Route::get('/activities/institucion_nac/{inst_id}/edit', [InstEntController::class, 'edit_nac'])
    ->name('institucion_nac.edit')->middleware('auth');

Route::put('/activities/institucion_nac/{inst_id}', [InstEntController::class, 'update_nac'])
    ->name('institucion_nac.update')->middleware('auth');


//Convenios
Route::get('/activities/convenio_int/{conv_id}/edit', [ConvenioController::class, 'edit_int'])
    ->name('convenios_int.edit')->middleware('auth');

Route::put('/activities/convenio_int/{conv_id}', [ConvenioController::class, 'update_int'])
    ->name('convenios_int.update')->middleware('auth');

Route::get('/activities/convenio_nac/{conv_id}/edit', [ConvenioController::class, 'edit_nac'])
    ->name('convenios_nac.edit')->middleware('auth');

Route::put('/activities/convenio_nac/{conv_id}', [ConvenioController::class, 'update_nac'])
    ->name('convenios_nac.update')->middleware('auth');


// Delete
// Instituciones
Route::post('/delete_inst_int/{inst_id}', [InstEntController::class, 'destroy_int'])
    ->name('institucion_int.destroy')->middleware('auth');

Route::post('/delete_inst_nac/{inst_id}', [InstEntController::class, 'destroy_nac'])
    ->name('institucion_nac.destroy')->middleware('auth');

// Convenios
Route::post('/delete_conv_int/{conv_id}', [ConvenioController::class, 'destroy_int'])
    ->name('convenio_int.destroy')->middleware('auth');

Route::post('/delete_conv_nac/{conv_id}', [ConvenioController::class, 'destroy_nac'])
    ->name('convenio_nac.destroy')->middleware('auth');


//Donwload files
Route::get('/download_ints_nac/{file}', [InstEntController::class, 'download_nac']);
Route::get('/download_conv_nac/{file}', [ConvenioController::class, 'download_nac']);
Route::get('/download_conv_int/{file}', [ConvenioController::class, 'download_int']);
