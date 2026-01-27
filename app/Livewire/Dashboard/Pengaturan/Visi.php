<?php

namespace App\Livewire\Dashboard\Pengaturan;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class Visi extends Component
{
    public string $vision = '';

    public function mount(): void
    {
        $this->vision = Setting::where('key', 'vision')->value('value') ?? '';
    }

    public function save(): void
    {
        $this->validate();

        Setting::updateOrCreate(['key' => 'vision'], ['value' => $this->vision]);

        $this->redirectRoute('setting.visi-misi.edit');
    }

    protected function rules(): array
    {
        return [
            'vision' => 'required|string|max:1000',
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.visi');
    }
}
