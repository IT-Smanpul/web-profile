<?php

namespace App\Livewire\Dashboard\Pengaturan;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SchoolStructure;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class KepalaSekolah extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $nip = '';

    public ?SchoolStructure $kepalaSekolah = null;

    public ?TemporaryUploadedFile $photo = null;

    public function mount(): void
    {
        $this->kepalaSekolah = SchoolStructure::where('role', 'kepala')->first();

        if ($this->kepalaSekolah) {
            $this->fill($this->kepalaSekolah->only(['name', 'nip']));
        }
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! blank($data->get('photo'))) {
            if ($this->kepalaSekolah?->photo && Storage::exists($this->kepalaSekolah?->photo)) {
                Storage::delete($this->kepalaSekolah->photo);
            }

            $data->put('photo', $this->photo->store('images/struktur'));
        } else {
            $data->forget(['photo']);
        }

        SchoolStructure::updateOrCreate(['role' => 'kepala'], [
            ...$data->all(),
            'position' => 'Kepala Sekolah',
        ]);

        $this->redirectRoute('setting.struktur.kepala-sekolah.edit');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('school_structures', 'name')->ignore($this->kepalaSekolah)],
            'nip' => ['required', 'string', 'max:255', Rule::unique('school_structures', 'nip')->ignore($this->kepalaSekolah)],
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.kepala-sekolah');
    }
}
