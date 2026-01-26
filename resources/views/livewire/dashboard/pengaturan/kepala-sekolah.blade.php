<div class="space-y-8">
  <div>
    <h2 class="text-xl font-semibold">Kepala Sekolah</h2>
    <p class="text-base-content/60 text-sm">
      Kelola informasi Kepala Sekolah yang ditampilkan di halaman profil
    </p>
  </div>
  <form class="bg-base-100 rounded-2xl p-6 shadow-sm" wire:submit="save">
    <div class="grid gap-8 md:grid-cols-[280px_1fr]">
      <div class="flex flex-col items-center gap-4">
        <div class="bg-base-200 relative flex size-56 items-center justify-center overflow-hidden rounded-full border">
          @if ($photo)
            <img class="h-full w-full object-cover" src="{{ $photo->temporaryUrl() }}" alt="Preview Foto" />
          @elseif ($kepalaSekolah?->photo && Storage::exists($kepalaSekolah->photo))
            <img class="h-full w-full object-cover" src="{{ asset("storage/$kepalaSekolah->photo") }}"
              alt="Preview Foto" />
          @else
            <span class="text-base-content/40 px-4 text-center text-xs">
              Preview Foto
            </span>
          @endif
        </div>
        <label @class([
            'btn btn-outline w-full cursor-pointer gap-2',
            'btn-primary' => !$errors->has('photo'),
            'btn-error' => $errors->has('photo'),
        ])>
          <span class="icon-[tabler--upload] size-5"></span>
          Pilih Foto
          <input class="@error('photo') is-invalid @enderror hidden" type="file" wire:model="photo" />
        </label>
        @error('photo')
          <span class="helper-text">{{ $message }}</span>
        @else
          <p class="helper-text text-center">
            Foto Formal
          </p>
        @enderror
      </div>
      <div class="flex flex-col gap-6">
        <div>
          <label class="label-text">Nama Lengkap</label>
          <input type="text" wire:model="name" placeholder="Contoh: Drs. Ahmad Sahroni M.Bg"
            @class([
                'input input-bordered w-full',
                'is-invalid' => $errors->has('name'),
            ]) />
          @error('name')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label class="label-text">NIP</label>
          <input type="text" wire:model="nip" placeholder="Masukkan NIP" @class([
              'input input-bordered w-full',
              'is-invalid' => $errors->has('nip'),
          ]) />
          @error('nip')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div class="mt-auto flex justify-end">
          <button class="btn btn-primary btn-gradient" type="submit">
            Simpan
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
