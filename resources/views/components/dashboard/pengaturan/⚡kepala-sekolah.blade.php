<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SchoolStructure;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

new class extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $nip = '';

    public ?SchoolStructure $kepalaSekolah = null;

    public ?TemporaryUploadedFile $photo = null;

    public function mount(): void
    {
        $this->kepalaSekolah = SchoolStructure::where('role', 'kepala')->first();

        if ($this->kepalaSekolah) {
            $this->name = $this->kepalaSekolah->name;
            $this->nip = $this->kepalaSekolah->nip;
        }
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! is_null($data->get('photo'))) {
            if ($this->kepalaSekolah?->photo && Storage::exists($this->kepalaSekolah?->photo)) {
                Storage::delete($this->kepalaSekolah?->photo);
            }

            $data->put('photo', $this->photo->storeAs('images/struktur', "Kepala Sekolah.{$this->photo->getClientOriginalExtension()}"));
        } else {
            $data->forget(['photo']);
        }

        SchoolStructure::updateOrCreate(['role' => 'kepala'], [
            ...$data->all(),
            'position' => 'Kepala Sekolah',
        ]);

        $this->redirectRoute('setting.struktur.kepala-sekolah.edit');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('school_structures', 'name')->ignore($this->kepalaSekolah)],
            'nip' => ['required', 'string', 'max:255', Rule::unique('school_structures', 'nip')->ignore($this->kepalaSekolah)],
            'photo' => [$this->kepalaSekolah?->photo ? 'nullable' : 'required', File::image()->max(2048)],
        ];
    }
};
?>

<div class="space-y-8">
  <div>
    <h2 class="text-xl font-semibold">Kepala Sekolah</h2>
    <p class="text-base-content/60 text-sm"> Kelola informasi Kepala Sekolah yang ditampilkan di halaman profil </p>
  </div>
  <form class="bg-base-100 space-y-8 rounded-2xl p-6 shadow-sm" wire:submit="save">
    <div class="flex flex-col items-center gap-4">
      <div class="bg-base-200 relative flex h-36 w-36 items-center justify-center overflow-hidden rounded-full border">
        @if ($photo)
          <img class="h-full w-full object-cover" id="previewImg" src="{{ $photo->temporaryUrl() }}" alt="Preview Foto" />
        @elseif($kepalaSekolah?->photo && Storage::exists($kepalaSekolah->photo))
          <img class="h-full w-full object-cover" id="previewImg" src="{{ asset("storage/$kepalaSekolah->photo") }}"
            alt="Preview Foto" />
        @else
          <span class="text-base-content/40 px-4 text-center text-xs" id="previewPlaceholder">
            Preview Foto
          </span>
        @endif
      </div>
      <input id="photo" type="file" @class(['input max-w-sm', 'is-invalid' => $errors->has('photo')]) wire:model="photo" accept="image/*" />
      @error('photo')
        <span class="helper-text">{{ $message }}</span>
      @else
        <p class="helper-text">Disarankan foto formal, rasio 1:1</p>
      @enderror
    </div>
    <div class="space-y-5">
      <div>
        <label class="label-text">Nama Lengkap</label>
        <input type="text" wire:model="name" @class([
            'input input-bordered w-full',
            'is-invalid' => $errors->has('name'),
        ])
          placeholder="Contoh: Drs. Ahmad Sahroni M.Bg" />
        @error('name')
          <span class="helper-text">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label class="label-text">NIP</label>
        <input type="text" wire:model="nip" @class([
            'input input-bordered w-full',
            'is-invalid' => $errors->has('nip'),
        ]) placeholder="Masukkan NIP" />
        @error('nip')
          <span class="helper-text">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="flex justify-end">
      <button class="btn btn-primary btn-gradient" type="submit">Simpan</button>
    </div>
  </form>
</div>