<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Contracts\View\View;

class AchievementController extends Controller
{
    public function index(): View
    {
        return view('dashboard.prestasi.index', [
            'achievements' => Achievement::all(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.prestasi.create');
    }

    public function edit(Achievement $achievement): View
    {
        return view('dashboard.prestasi.edit', [
            'achievement' => $achievement,
        ]);
    }
}
