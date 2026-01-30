<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Achievement;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AchievementController extends Controller
{
    public function index(): View
    {
        return view('dashboard.prestasi.index', [
            'title' => $this->setTitle('List Prestasi'),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.prestasi.create', [
            'title' => $this->setTitle('Tambah Prestasi'),
        ]);
    }

    public function edit(Achievement $achievement): View
    {
        return view('dashboard.prestasi.edit', [
            'title' => $this->setTitle('Edit Prestasi'),
            'achievement' => $achievement,
        ]);
    }
}
