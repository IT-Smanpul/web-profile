<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Contracts\View\View;

class FacilityController extends Controller
{
    public function index(): View
    {
        return view('dashboard.fasilitas.index', [
            'facilities' => Facility::all(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.fasilitas.create');
    }

    public function edit(Facility $facility): View
    {
        return view('dashboard.fasilitas.edit', [
            'facility' => $facility,
        ]);
    }
}
