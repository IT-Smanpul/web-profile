<?php

namespace App\Livewire\Dashboard\Fasilitas;

use Livewire\Component;
use App\Models\Facility;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public ?Facility $facility = null;

    #[On('delete-fasilitas')]
    public function prepare(Facility $facility): void
    {
        $this->facility = $facility;

        $this->dispatch('open-modal', modal: 'delete-fasilitas');
    }

    public function hapus(): void
    {
        if (Storage::directoryExists("images/fasilitas/{$this->facility->name}")) {
            Storage::deleteDirectory("images/fasilitas/{$this->facility->name}");
        }

        $this->facility->delete();
        $this->dispatch('close-modal');

        $this->redirectRoute('fasilitas.index');
    }

    public function render(): View
    {
        return view('livewire.dashboard.fasilitas.delete');
    }
}
