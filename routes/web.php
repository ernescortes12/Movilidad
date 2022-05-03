<?php

use App\Http\Controllers\InstEnt;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\InstitucionEmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Login Routes
Route::get('/', [LoginController::class, 'show'])->name('login.index');
Route::post('/', [LoginController::class, 'consult'])->name('login.consult');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/activities', [LoginController::class, 'activity_view'])->middleware('auth')->name('login.activites');

//  Creates
Route::get('/activities/registro_instituciones', [InstEnt::class, 'create'])
    ->name('instituciones.create')->middleware('auth');

Route::get('/activities/registro_convenios', function () {
    return view('convenios.create');
})->name('convenios.create')->middleware('auth');;
