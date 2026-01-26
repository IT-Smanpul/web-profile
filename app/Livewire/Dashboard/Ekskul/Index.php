<?php

namespace App\Livewire\Dashboard\Ekskul;

use App\Models\Ekskul;
use Livewire\Component;
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
    public function ekskuls(): LengthAwarePaginator
    {
        return Ekskul::paginate(9);
    }

    public function render(): View
    {
        return view('livewire.dashboard.ekskul.index');
    }
}
