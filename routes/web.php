<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/** LOGIN **/
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'store'])->middleware('guest');

/** LOGOUT **/
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

/** FORGET PASSWORD **/
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest');

/** RESET PASSWORD **/
Route::get('/reset-password/{email}/{token}', [ResetPasswordController::class, 'index'])->middleware('guest')->name('reset-password');
Route::post('/reset-password/{email}/{token}', [ResetPasswordController::class, 'store'])->middleware('guest');

/** DASHBOARD **/
Route::get('/dashboard', [DashboardController::class, 'overview'])->middleware('auth')->name('dashboard');

/** USERS **/
Route::get('/user/overview', [UserController::class, 'overview'])->middleware('auth')->name('user-overview');
Route::get('/user/add', [UserController::class, 'add'])->middleware('auth')->name('user-add');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth')->name('user-edit');
Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->middleware('auth')->name('user-delete');
Route::post('/user/store', [UserController::class, 'store'])->middleware('auth')->name('user-store');
Route::post('/user/store-password', [UserController::class, 'storePassword'])->middleware('auth')->name('user-store-password');

/** COMPANIES **/
Route::get('/company/overview', [CompanyController::class, 'overview'])->middleware('auth')->name('company-overview');
Route::get('/company/add', [CompanyController::class, 'add'])->middleware('auth')->name('company-add');
Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->middleware('auth')->name('company-edit');
Route::delete('/company/delete/{id}', [CompanyController::class, 'delete'])->middleware('auth')->name('company-delete');
Route::post('/company/store', [CompanyController::class, 'store'])->middleware('auth')->name('company-store');
Route::post('/company/connect-user', [CompanyController::class, 'connectUser'])->middleware('auth')->name('company-connect-user');
Route::post('/company/import', [CompanyController::class, 'import'])->middleware('auth')->name('company-import');

/** DOMAINS **/
Route::get('/domain/overview', [DomainController::class, 'overview'])->middleware('auth')->name('domain-overview');
Route::post('/domain/overview', [DomainController::class, 'overview'])->middleware('auth');
Route::get('/domain/add', [DomainController::class, 'add'])->middleware('auth')->name('domain-add');
Route::get('/domain/edit/{id}', [DomainController::class, 'edit'])->middleware('auth')->name('domain-edit');
Route::delete('/domain/delete/{id}', [DomainController::class, 'delete'])->middleware('auth')->name('domain-delete');
Route::post('/domain/store', [DomainController::class, 'store'])->middleware('auth')->name('domain-store');
Route::get('/domain/calculate-sequence', [DomainController::class, 'calculateSequence'])->middleware('auth')->name('calculate-sequence');

/** PASSWORDS **/
Route::get('/password/overview', [PasswordController::class, 'overview'])->middleware('auth')->name('password-overview');
Route::post('/password/overview', [PasswordController::class, 'overview'])->middleware('auth');
Route::get('/password/add', [PasswordController::class, 'add'])->middleware('auth')->name('password-add');
Route::get('/password/edit/{id}', [PasswordController::class, 'edit'])->middleware('auth')->name('password-edit');
Route::delete('/password/delete/{id}', [PasswordController::class, 'delete'])->middleware('auth')->name('password-delete');
Route::post('/password/store', [PasswordController::class, 'store'])->middleware('auth')->name('password-store');

/** TICKETS **/
Route::get('/ticket/overview', [TicketController::class, 'overview'])->middleware('auth')->name('ticket-overview');
Route::post('/ticket/overview', [TicketController::class, 'overview'])->middleware('auth');
Route::get('/ticket/add', [TicketController::class, 'add'])->middleware('auth')->name('ticket-add');
Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->middleware('auth')->name('ticket-edit');
Route::delete('/ticket/delete/{id}', [TicketController::class, 'delete'])->middleware('auth')->name('ticket-delete');
Route::post('/ticket/store', [TicketController::class, 'store'])->middleware('auth')->name('ticket-store');
Route::get('/ticket/small-edit/{id}', [TicketController::class, 'smallEdit'])->middleware('auth')->name('ticket-small-edit');
Route::post('/ticket/store-invoice', [TicketController::class, 'smallStore'])->middleware('auth')->name('ticket-small-store');
Route::post('/ticket/reset/{id}', [TicketController::class, 'reset'])->middleware('auth')->name('ticket-reset');

/** MANUALS **/
Route::get('/manual/overview', [ManualController::class, 'overview'])->middleware('auth')->name('manual-overview');
Route::post('/manual/overview', [ManualController::class, 'overview'])->middleware('auth');
Route::get('/manual/add', [ManualController::class, 'add'])->middleware('auth')->name('manual-add');
Route::get('/manual/edit/{id}', [ManualController::class, 'edit'])->middleware('auth')->name('manual-edit');
Route::delete('/manual/delete', [ManualController::class, 'delete'])->middleware('auth')->name('manual-delete');
Route::post('/manual/store', [ManualController::class, 'store'])->middleware('auth')->name('manual-store');
Route::get('/manual/item/{reference}', [ManualController::class, 'item'])->middleware('auth')->name('manual-item');
