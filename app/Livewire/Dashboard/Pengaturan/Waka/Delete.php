<?php

namespace App\Livewire\Dashboard\Pengaturan\Waka;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;
use App\Models\SchoolStructure as Waka;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public ?Waka $waka = null;

    #[On('delete-waka')]
    public function prepare(Waka $waka): void
    {
        $this->waka = $waka;

        $this->dispatch('open-modal', modal: 'delete-waka');
    }

    public function hapus(): void
    {
        if (Storage::exists($this->waka->photo)) {
            Storage::delete($this->waka->photo);
        }

        $this->waka->delete();

        $this->dispatch('close-modal');
        $this->redirectRoute('wakil-kepala-sekolah.index');
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.waka.delete');
    }
}
