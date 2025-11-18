<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiodataController;

Route::middleware('web')->group(function () {

    // Auth routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route terlindungi (harus login)
    Route::middleware('auth')->group(function () {
        Route::get('/', fn() => view('pages.dashboard.dashboard'))->name('dashboard');

        // Biodata
        Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
        Route::get('/biodata/create', [BiodataController::class, 'create'])->name('biodata.create');
        Route::post('/biodata/store', [BiodataController::class, 'store'])->name('biodata.store');
    });
});