<?php

use Livewire\Component;
use App\Models\Achievement;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

new class extends Component
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
};
?>

<div class="relative">
  <div class="mb-8">
    <h2 class="text-xl font-semibold">Edit Prestasi</h2>
    <p class="text-base-content/60 text-sm">
      Edit prestasi yang akan ditampilkan di website sekolah
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
        <label class="label-text" for="kategori">Kategori</label>
        <select id="kategori" wire:model.live="category" @class(['select', 'is-invalid' => $errors->has('category')])>
          <option value="Akademik">Akademik</option>
          <option value="Non-Akademik">Non-Akademik</option>
        </select>
        @error('category')
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
          @elseif($this->achievement?->image)
            <img class="h-full w-full object-cover" src="{{ asset("storage/$achievement?->image") }}"
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
        <a class="btn btn-ghost" href="{{ route('prestasi.index') }}">
          Batal
        </a>
        <button class="btn btn-primary btn-gradient" type="submit">
          Simpan Prestasi
        </button>
      </div>
    </form>
  </div>
</div>