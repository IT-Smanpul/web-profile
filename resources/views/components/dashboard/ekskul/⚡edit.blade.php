<?php

use App\Models\Ekskul;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

new class extends Component
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
};
?>

<div class="relative">
  <div class="mb-8">
    <h2 class="text-xl font-semibold">Edit Ekskul</h2>
    <p class="text-base-content/60 text-sm">
      Edit data ekskul yang akan ditampilkan di website sekolah
    </p>
  </div>
  <div class="bg-base-100 relative mx-auto w-full rounded-xl border p-8 shadow-sm">
    @if ($errors->any())
      <div class="alert alert-error mb-6 rounded-xl">
        <span class="icon-[tabler--alert-circle] size-5"></span>
        <div>
          <p class="font-semibold">Terjadi kesalahan</p>
          <p class="text-sm">Silakan periksa kembali input yang kamu isi.</p>
        </div>
      </div>
    @endif
    <form class="space-y-6" wire:submit="save">
      @csrf
      <div class="grid gap-8 md:grid-cols-[320px_1fr]">
        <div>
          <label class="label-text">Foto</label>
          <div @class([
              'bg-base-200 mb-3 flex h-64 items-center justify-center overflow-hidden rounded-2xl border',
              'border-error' => $errors->has('photo'),
          ])>
            @if ($photo)
              <img class="h-full w-full object-cover" src="{{ $photo->temporaryUrl() }}" alt="preview foto" />
            @elseif($ekskul->photo)
              <img class="h-full w-full object-cover" src="{{ asset("storage/$ekskul->photo") }}" alt="preview foto" />
            @else
              <span class="text-base-content/40 text-sm">
                Preview Foto
              </span>
            @endif
          </div>
          <label for="photo" @class([
              'btn btn-sm btn-outline mx-auto mb-2 w-full cursor-pointer gap-2',
              'btn-primary' => !$errors->has('photo'),
              'btn-error' => $errors->has('photo'),
          ])>
            <span class="icon-[tabler--upload] size-4"></span>
            Ganti Foto
          </label>
          <input id="photo" type="file" @class(['hidden input', 'is-invalid' => $errors->has('photo')]) wire:model="photo">
          @error('photo')
            <span class="helper-text text-center">{{ $message }}</span>
          @else
            <span class="helper-text text-center">JPG / PNG, max 2MB</span>
          @enderror
        </div>
        <div class="space-y-4">
          <div>
            <label class="label-text" for="name">Nama Ekskul</label>
            <input id="name" type="text" wire:model="name" @class([
                'input input-bordered w-full',
                'is-invalid' => $errors->has('name'),
            ])
              placeholder="Paskibra" />
            @error('name')
              <span class="helper-text">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label class="label-text" for="description">Deskripsi Singkat Ekskul</label>
            <input id="description" type="text" wire:model="description" @class([
                'input input-bordered w-full',
                'is-invalid' => $errors->has('description'),
            ])
              placeholder="Ekskul ini blablablablabla" />
            @error('description')
              <span class="helper-text">{{ $message }}</span>
            @else
              <span class="helper-text">tulis tulis ja inimah</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="flex justify-end gap-3 pt-6">
        <a class="btn btn-ghost" href="{{ route('ekskul.index') }}">
          Batal
        </a>
        <button class="btn btn-primary btn-gradient" type="submit">
          Simpan Ekskul
        </button>
      </div>
    </form>
  </div>
</div>