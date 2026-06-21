<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryGalleryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\SubPaketController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses-login', [AuthController::class, 'login'])->name('proses_login');
Route::get('/register-first', [AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {


    Route::prefix('/admin')->group(function () {
        Route::resource('gallery', GalleryController::class);
        Route::resource('menu', MenuController::class);

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
        Route::prefix('/master')->name('master.')->group(function () {
            Route::resource('category', CategoryGalleryController::class);
            Route::resource('paket', PaketController::class);
            Route::put('/paket/nonactive/{id}',  [PaketController::class, 'nonActive'])->name('paket.non_active');

            Route::prefix('/paket')->name('paket.')->group(function () {
                Route::get('/sub-paket/{idPaket}', [SubPaketController::class, 'index'])->name('sub_paket.index');
                Route::get('/sub-paket/create/{idPaket}', [SubPaketController::class, 'create'])->name('sub_paket.create');
                Route::post('/sub-paket/store', [SubPaketController::class, 'store'])->name('sub_paket.store');
            });
        });
    });
});
