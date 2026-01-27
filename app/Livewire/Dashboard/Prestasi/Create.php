<?php

namespace App\Livewire\Dashboard\Prestasi;

use Livewire\Component;
use App\Models\Achievement;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Create extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $category = 'Akademik';

    public string $description = '';

    public ?TemporaryUploadedFile $photo = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());

        $data->put('photo', $this->photo->store('images/prestasi'));

        Achievement::create($data->all());

        $this->redirectRoute('prestasi.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:Akademik,Non-Akademik'],
            'description' => ['required', 'string'],
            'photo' => ['required', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.prestasi.create');
    }
}
