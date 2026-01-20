<?php

use Livewire\Component;
use App\Models\Facility;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

new class extends Component
{
    use WithFileUploads;

    public ?Facility $facility = null;

    public string $name = '';

    public string $description = '';

    public ?TemporaryUploadedFile $image = null;

    public function mount(Facility $facility): void
    {
        $this->facility = $facility;

        $this->fill($facility->except('image'));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! is_null($data->get('image'))) {
            if (Storage::exists($this->facility->image)) {
                Storage::delete($this->facility->image);
            }

            $data->put('image', $this->image->store('images/fasilitas'));
        } else {
            $data->forget(['image']);
        }

        $this->facility->update($data->all());

        $this->redirectRoute('fasilitas.index');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', File::image()->max(2048)],
        ];
    }
};
?>

<div class="relative">
  <div class="mb-8">
    <h2 class="text-xl font-semibold">Edit Fasilitas</h2>
    <p class="text-base-content/60 text-sm">
      Edit fasilitas yang akan ditampilkan di website sekolah
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
      <div>
        <label class="label-text" for="name">Prestasi</label>
        <input id="name" type="text" wire:model="name" @class(['input w-full', 'is-invalid' => $errors->has('name')])
          placeholder="Contoh: SMA Negeri X Raih Juara Olimpiade" />
        @error('name')
          <span class="helper-text">{{ $message }}</span>
        @enderror
      </div>
      <div class="w-full">
        <label class="label-text" for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" @class(['textarea', 'is-invalid' => $errors->has('description')]) wire:model.live="description" placeholder="Singkat Saja"></textarea>
        @error('description')
          <span class="helper-text">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label class="label-text">Foto</label>
        <div @class([
            'bg-base-200 mb-3 flex h-44 items-center justify-center overflow-hidden rounded-2xl border',
            'border-error' => $errors->has('image'),
        ])>
          @if ($image)
            <img class="h-full w-full object-cover" src="{{ $image->temporaryUrl() }}" alt="Thumbnail Prestasi" />
          @elseif($facility->image)
            <img class="h-full w-full object-cover" src="{{ asset("storage/$facility->image") }}"
              alt="Thumbnail Prestasi" />
          @else
            <span class="text-base-content/40 text-sm">
              Preview Thumbnail
            </span>
          @endif
        </div>
        <div class="max-w-sm">
          <input id="fileInputHelperText" type="file" @class(['input', 'is-invalid' => $errors->has('image')]) wire:model="image" />
          @error('image')
            <span class="helper-text">{{ $message }}</span>
          @else
            <span class="helper-text">Disarankan rasio 16:9 (JPG / PNG, max 2MB)</span>
          @enderror
        </div>
      </div>
      <div class="flex items-center justify-end gap-3 pt-4">
        <a class="btn btn-ghost" href="{{ route('fasilitas.index') }}">
          Batal
        </a>
        <button class="btn btn-primary btn-gradient" type="submit">
          Simpan Fasilitas
        </button>
      </div>
    </form>
  </div>
</div>