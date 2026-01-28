<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\EkskulController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AchievementController;
use App\Http\Controllers\Dashboard\Setting\WakaController;

Route::view('/', 'index');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/guru-staff', [HomeController::class, 'guru'])->name('guru-staff');
Route::get('/fasilitas', [HomeController::class, 'fasilitas'])->name('fasilitas');
Route::get('/ekskul', [HomeController::class, 'ekskul'])->name('ekskul');
Route::get('/prestasi', [HomeController::class, 'prestasi'])->name('prestasi');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/kritik-saran-masukan', [HomeController::class, 'kritikSaranMasukan'])->name('kritik-saran-masukan');

Route::get('/berita/{article}', [ArticleController::class, 'show'])->name('berita.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        // Dashboard
        Route::get('/', DashboardController::class)->name('dashboard');

        // Kritik Saran dan Masukkan
        Route::view('/kritik-saran-masukan', 'dashboard.kritik-saran-masukan')->name('dashboard.kritik-saran-masukan');

        // Berita
        Route::resource('berita', ArticleController::class)->parameter('berita', 'article')->except(['store', 'update', 'show', 'destroy']);

        // Prestasi
        Route::resource('prestasi', AchievementController::class)->parameter('prestasi', 'achievement')->except(['store', 'update', 'show', 'destroy']);

        // Fasilitas
        Route::resource('fasilitas', FacilityController::class)->parameter('fasilitas', 'facility')->except(['store', 'update', 'show', 'destroy']);

        // Ekstrakurikuler
        Route::resource('ekskul', EkskulController::class)->except(['store', 'update', 'show', 'destroy']);

        // Guru dan Staff
        Route::resource('guru-staff', EmployeeController::class)->parameter('guru-staff', 'employee')->except(['store', 'update', 'show', 'destroy']);

        // Pengaturan
        Route::prefix('setting')->group(function () {
            // Pengaturan Umum
            Route::get('/informasi-umum', [SettingController::class, 'informasiUmum'])->name('setting.general.edit');

            // Visi Misi
            Route::get('/visi-misi', [SettingController::class, 'visiMisi'])->name('setting.visi-misi.edit');

            Route::prefix('struktur')->group(function () {
                // Kepala Sekolah
                Route::get('/kepala-sekolah', [SettingController::class, 'kepsek'])->name('setting.struktur.kepala-sekolah.edit');

                // Wakil Kepala Sekolah
                Route::resource('/struktur/wakil-kepala-sekolah', WakaController::class)->parameter('wakil-kepala-sekolah', 'waka')->except(['store', 'update', 'show', 'destroy']);
            });

            // Akun
            Route::get('/akun', [SettingController::class, 'akun'])->name('setting.akun.edit');
        });
    });

    Route::post('/logout', LogoutController::class)->name('logout');
});
