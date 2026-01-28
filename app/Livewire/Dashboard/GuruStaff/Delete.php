<?php

namespace App\Livewire\Dashboard\GuruStaff;

use Livewire\Component;
use App\Models\Employee;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public ?Employee $employee = null;

    #[On('delete-employee')]
    public function prepare(Employee $employee): void
    {
        $this->employee = $employee;

        $this->dispatch('open-modal', modal: 'delete-employee');
    }

    public function hapus(): void
    {
        if ($this->employee->photo && Storage::exists($this->employee->photo)) {
            Storage::delete($this->employee->photo);
        }

        $this->employee->delete();

        $this->dispatch('close-modal');
        $this->redirectRoute('guru-staff.index');
    }

    public function render(): View
    {
        return view('livewire.dashboard.guru-staff.delete');
    }
}
