<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index']);
Route::post('/proses-login' , [AuthController::class, 'login'])->name('proses_login');
Route::get('/register-first', [AuthController::class,'register'])->name('register');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('gallery', GalleryController::class);
        Route::resource('menu', MenuController::class);
    });
});