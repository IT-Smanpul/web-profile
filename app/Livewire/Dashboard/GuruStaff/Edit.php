<?php

namespace App\Livewire\Dashboard\GuruStaff;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Edit extends Component
{
    use WithFileUploads;

    public string $role = 'guru';

    public string $name = '';

    public string $position = '';

    public ?string $nip = null;

    public ?Employee $employee = null;

    public ?TemporaryUploadedFile $photo = null;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;

        $this->fill($employee->except(['photo']));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! blank($data->get('photo'))) {
            if ($this->employee->photo && Storage::exists($this->employee->photo)) {
                Storage::delete($this->employee->photo);
            }

            $data->put('photo', $this->photo->store('images/guru-staff'));
        } else {
            $data->forget(['photo']);
        }

        $this->employee->update($data->all());

        $this->redirectRoute('guru-staff.index');
    }

    protected function rules(): array
    {
        return [
            'role' => ['required', Rule::in(['guru', 'staff'])],
            'name' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'nip' => ['nullable', 'string', 'max:255', Rule::unique('employees', 'nip')->ignore($this->employee)],
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.guru-staff.edit');
    }
}
