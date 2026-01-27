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
            'title' => "Prestasi - $this->appName",
        ]);
    }

    public function create(): View
    {
        return view('dashboard.prestasi.create', [
            'title' => "Tambah Prestasi - $this->appName",
        ]);
    }

    public function edit(Achievement $achievement): View
    {
        return view('dashboard.prestasi.edit', [
            'title' => "Edit Prestasi - $this->appName",
            'achievement' => $achievement,
        ]);
    }
}
