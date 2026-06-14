<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\ContactPageController;
use App\Http\Controllers\Website\GalleryController as WebsiteGalleryController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\MenuPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami',  [AboutController::class, 'index'])->name('about');
Route::get('/gallery',  [WebsiteGalleryController::class, 'index'])->name('gallery');
Route::get('/list-menu',  [MenuPageController::class, 'index'])->name('menu');
Route::get('/hubungi-kami',  [ContactPageController::class, 'index'])->name('contact-us');

Route::get('/login', [AuthController::class, 'index']);
Route::post('/proses-login', [AuthController::class, 'login'])->name('proses_login');
Route::get('/register-first', [AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('gallery', GalleryController::class);
        Route::resource('menu', MenuController::class);
    });
});
