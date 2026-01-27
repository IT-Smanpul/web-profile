<?php

namespace App\Livewire\Dashboard\Berita;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;

class Unpublish extends Component
{
    public ?Article $article = null;

    #[On('unpublish-article')]
    public function prepare(Article $article): void
    {
        $this->article = $article;
        $this->dispatch('open-modal', modal: 'unpublish-article');
    }

    public function unpublish(): void
    {
        $this->article?->update(['published' => false]);
        $this->dispatch('close-modal');

        $this->redirectRoute('berita.index');
    }

    public function render(): View
    {
        return view('livewire.dashboard.berita.unpublish');
    }
}
