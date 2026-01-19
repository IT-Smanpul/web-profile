<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard.index', [
            'title' => 'Dashboard - SMA Negeri 10 Pontianak',
        ]);
    }
}
