<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/** LOGIN **/
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');

/** FORGET PASSWORD **/
Route::get('/forget-password', function() {})->middleware('guest')->name('forget-password');
