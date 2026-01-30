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
            'title' => $this->setTitle('List Fasilitas'),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.fasilitas.create', [
            'title' => $this->setTitle('Tambah Fasilitas'),
        ]);
    }

    public function edit(Facility $facility): View
    {
        return view('dashboard.fasilitas.edit', [
            'title' => $this->setTitle('Edit Fasilitas'),
            'facility' => $facility,
        ]);
    }
}
