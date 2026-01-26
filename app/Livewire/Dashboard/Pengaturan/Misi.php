<?php

namespace App\Livewire\Dashboard\Pengaturan;

use App\Models\Mission;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class Misi extends Component
{
    public array $missions = [];

    public function mount(): void
    {
        $this->missions = Mission::count() > 0 ? Mission::all()->pluck('content')->toArray() : [''];
    }

    public function addMission(): void
    {
        $this->missions[] = '';
    }

    public function removeMission(int $index): void
    {
        unset($this->missions[$index]);
        $this->missions = array_values($this->missions);
    }

    public function save(): void
    {
        $data = $this->validate();

        Mission::truncate();
        foreach ($data['missions'] as $mission) {
            Mission::create(['content' => $mission]);
        }

        $this->redirectRoute('setting.visi-misi.edit');
    }

    protected function rules(): array
    {
        return [
            'missions' => ['required', 'array', 'min:1'],
            'missions.*' => ['required', 'string', 'max:255'],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.misi');
    }
}
