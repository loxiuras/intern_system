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

Route::middleware('guest')->group(function () {
    /** LOGIN **/
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'store']);

    /** FORGET PASSWORD **/
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store']);

    /** RESET PASSWORD **/
    Route::get('/reset-password/{email}/{token}', [ResetPasswordController::class, 'index'])->name('reset-password');
    Route::post('/reset-password/{email}/{token}', [ResetPasswordController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    /** LOGOUT **/
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    /** DASHBOARD **/
    Route::get('/dashboard', [DashboardController::class, 'overview'])->name('dashboard');

    /** USERS **/
    Route::get('/user/overview', [UserController::class, 'overview'])->name('user-overview');
    Route::get('/user/add', [UserController::class, 'add'])->name('user-add');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user-delete');
    Route::post('/user/store', [UserController::class, 'store'])->name('user-store');
    Route::post('/user/store-password', [UserController::class, 'storePassword'])->name('user-store-password');

    /** COMPANIES **/
    Route::get('/company/overview', [CompanyController::class, 'overview'])->name('company-overview');
    Route::get('/company/add', [CompanyController::class, 'add'])->name('company-add');
    Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('company-edit');
    Route::delete('/company/delete/{id}', [CompanyController::class, 'delete'])->name('company-delete');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company-store');
    Route::post('/company/connect-user', [CompanyController::class, 'connectUser'])->name('company-connect-user');
    Route::post('/company/import', [CompanyController::class, 'import'])->name('company-import');

    /** DOMAINS **/
    Route::get('/domain/overview', [DomainController::class, 'overview'])->name('domain-overview');
    Route::post('/domain/overview', [DomainController::class, 'overview']);
    Route::get('/domain/add', [DomainController::class, 'add'])->name('domain-add');
    Route::get('/domain/edit/{id}', [DomainController::class, 'edit'])->name('domain-edit');
    Route::delete('/domain/delete/{id}', [DomainController::class, 'delete'])->name('domain-delete');
    Route::post('/domain/store', [DomainController::class, 'store'])->name('domain-store');
    Route::get('/domain/calculate-sequence', [DomainController::class, 'calculateSequence'])->name('calculate-sequence');

    /** PASSWORDS **/
    Route::get('/password/overview', [PasswordController::class, 'overview'])->name('password-overview');
    Route::post('/password/overview', [PasswordController::class, 'overview']);
    Route::get('/password/add', [PasswordController::class, 'add'])->name('password-add');
    Route::get('/password/edit/{id}', [PasswordController::class, 'edit'])->name('password-edit');
    Route::delete('/password/delete/{id}', [PasswordController::class, 'delete'])->name('password-delete');
    Route::post('/password/store', [PasswordController::class, 'store'])->name('password-store');

    /** TICKETS **/
    Route::get('/ticket/overview', [TicketController::class, 'overview'])->name('ticket-overview');
    Route::post('/ticket/overview', [TicketController::class, 'overview']);
    Route::get('/ticket/add', [TicketController::class, 'add'])->name('ticket-add');
    Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket-edit');
    Route::delete('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket-delete');
    Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket-store');
    Route::get('/ticket/small-edit/{id}', [TicketController::class, 'smallEdit'])->name('ticket-small-edit');
    Route::post('/ticket/store-invoice', [TicketController::class, 'smallStore'])->name('ticket-small-store');
    Route::post('/ticket/reset/{id}', [TicketController::class, 'reset'])->name('ticket-reset');
    Route::post('/ticket/connect-user', [TicketController::class, 'connectUser'])->name('ticket-connect-user');
    Route::get('/ticket/delete-connected-user/{ticket}/{user}', [TicketController::class, 'deleteConnectedUser'])->name('ticket-delete-connected-user');

    /** MANUALS **/
    Route::get('/manual/overview', [ManualController::class, 'overview'])->name('manual-overview');
    Route::post('/manual/overview', [ManualController::class, 'overview']);
    Route::get('/manual/add', [ManualController::class, 'add'])->name('manual-add');
    Route::get('/manual/edit/{id}', [ManualController::class, 'edit'])->name('manual-edit');
    Route::delete('/manual/delete', [ManualController::class, 'delete'])->name('manual-delete');
    Route::post('/manual/store', [ManualController::class, 'store'])->name('manual-store');
    Route::get('/manual/item/{reference}', [ManualController::class, 'item'])->name('manual-item');

    /** CONTENTS **/
    Route::get('/content/add', [ContentController::class, 'add'])->name('content-add');
    Route::get('/content/edit/{id}', [ContentController::class, 'edit'])->name('content-edit');
    Route::post('/content/delete', [ContentController::class, 'delete'])->name('content-delete');
    Route::post('/content/store', [ContentController::class, 'store'])->name('content-store');
});
