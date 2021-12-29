<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgetPasswordController;

/** LOGIN **/
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');

/** FORGET PASSWORD **/
Route::get('/forget-password', [ForgetPasswordController::class, 'index'])->middleware('guest')->name('forget-password');
