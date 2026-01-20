<?php

use App\Models\Setting;
use Livewire\Component;

new class extends Component
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
};
?>

<form class="bg-base-100 space-y-4 rounded-xl p-6 shadow-sm" wire:submit="save">
  <h3 class="text-lg font-semibold">Tuliskan Visi</h3>
  <textarea class="textarea textarea-bordered w-full" wire:model="vision" rows="4" placeholder="......"></textarea>
  <div class="flex justify-end">
    <button class="btn btn-primary justify-end" type="submit">Simpan Visi</button>
  </div>
</form>