<?php

namespace App\Livewire\Dashboard\Ekskul;

use App\Models\Ekskul;
use Livewire\Component;
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

    public string $description = '';

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

            $data->put('photo', $this->photo->store('images/ekskul'));
        } else {
            $data->forget(['photo']);
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
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.ekskul.edit');
    }
}
