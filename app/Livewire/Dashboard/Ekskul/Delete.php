<?php

namespace App\Livewire\Dashboard\Ekskul;

use App\Models\Ekskul;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public ?Ekskul $ekskul = null;

    #[On('delete-ekskul')]
    public function prepare(Ekskul $ekskul): void
    {
        $this->ekskul = $ekskul;

        $this->dispatch('open-modal', modal: 'delete-ekskul');
    }

    public function hapus(): void
    {
        if (Storage::directoryExists("images/ekskul/{$this->ekskul->id}")) {
            Storage::deleteDirectory("images/ekskul/{$this->ekskul->id}");
        }

        $this->ekskul->delete();

        $this->redirectRoute('ekskul.index');
    }

    public function render(): View
    {
        return view('livewire.dashboard.ekskul.delete');
    }
}
