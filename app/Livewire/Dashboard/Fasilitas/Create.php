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

    public ?TemporaryUploadedFile $photo = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());
        $facility = Facility::create($data->except(['photo'])->all());

        $data->put('photo', $this->photo->store("images/fasilitas/$facility->id"));

        foreach ($data->get('galleries', []) as $gallery) {
            Storage::putFile("images/fasilitas/$facility->id/galeri", $gallery);
        }

        $facility->update($data->only(['photo'])->all());

        $this->redirectRoute('fasilitas.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'photo' => ['required', File::image()->max(2048)],
            'galleries' => ['required', 'array'],
            'galleries.*' => File::image()->max('3mb'),
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.fasilitas.create');
    }
}
