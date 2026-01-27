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
            'title' => "Ekstrakurikuler - $this->appName",
        ]);
    }

    public function create(): View
    {
        return view('dashboard.ekskul.create', [
            'title' => "Tambah Ekstrakurikuler - $this->appName",
        ]);
    }

    public function edit(Ekskul $ekskul): View
    {
        return view('dashboard.ekskul.edit', [
            'title' => "Edit Ekstrakurikuler - $this->appName",
            'ekskul' => $ekskul,
        ]);
    }
}
