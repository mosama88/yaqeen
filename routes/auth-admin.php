<?php

use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {

    Route::get('login', [AdminAuthenticatedSessionController::class, 'create'])
        ->name('dashboard.login');

    Route::post('login', [AdminAuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {

    Route::post('logout', [AdminAuthenticatedSessionController::class, 'destroy'])
        ->name('dashboard.logout');
});