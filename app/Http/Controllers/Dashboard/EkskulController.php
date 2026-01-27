<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;

class EkskulController extends Controller
{
    public function index(): View
    {
        return view('dashboard.ekskul.index', [
            'title' => 'Ekstrakurikuler - '.Config::get('app.name'),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.ekskul.create', [
            'title' => 'Tambah Ekstrakurikuler - '.Config::get('app.name'),
        ]);
    }

    public function edit(Ekskul $ekskul): View
    {
        return view('dashboard.ekskul.edit', [
            'title' => 'Edit Ekstrakurikuler - '.Config::get('app.name'),
            'ekskul' => $ekskul,
        ]);
    }
}
