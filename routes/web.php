<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Setting\AkunController;
use App\Http\Controllers\Setting\WakaController;
use App\Http\Controllers\Setting\KepalaSekolahController;
use App\Http\Controllers\Setting\VisiMisiSettingController;

Route::view('/', 'index');
Route::view('/profil', 'profil', ['title' => 'Profil - '.Config::get('app.name')])->name('profil');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::view('/prestasi', 'prestasi')->name('prestasi');
Route::view('/berita', 'berita.index')->name('berita');
Route::view('/guru-staff', 'guru-staff')->name('guru-staff');
Route::view('ppdb', 'ppdb')->name('ppdb');

Route::get('/berita/{article}', [ArticleController::class, 'show'])->name('berita.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        // Dashboard
        Route::get('/', DashboardController::class)->name('dashboard');

        // Berita
        Route::get('/berita/{article}/preview', [ArticleController::class, 'preview'])->name('berita.preview');
        Route::resource('berita', ArticleController::class)->parameter('berita', 'article')->except(['store', 'update', 'show', 'destroy']);

        // Prestasi
        Route::resource('prestasi', AchievementController::class)->parameter('prestasi', 'achievement')->except(['store', 'update', 'show', 'destroy']);

        // Fasilitas
        Route::resource('fasilitas', FacilityController::class)->parameter('fasilitas', 'facility')->except(['store', 'update', 'show', 'destroy']);

        // Guru dan Staff
        Route::resource('guru-staff', EmployeeController::class)->parameter('guru-staff', 'employee')->except(['store', 'update', 'show', 'destroy']);

        // Pengaturan
        Route::prefix('setting')->group(function () {
            // Pengaturan Umum
            Route::view('/general', 'dashboard.pengaturan.informasi-umum')->name('setting.general.edit');

            // Visi Misi
            Route::get('/visi-misi', [VisiMisiSettingController::class, 'edit'])->name('setting.visi-misi.edit');
            Route::match(['PUT', 'PATCH'], '/visi-misi', [VisiMisiSettingController::class, 'update'])->name('setting.visi-misi.update');

            // Struktur Sekolah
            Route::get('/struktur/kepala-sekolah', [KepalaSekolahController::class, 'editKepalaSekolah'])->name('setting.struktur.kepala-sekolah.edit');
            Route::match(['PUT', 'PATCH'], '/struktur/kepala-sekolah', [KepalaSekolahController::class, 'updateKepalaSekolah'])->name('setting.struktur.kepala-sekolah.update');

            Route::resource('/struktur/wakil-kepala-sekolah', WakaController::class)->except(['show'])->parameter('wakil-kepala-sekolah', 'waka');

            // Akun
            Route::get('/akun', [AkunController::class, 'edit'])->name('setting.akun.edit');
            Route::match(['PUT', 'PATCH'], '/akun', [AkunController::class, 'update'])->name('setting.akun.update');
        });
    });

    Route::post('/logout', LogoutController::class)->name('logout');
});
