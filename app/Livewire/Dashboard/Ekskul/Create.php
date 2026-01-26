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

class Create extends Component
{
    use WithFilePond, WithFileUploads;

    public string $name = '';

    public string $description = '';

    public array $galleries = [];

    public ?TemporaryUploadedFile $photo = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());

        $data->put('photo', $this->photo->store("images/ekskul/$this->name"));

        if (! Storage::directoryExists("images/ekskul/$this->name/galeri")) {
            Storage::makeDirectory("images/ekskul/$this->name/galeri");
        }

        foreach ($data->get('galleries') as $gallery) {
            Storage::putFile("images/ekskul/$this->name/galeri", $gallery);
        }

        Ekskul::create($data->all());

        $this->redirectRoute('ekskul.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'photo' => ['required', File::image()->max(2048)],
            'galleries.*' => File::image()->max('3mb'),
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.ekskul.create');
    }
}
