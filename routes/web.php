<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/profil', 'profil')->name('profil');
