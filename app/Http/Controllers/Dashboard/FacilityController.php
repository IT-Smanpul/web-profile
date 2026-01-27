<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Facility;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    public function index(): View
    {
        return view('dashboard.fasilitas.index', [
            'title' => "Fasilitas - $this->appName",
        ]);
    }

    public function create(): View
    {
        return view('dashboard.fasilitas.create', [
            'title' => "Tambah Fasilitas - $this->appName",
        ]);
    }

    public function edit(Facility $facility): View
    {
        return view('dashboard.fasilitas.edit', [
            'title' => "Edit Fasilitas - $this->appName",
            'facility' => $facility,
        ]);
    }
}
