<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route("login");
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/websites', [DashboardController::class, 'index'])->name('websites.index');
    Route::get('/configuration', [DashboardController::class, 'index'])->name('configuration.index');
    Route::get('/logs', [DashboardController::class, 'logs'])->name('logs.index');

    Route::get('/websites', [WebsiteController::class, 'index'])->name("websites.index");
});
