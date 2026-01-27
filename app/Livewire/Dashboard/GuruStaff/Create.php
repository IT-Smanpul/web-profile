<?php

namespace App\Livewire\Dashboard\GuruStaff;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Create extends Component
{
    use WithFileUploads;

    public string $role = 'guru';

    public string $name = '';

    public string $position = '';

    public ?string $nip = null;

    public ?TemporaryUploadedFile $photo = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());

        $data->put('photo', $this->photo->store('images/guru-staff'));

        Employee::create($data->all());

        $this->redirectRoute('guru-staff.index');
    }

    protected function rules(): array
    {
        return [
            'role' => ['required', Rule::in(['guru', 'staff'])],
            'name' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'nip' => ['nullable', 'string', 'max:255', Rule::unique('employees', 'nip')],
            'photo' => ['required', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.guru-staff.create');
    }
}
