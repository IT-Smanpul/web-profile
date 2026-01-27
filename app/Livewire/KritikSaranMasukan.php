<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Suggestion;
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

        Suggestion::create($data->all());

        $this->redirectRoute('kritik-saran-masukan');
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
