<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/** LOGIN **/
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'store'])->middleware('guest');

/** FORGET PASSWORD **/
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest');

/** RESET PASSWORD **/
Route::get('/reset-password/{email}/{token}', [ResetPasswordController::class, 'index'])->middleware('guest')->name('reset-password');
Route::post('/reset-password/{email}/{token}', [ResetPasswordController::class, 'store'])->middleware('guest');

/** USERS **/
Route::get('/user/overview', [UserController::class, 'overview'])->middleware('auth')->name('user-overview');
Route::get('/user/add', [UserController::class, 'add'])->middleware('auth')->name('user-add');
Route::post('/user/store', [UserController::class, 'store'])->middleware('auth')->name('user-store');
