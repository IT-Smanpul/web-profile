<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\View\View;

class DashboardController
{
    public function __invoke(): View
    {
        return view('dashboard.index', [
            'title' => 'Dashboard - SMA Negeri 10 Pontianak',
        ]);
    }
}
