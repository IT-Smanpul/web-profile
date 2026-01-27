<?php

namespace App\Livewire\Dashboard\Prestasi;

use Livewire\Component;
use App\Models\Achievement;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public ?Achievement $achievement = null;

    #[On('delete-prestasi')]
    public function prepare(Achievement $achievement): void
    {
        $this->achievement = $achievement;

        $this->dispatch('open-modal', modal: 'delete-prestasi');
    }

    public function hapus(): void
    {
        if (Storage::exists($this->achievement->photo)) {
            Storage::delete($this->achievement->photo);
        }

        $this->achievement->delete();

        $this->dispatch('close-modal');
        $this->redirectRoute('prestasi.index');
    }

    public function render(): View
    {
        return view('livewire.dashboard.prestasi.delete');
    }
}
