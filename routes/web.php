<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/** LOGIN **/
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');

/** FORGET PASSWORD **/
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgot-password');
