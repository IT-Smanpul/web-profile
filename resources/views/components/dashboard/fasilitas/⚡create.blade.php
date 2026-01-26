<?php

use Livewire\Component;
use App\Models\Facility;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

new class extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $description = '';

    public ?TemporaryUploadedFile $image = null;

    public function save(): void
    {
        $this->dahlah(Collection::make($this->validate()));
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', File::image()->max(2048)],
        ];
    }

    private function dahlah(Collection $data): void
    {
        $data->put('image', $this->image->store('images/fasilitas'));

        Facility::create($data->all());

        $this->redirectRoute('fasilitas.index');
    }
};
?>

<div class="relative space-y-8">
  <div>
    <h2 class="text-xl font-semibold">Tambah Fasilitas</h2>
    <p class="text-base-content/60 text-sm">
      Tambahkan fasilitas yang akan ditampilkan di website sekolah
    </p>
  </div>
  <div class="bg-base-100 rounded-2xl border p-8 shadow-sm">
    @if ($errors->any())
      <div class="alert alert-error mb-8 rounded-xl">
        <span class="icon-[tabler--alert-circle] size-5"></span>
        <div>
          <p class="font-semibold">Terjadi kesalahan</p>
          <p class="text-sm">Silakan periksa kembali input yang kamu isi.</p>
        </div>
      </div>
    @endif
    <form class="flex flex-col gap-10 lg:flex-row" wire:submit="save">
      <div class="lg:w-105 lg:flex-shrink-0">
        <label class="label-text">Foto Fasilitas</label>
        <div class="space-y-4">
          <div @class([
              'bg-base-200 flex aspect-video items-center justify-center overflow-hidden rounded-2xl border',
              'border-error' => $errors->has('image'),
          ])>
            @if ($image)
              <img class="h-full w-full object-cover" src="{{ $image->temporaryUrl() }}" alt="Preview Fasilitas" />
            @else
              <div class="text-base-content/40 text-center text-sm">
                Preview Foto
              </div>
            @endif
          </div>
          <label @class([
              'btn btn-outline w-full cursor-pointer gap-2',
              'btn-primary' => !$errors->has('image'),
              'btn-error' => $errors->has('image'),
          ])>
            <span class="icon-[tabler--upload] size-5"></span>
            Pilih Foto
            <input class="@error('image') is-invalid @enderror hidden" type="file" wire:model="image" />
          </label>
          @error('image')
            <p class="helper-text">{{ $message }}</p>
          @else
            <p class="helper-text">
              JPG / PNG, maksimal 2MB
            </p>
          @enderror
        </div>
      </div>
      <div class="min-w-0 flex-1 space-y-6">
        <div>
          <label class="label-text">Nama Fasilitas</label>
          <input class="input input-bordered @error('name') is-invalid @enderror w-full" type="text"
            wire:model.defer="name" placeholder="Contoh: Laboratorium Komputer" />
          @error('name')
            <p class="helper-text">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="label-text">Deskripsi</label>
          <textarea class="textarea textarea-bordered @error('description') is-invalid @enderror w-full"
            wire:model.live="description" rows="4" placeholder="Deskripsi singkat fasilitas..."></textarea>
          @error('description')
            <p class="helper-text">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex justify-end gap-3 pt-4">
          <a class="btn btn-ghost" href="{{ route('fasilitas.index') }}">
            Batal
          </a>
          <button class="btn btn-primary btn-gradient" type="submit">
            Tambah Fasilitas
          </button>
        </div>
      </div>
    </form>
  </div>
</div>