<?php

namespace App\Livewire\Dashboard\Pengaturan\Waka;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SchoolStructure;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Create extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $nip = '';

    public string $position = '';

    public ?TemporaryUploadedFile $photo = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());

        $data->put('photo', $this->photo->store('images/struktur'));

        SchoolStructure::create([
            ...$data->all(),
            'role' => 'wakil',
        ]);

        $this->redirectRoute('wakil-kepala-sekolah.index');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', Rule::unique('school_structures', 'nip')],
            'position' => ['required', 'string', 'max:255'],
            'photo' => ['required', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.waka.create');
    }
}
