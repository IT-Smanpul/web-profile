<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SchoolStructure;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

new class extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $nip = '';

    public string $position = '';

    public ?TemporaryUploadedFile $photo = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());

        $data->put('photo', $this->photo->store('images/struktur'));

        SchoolStructure::create([
            ...$data->all(),
            'role' => 'wakil',
        ]);

        $this->redirectRoute('wakil-kepala-sekolah.index');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', Rule::unique('school_structures', 'nip')],
            'position' => ['required', 'string', 'max:255'],
            'photo' => ['required', File::image()->max(2048)],
        ];
    }
};
?>

<div class="space-y-8">
  <div>
    <h2 class="text-xl font-semibold">Tambah Wakil Kepala Sekolah</h2>
    <p class="text-base-content/60 text-sm">
      Tambahkan data Wakil Kepala Sekolah ke struktur organisasi
    </p>
  </div>
  <form class="bg-base-100 rounded-xl p-6 shadow-sm" wire:submit="save">
    <div class="grid gap-8 lg:grid-cols-[260px_1fr]">
      <div class="flex flex-col items-center justify-center gap-4 text-center">
        <div
          class="bg-base-200 @error('photo') border-error @enderror relative flex h-32 w-32 items-center justify-center overflow-hidden rounded-full border">
          @if ($photo)
            <img class="h-full w-full object-cover" id="wakilPreview" src="{{ $photo->temporaryUrl() }}"
              alt="Preview Foto" />
          @else
            <span class="text-base-content/40 px-3 text-xs" id="wakilPlaceholder">
              Preview Foto
            </span>
          @endif
        </div>
        <input type="file" @class(['input', 'is-invalid' => $errors->has('photo')]) wire:model="photo" accept="image/*" />
        @error('photo')
          <span class="helper-text">{{ $message }}</span>
        @else
          <p class="text-base-content/60 text-xs leading-snug">
            Foto formal Rasio 1:1 (JPG / PNG, max 2MB)
          </p>
        @enderror
      </div>
      <div class="flex flex-col gap-5">
        <div>
          <label class="label-text">Nama Lengkap</label>
          <input type="text" @class([
              'input input-bordered w-full',
              'is-invalid' => $errors->has('name'),
          ]) wire:model="name" placeholder="Masukkan Nama" />
          @error('name')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label class="label-text">NIP</label>
          <input type="text" @class([
              'input input-bordered w-full',
              'is-invalid' => $errors->has('nip'),
          ]) wire:model="nip" placeholder="Masukkan NIP" />
          @error('nip')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label class="label-text">Bidang / Jabatan</label>
          <input type="text" @class([
              'input input-bordered w-full',
              'is-invalid' => $errors->has('position'),
          ]) wire:model="position"
            placeholder="Contoh: Waka Kurikulum" />
          @error('position')
            <p class="helper-text">{{ $message }}</p>
          @enderror
        </div>
        <div class="mt-auto flex justify-end gap-3 pt-4">
          <a class="btn btn-ghost" href="{{ route('wakil-kepala-sekolah.index') }}">
            Batal
          </a>
          <button class="btn btn-primary btn-gradient" type="submit">
            Tambah Wakil
          </button>
        </div>
      </div>
    </div>
  </form>
</div>