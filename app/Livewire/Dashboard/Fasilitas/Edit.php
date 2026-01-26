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

    public ?TemporaryUploadedFile $image = null;

    public function mount(Facility $facility): void
    {
        $this->facility = $facility;

        $this->fill($facility->except('image'));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! blank($data->get('image'))) {
            if (Storage::exists($this->facility->image)) {
                Storage::delete($this->facility->image);
            }

            $data->put('image', $this->image->store("images/fasilitas/{$this->facility->name}"));
        } else {
            $data->forget(['image']);
        }

        if (! blank($data->get('galleries'))) {
            if (Storage::directoryExists("images/fasilitas/{$this->facility->name}/galeri")) {
                Storage::deleteDirectory("images/fasilitas/{$this->facility->name}/galeri");
            }

            foreach ($data->get('galleries') as $gallery) {
                Storage::putFile("images/fasilitas/{$this->facility->name}/galeri", $gallery);
            }
        } else {
            $data->forget(['galleries']);
        }

        $this->facility->update($data->all());

        $this->redirectRoute('fasilitas.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', File::image()->max(2048)],
            'galleries.*' => ['nullable', File::image()->max('3mb')],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.fasilitas.edit');
    }
}
