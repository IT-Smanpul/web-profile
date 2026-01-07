<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Auth\LogoutController;

Route::view('/', 'index');
Route::view('/profil', 'profil')->name('profil');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::view('/prestasi', 'prestasi')->name('prestasi');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'dashboard.index')->name('dashboard');
        Route::resource('fasilitas', FacilityController::class)->parameter('fasilitas', 'facility')->except(['show']);
        Route::resource('prestasi', AchievementController::class)->parameter('prestasi', 'achievement')->except(['show']);
        Route::resource('berita', ArticleController::class)->parameter('berita', 'article');
    });

    Route::post('/logout', LogoutController::class)->name('logout');
});
