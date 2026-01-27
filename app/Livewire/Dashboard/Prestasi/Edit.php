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

    public ?TemporaryUploadedFile $photo = null;

    public function mount(Achievement $achievement): void
    {
        $this->achievement = $achievement;

        $this->fill($achievement->except(['photo']));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! is_null($data->get('photo'))) {
            if (Storage::exists($this->achievement->photo)) {
                Storage::delete($this->achievement->photo);
            }

            $data->put('photo', $this->photo->store('images/prestasi'));
        } else {
            $data->forget(['photo']);
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
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.prestasi.edit');
    }
}
