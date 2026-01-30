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
            'title' => $this->setTitle('List Guru dan Staff'),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.guru-staff.create', [
            'title' => $this->setTitle('Tambah Guru dan Staff'),
        ]);
    }

    public function edit(Employee $employee): View
    {
        return view('dashboard.guru-staff.edit', [
            'title' => $this->setTitle('Edit Guru dan Staff'),
            'employee' => $employee,
        ]);
    }
}
