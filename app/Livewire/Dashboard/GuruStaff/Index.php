<?php

namespace App\Livewire\Dashboard\GuruStaff;

use Livewire\Component;
use App\Models\Employee;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $keyword = '';

    #[Url(as: 'filter')]
    public string $selected = '';

    #[Computed]
    public function employees(): LengthAwarePaginator
    {
        return Employee::searchBy('name', $this->keyword)->searchBy('role', $this->selected)->latest()->paginate(9);
    }

    public function render(): View
    {
        return view('livewire.dashboard.guru-staff.index');
    }
}
