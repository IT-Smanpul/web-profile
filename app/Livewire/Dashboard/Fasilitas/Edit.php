<?php

namespace App\Livewire\Dashboard\Fasilitas;

use Livewire\Component;
use App\Models\Facility;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Spatie\LivewireFilepond\WithFilePond;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Edit extends Component
{
    use WithFilePond, WithFileUploads;

    public string $name = '';

    public string $description = '';

    public array $galleries = [];

    public ?Facility $facility = null;

    public ?TemporaryUploadedFile $photo = null;

    public function mount(Facility $facility): void
    {
        $this->facility = $facility;

        $this->fill($facility->except('photo'));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! blank($data->get('photo'))) {
            if (Storage::exists($this->facility->photo)) {
                Storage::delete($this->facility->photo);
            }

            $data->put('photo', $this->photo->store("images/fasilitas/{$this->facility->id}"));
        } else {
            $data->forget(['photo']);
        }

        if (! blank($data->get('galleries'))) {
            if (Storage::directoryExists("images/fasilitas/{$this->facility->id}/galeri")) {
                Storage::deleteDirectory("images/fasilitas/{$this->facility->id}/galeri");
            }

            foreach ($data->get('galleries', []) as $gallery) {
                Storage::putFile("images/fasilitas/{$this->facility->id}/galeri", $gallery);
            }
        }

        $data->forget(['galleries']);

        $this->facility->update($data->all());

        $this->redirectRoute('fasilitas.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'photo' => ['nullable', File::image()->max(2048)],
            'galleries' => ['nullable', 'array'],
            'galleries.*' => File::image()->max('3mb'),
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.fasilitas.edit');
    }
}
