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
        $ekskul = Ekskul::create($data->except('photo', 'galleries')->all());

        $data->put('photo', $this->photo->store("images/ekskul/$ekskul->id"));

        $ekskul->update($data->only(['photo'])->all());

        foreach ($data->get('galleries') as $gallery) {
            Storage::putFile("images/ekskul/$ekskul->id/galeri", $gallery);
        }

        $this->redirectRoute('ekskul.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'photo' => ['required', File::image()->max(2048)],
            'galleries' => ['required', 'array'],
            'galleries.*' => File::image()->max('3mb'),
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.ekskul.create');
    }
}
