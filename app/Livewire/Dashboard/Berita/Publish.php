<?php

namespace App\Livewire\Dashboard\Berita;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;

class Publish extends Component
{
    public ?Article $article = null;

    #[On('publish-article')]
    public function prepare(Article $article): void
    {
        $this->article = $article;
        $this->dispatch('open-modal', modal: 'publish-article');
    }

    public function publish(): void
    {
        $this->article?->update(['published' => true]);
        $this->dispatch('close-modal');

        $this->redirectRoute('berita.index');
    }

    public function render(): View
    {
        return view('livewire.dashboard.berita.publish');
    }
}
