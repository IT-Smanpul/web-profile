<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

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

    public function store(CreateEmployeeRequest $request): RedirectResponse
    {
        $data = Collection::make($request->validated());

        if ($request->hasFile('photo')) {
            $data->put('photo', $request->file('photo')->store('images/employees'));
        }

        Employee::create($data->all());

        return to_route('guru-staff.index');
    }

    public function edit(Employee $employee): View
    {
        return view('dashboard.guru-staff.edit', [
            'title' => 'Edit Guru dan Staff - SMA Negeri 10 Pontianak',
            'employee' => $employee,
        ]);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = Collection::make($request->validated());

        if ($request->hasFile('photo')) {
            if ($employee->photo && Storage::exists($employee->photo)) {
                Storage::delete($employee->photo);
            }

            $data->put('photo', $request->file('photo')->store('images/employees'));
        }

        $employee->update($data->all());

        return to_route('guru-staff.index');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        if ($employee->photo && Storage::exists($employee->photo)) {
            Storage::delete($employee->photo);
        }

        $employee->delete();

        return to_route('guru-staff.index');
    }
}
