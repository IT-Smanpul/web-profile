<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('dashboard.guru-staff.index', [
            'title' => "Guru dan Staff - $this->appName",
        ]);
    }

    public function create(): View
    {
        return view('dashboard.guru-staff.create', [
            'title' => "Tambah Guru dan Staff - $this->appName",
        ]);
    }

    public function edit(Employee $employee): View
    {
        return view('dashboard.guru-staff.edit', [
            'title' => "Edit Guru dan Staff - $this->appName",
            'employee' => $employee,
        ]);
    }
}
