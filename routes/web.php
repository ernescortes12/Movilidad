<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'show'])->name('login.index');
// Route::get('/', [LoginController::class, 'consult'])->name('login.consult');
