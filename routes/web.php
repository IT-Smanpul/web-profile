<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Setting\WakaController;
use App\Http\Controllers\Dashboard\EkskulController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AchievementController;

function setTitle(string $title): string
{
    return "$title - ".Config::get('app.name');
}

Route::view('/', 'index');
Route::view('/profil', 'profil', ['title' => setTitle('Profil')])->name('profil');
Route::view('/fasilitas', 'fasilitas', ['title' => setTitle('Fasilitas')])->name('fasilitas');
Route::view('/prestasi', 'prestasi', ['title' => setTitle('Prestasi')])->name('prestasi');
Route::view('/berita', 'berita.index', ['title' => setTitle('Berita')])->name('berita');
Route::view('/guru-staff', 'guru-staff', ['title' => setTitle('Guru dan Staff')])->name('guru-staff');
Route::view('/ekskul', 'ekskul', ['title' => setTitle('Ekstrakurikuler')])->name('ekskul');
Route::view('/kritik-saran-masukan', 'kritik-saran-masukan', ['title' => setTitle('Kritik Saran dan Masukan')])->name('kritik-saran-masukan');

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
        Route::view('/kritik-saran-masukkan', 'dashboard.kritik-saran-masukan')->name('dashboard.kritik-saran-masukan');

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
            Route::view('/general', 'dashboard.pengaturan.informasi-umum')->name('setting.general.edit');

            // Visi Misi
            Route::view('/visi-misi', 'dashboard.pengaturan.visi-misi')->name('setting.visi-misi.edit');

            // Struktur Sekolah
            Route::view('/struktur/kepala-sekolah', 'dashboard.pengaturan.kepala-sekolah')->name('setting.struktur.kepala-sekolah.edit');

            Route::resource('/struktur/wakil-kepala-sekolah', WakaController::class)->parameter('wakil-kepala-sekolah', 'waka')->except(['store', 'update', 'show', 'destroy']);

            // Akun
            Route::view('/akun', 'dashboard.pengaturan.akun')->name('setting.akun.edit');
        });
    });

    Route::post('/logout', LogoutController::class)->name('logout');
});
