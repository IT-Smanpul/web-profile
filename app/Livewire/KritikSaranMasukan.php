<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Suggestions;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class KritikSaranMasukan extends Component
{
    public string $as = '';

    public string $message = '';

    public function save(): void
    {
        $data = Collection::make($this->validate());

        Suggestions::create($data->all());

        $this->redirectRoute('kritik-saran-masukkan');
    }

    protected function rules(): array
    {
        return [
            'as' => ['required', 'string', Rule::in(['siswa', 'orangtua', 'guru', 'alumni', 'umum'])],
            'message' => ['required', 'string'],
        ];
    }

    public function render(): View
    {
        return view('livewire.kritik-saran-masukan');
    }
}
