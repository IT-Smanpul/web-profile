<?php

namespace App\Livewire\Dashboard\Prestasi;

use Livewire\Component;
use App\Models\Achievement;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Edit extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $category = 'Akademik';

    public string $description = '';

    public ?Achievement $achievement = null;

    public ?TemporaryUploadedFile $image = null;

    public function mount(Achievement $achievement): void
    {
        $this->achievement = $achievement;

        $this->fill($achievement->except(['image']));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! is_null($data->get('image'))) {
            if (Storage::exists($this->achievement->image)) {
                Storage::delete($this->achievement->image);
            }

            $data->put('image', $this->image->store('images/prestasi'));
        } else {
            $data->forget(['image']);
        }

        $this->achievement->update($data->all());

        $this->redirectRoute('prestasi.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:Akademik,Non-Akademik'],
            'description' => ['required', 'string'],
            'image' => ['nullable', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.prestasi.edit');
    }
}
