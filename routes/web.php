<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::view('/', 'index');
Route::view('/profil', 'profil')->name('profil');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'dashboard.index')->name('dashboard');
        Route::resource('fasilitas', FacilityController::class)->parameter('fasilitas', 'facility')->except(['show']);
    });

    Route::post('/logout', LogoutController::class)->name('logout');
});
