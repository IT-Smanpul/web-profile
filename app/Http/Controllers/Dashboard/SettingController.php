<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function informasiUmum(): View
    {
        return view('dashboard.pengaturan.informasi-umum', [
            'title' => "Pengaturan Informasi Umum - $this->appName",
        ]);
    }

    public function visiMisi(): View
    {
        return view('dashboard.pengaturan.visi-misi', [
            'title' => "Pengaturan Visi Misi - $this->appName",
        ]);
    }

    public function kepsek(): View
    {
        return view('dashboard.pengaturan.kepala-sekolah', [
            'title' => "Pengaturan Kepala Sekolah - $this->appName",
        ]);
    }

    public function akun(): View
    {
        return view('dashboard.pengaturan.akun', [
            'title' => "Pengaturan Akun - $this->appName",
        ]);
    }
}
