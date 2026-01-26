<?php

namespace App\Livewire\Dashboard\Pengaturan\Waka;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use App\Models\SchoolStructure as Waka;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Edit extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $nip = '';

    public string $position = '';

    public ?Waka $waka = null;

    public ?TemporaryUploadedFile $photo = null;

    public function mount(Waka $waka): void
    {
        $this->waka = $waka;

        $this->fill($waka->except(['photo']));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! is_null($data->get('photo'))) {
            if (Storage::exists($this->waka->photo)) {
                Storage::delete($this->waka->photo);
            }

            $data->put('photo', $this->photo->store('images/struktur'));
        } else {
            $data->forget(['photo']);
        }

        $this->waka->update($data->all());

        $this->redirectRoute('wakil-kepala-sekolah.index');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', Rule::unique('school_structures', 'nip')->ignore($this->waka)],
            'position' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.waka.edit');
    }
}
