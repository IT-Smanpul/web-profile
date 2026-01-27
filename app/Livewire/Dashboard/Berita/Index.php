<?php

namespace App\Livewire\Dashboard\Berita;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{
    use WithPagination;

    public string $selected = '';

    #[Url]
    public string $keyword = '';

    #[Computed]
    public function articles(): LengthAwarePaginator
    {
        return Article::with(['author'])->searchBy('title', $this->keyword)->latest()->paginate(6);
    }

    public function render(): View
    {
        return view('livewire.dashboard.berita.index');
    }
}
