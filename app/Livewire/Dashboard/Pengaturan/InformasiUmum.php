<?php

namespace App\Livewire\Dashboard\Pengaturan;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class InformasiUmum extends Component
{
    public function mount(): void
    {
        $data = Setting::all()->pluck('value', 'key')->toArray();

        $this->fill($data);
    }

    public string $school_name = '';

    public string $npsn = '';

    public string $school_status = 'Negeri';

    public string $accreditation = 'A';

    public string $curriculum = '';

    public function save(): void
    {
        $data = Collection::make($this->validate());

        foreach ($data->all() as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $this->redirectRoute('setting.general.edit');
    }

    protected function rules(): array
    {
        return [
            'school_name' => ['required', 'string', 'max:255'],
            'npsn' => ['required', 'string', 'max:255'],
            'school_status' => ['required', 'in:Negeri,Swasta'],
            'accreditation' => ['required', 'string'],
            'curriculum' => ['required', 'string'],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.informasi-umum');
    }
}
