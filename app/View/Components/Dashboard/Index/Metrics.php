<?php

namespace App\View\Components\Dashboard\Index;

use Closure;
use App\Models\Article;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\Achievement;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Metrics extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard.index.metrics', [
            'facilityCount' => Facility::all()->count(),
            'achievementCount' => Achievement::all()->count(),
            'employeeCount' => Employee::all()->count(),
            'articleCount' => Article::all()->count(),
        ]);
    }
}
