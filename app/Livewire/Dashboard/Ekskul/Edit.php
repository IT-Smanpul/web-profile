<?php

namespace App\Livewire\Dashboard\Ekskul;

use App\Models\Ekskul;
use Livewire\Component;
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

    public ?Ekskul $ekskul = null;

    public ?TemporaryUploadedFile $photo = null;

    public function mount(Ekskul $ekskul): void
    {
        $this->ekskul = $ekskul;

        $this->fill($ekskul->except(['photo']));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! blank($data->get('photo'))) {
            if (Storage::exists($this->ekskul->photo)) {
                Storage::delete($this->ekskul->photo);
            }

            $data->put('photo', $this->photo->store("images/ekskul/{$this->ekskul->id}"));
        } else {
            $data->forget(['photo']);
        }

        if (! blank($data->get('galleries'))) {
            if (Storage::directoryExists("images/ekskul/{$this->ekskul->id}/galeri")) {
                Storage::deleteDirectory("images/ekskul/{$this->ekskul->id}/galeri");
            }

            foreach ($data->get('galleries', []) as $gallery) {
                Storage::putFile("images/ekskul/{$this->ekskul->id}/galeri", $gallery);
            }

            $data->forget(['galleries']);
        }

        $this->ekskul->update($data->all());

        $this->redirectRoute('ekskul.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'photo' => ['nullable', File::image()->max(2048)],
            'galleries' => ['nullable', 'array'],
            'galleries.*' => [File::image()->max('3mb')],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.ekskul.edit');
    }
}
