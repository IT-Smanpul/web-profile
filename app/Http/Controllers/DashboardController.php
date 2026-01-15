<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Employee;
use App\Models\Achievement;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard.index', [
            'title' => 'Dashboard - SMA Negeri 10 Pontianak',
            'totalArticles' => Article::all()->count(),
            'totalAchievements' => Achievement::all()->count(),
            'totalGurus' => Employee::guru()->get()->count(),
            'totalStaffs' => Employee::staff()->get()->count(),
            'latestArticles' => Article::latest()->paginate(10),
            'latestAchievements' => Achievement::latest()->paginate(10),
        ]);
    }
}
