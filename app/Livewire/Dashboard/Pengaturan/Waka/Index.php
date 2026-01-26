<?php

namespace App\Livewire\Dashboard\Pengaturan\Waka;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\SchoolStructure;
use Livewire\Attributes\Computed;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $keyword = '';

    #[Computed]
    public function employees(): LengthAwarePaginator
    {
        return SchoolStructure::where('role', 'wakil')->searchBy('name', $this->keyword)->latest()->paginate(12);
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.waka.index');
    }
}
