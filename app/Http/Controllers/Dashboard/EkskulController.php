<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ekskul;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class EkskulController extends Controller
{
    public function index(): View
    {
        return view('dashboard.ekskul.index', [
            'title' => $this->setTitle('List Ekstrakurikuler'),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.ekskul.create', [
            'title' => $this->setTitle('Tambah Ekstrakurikuler'),
        ]);
    }

    public function edit(Ekskul $ekskul): View
    {
        return view('dashboard.ekskul.edit', [
            'title' => $this->setTitle('Edit Ekstrakurikuler'),
            'ekskul' => $ekskul,
        ]);
    }
}
