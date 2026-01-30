<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function informasiUmum(): View
    {
        return view('dashboard.pengaturan.informasi-umum', [
            'title' => $this->setTitle('Pengaturan Informasi Umum'),
        ]);
    }

    public function visiMisi(): View
    {
        return view('dashboard.pengaturan.visi-misi', [
            'title' => $this->setTitle('Pengaturan Visi & Misi'),
        ]);
    }

    public function kepsek(): View
    {
        return view('dashboard.pengaturan.kepala-sekolah', [
            'title' => $this->setTitle('Pengaturan Kepala Sekolah'),
        ]);
    }

    public function akun(): View
    {
        return view('dashboard.pengaturan.akun', [
            'title' => $this->setTitle('Pengaturan Akun'),
        ]);
    }
}
