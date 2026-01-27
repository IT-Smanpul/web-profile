<?php

namespace App\Http\Controllers\Setting;

use App\Models\SchoolStructure;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class WakaController extends Controller
{
    public function index(): View
    {
        return view('dashboard.pengaturan.waka.index', [
            'title' => "Pengaturan Wakil Kepala Sekolah - $this->appName",
            'wakilKepalaSekolah' => SchoolStructure::where('role', 'wakil')->get(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.pengaturan.waka.create', [
            'title' => "Tambah Wakil Kepala Sekolah - $this->appName",
        ]);
    }

    public function edit(SchoolStructure $waka): View
    {
        return view('dashboard.pengaturan.waka.edit', [
            'title' => "Edit Wakil Kepala Sekolah - $this->appName",
            'waka' => $waka,
        ]);
    }
}
