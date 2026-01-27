<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('dashboard.guru-staff.index', [
            'title' => 'Guru dan Staff - SMA Negeri 10 Pontianak',
            'employees' => Employee::all(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.guru-staff.create', [
            'title' => 'Tambah Guru dan Staff - SMA Negeri 10 Pontianak',
        ]);
    }

    public function edit(Employee $employee): View
    {
        return view('dashboard.guru-staff.edit', [
            'title' => 'Edit Guru dan Staff - SMA Negeri 10 Pontianak',
            'employee' => $employee,
        ]);
    }
}
