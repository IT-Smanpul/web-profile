<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Setting\WakaController;
use App\Http\Controllers\Setting\KepalaSekolahController;
use App\Http\Controllers\Setting\GeneralSettingController;
use App\Http\Controllers\Setting\VisiMisiSettingController;

Route::view('/', 'index');
Route::view('/profil', 'profil', ['title' => 'Profil - '.Config::get('app.name')])->name('profil');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::view('/prestasi', 'prestasi')->name('prestasi');
Route::view('/berita', 'berita.index')->name('berita');

Route::get('/berita/{article}', [ArticleController::class, 'show'])->name('berita.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'dashboard.index', ['title' => 'Dashboard - SMA Negeri 10 Pontianak'])->name('dashboard');
        Route::resource('fasilitas', FacilityController::class)->parameter('fasilitas', 'facility')->except(['show']);
        Route::resource('prestasi', AchievementController::class)->parameter('prestasi', 'achievement')->except(['show']);

        Route::get('/berita/{article}/preview', [ArticleController::class, 'preview'])->name('berita.preview');
        Route::patch('/berita/{article}/publish', [ArticleController::class, 'publish'])->name('berita.publish');
        Route::patch('/berita/{article}/unpublish', [ArticleController::class, 'unpublish'])->name('berita.unpublish');
        Route::resource('berita', ArticleController::class)->parameter('berita', 'article')->except('show');

        Route::prefix('setting')->group(function () {
            // Pengaturan Umum
            Route::get('/general', [GeneralSettingController::class, 'edit'])->name('setting.general.edit');
            Route::match(['PUT', 'PATCH'], '/general', [GeneralSettingController::class, 'update'])->name('setting.general.update');

            // Visi Misi
            Route::get('/visi-misi', [VisiMisiSettingController::class, 'edit'])->name('setting.visi-misi.edit');
            Route::match(['PUT', 'PATCH'], '/visi-misi', [VisiMisiSettingController::class, 'update'])->name('setting.visi-misi.update');

            // Struktur Sekolah
            Route::get('/struktur/kepala-sekolah', [KepalaSekolahController::class, 'editKepalaSekolah'])->name('setting.struktur.kepala-sekolah.edit');
            Route::match(['PUT', 'PATCH'], '/struktur/kepala-sekolah', [KepalaSekolahController::class, 'updateKepalaSekolah'])->name('setting.struktur.kepala-sekolah.update');

            Route::resource('/struktur/wakil-kepala-sekolah', WakaController::class)->except(['show'])->parameter('wakil-kepala-sekolah', 'waka');
            //            Route::get('/struktur/wakil-kepala-sekolah', [SchoolStructureController::class, 'indexWakilKepalaSekolah'])->name('setting.struktur.wakil-kepala-sekolah');
            //            Route::post('/struktur/wakil-kepala-sekolah', [SchoolStructureController::class, 'storeWakilKepalaSekolah'])->name('setting.struktur.wakil-kepala-sekolah.store');

            // Akun
        });
    });

    Route::post('/logout', LogoutController::class)->name('logout');
});
