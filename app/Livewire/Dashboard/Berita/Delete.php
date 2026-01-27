<?php

namespace App\Livewire\Dashboard\Berita;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public ?Article $article = null;

    public string $redirectTo;

    public function mount(?string $redirectTo = 'berita.index'): void
    {
        $this->redirectTo = $redirectTo;
    }

    #[On('delete-article')]
    public function prepare(Article $article): void
    {
        $this->article = $article;

        $this->dispatch('open-modal', modal: 'delete-article');
    }

    public function hapus(): void
    {
        if (Storage::exists($this->article->thumbnail)) {
            Storage::delete($this->article->thumbnail);
        }

        $this->article->delete();
        $this->dispatch('close-modal');

        $this->redirectRoute($this->redirectTo);
    }

    public function render(): View
    {
        return view('livewire.dashboard.berita.delete');
    }
}
