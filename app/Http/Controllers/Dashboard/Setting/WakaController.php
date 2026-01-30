<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Models\SchoolStructure;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class WakaController extends Controller
{
    public function index(): View
    {
        return view('dashboard.pengaturan.waka.index', [
            'title' => $this->setTitle('List Wakil Kepala Sekolah'),
            'wakilKepalaSekolah' => SchoolStructure::where('role', 'wakil')->get(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.pengaturan.waka.create', [
            'title' => $this->setTitle('Tambah Wakil Kepala Sekolah'),
        ]);
    }

    public function edit(SchoolStructure $waka): View
    {
        return view('dashboard.pengaturan.waka.edit', [
            'title' => $this->setTitle('Edit Wakil Kepala Sekolah'),
            'waka' => $waka,
        ]);
    }
}
