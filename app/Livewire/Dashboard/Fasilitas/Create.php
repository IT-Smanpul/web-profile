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

class Create extends Component
{
    use WithFilePond, WithFileUploads;

    public string $name = '';

    public string $description = '';

    public array $galleries = [];

    public ?TemporaryUploadedFile $image = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());

        $data->put('image', $this->image->store("images/fasilitas/$this->name"));

        if (! Storage::directoryExists("images/fasilitas/$this->name/galeri")) {
            Storage::makeDirectory("images/fasilitas/$this->name/galeri");
        }

        foreach ($data->get('galleries') as $gallery) {
            Storage::putFile("images/fasilitas/$this->name/galeri", $gallery);
        }

        Facility::create($data->all());

        $this->redirectRoute('fasilitas.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', File::image()->max(2048)],
            'galleries.*' => File::image()->max('3mb'),
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.fasilitas.create');
    }
}
