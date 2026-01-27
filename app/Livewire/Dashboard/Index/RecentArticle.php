<?php

namespace App\Livewire\Dashboard\Index;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class RecentArticle extends Component
{
    #[Computed]
    public function articles(): Collection
    {
        return Article::latest()->take(9)->get();
    }

    public function render(): View
    {
        return view('livewire.dashboard.index.recent-article');
    }
}
