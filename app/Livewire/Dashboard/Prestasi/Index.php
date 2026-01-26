<?php

namespace App\Livewire\Dashboard\Prestasi;

use Livewire\Component;
use App\Models\Achievement;
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

    #[Computed]
    public function achievements(): LengthAwarePaginator
    {
        return Achievement::searchBy('name', $this->keyword)->latest()->paginate(8);
    }

    public function render(): View
    {
        return view('livewire.dashboard.prestasi.index');
    }
}
