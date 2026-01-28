<div class="relative">
  <div class="mb-8">
    <h2 class="text-xl font-semibold">Edit Guru / Staff</h2>
    <p class="text-base-content/60 text-sm">
      Edit data guru atau staff yang akan ditampilkan di website sekolah
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
            @else
              <img class="h-full w-full object-cover"
                src="{{ $employee->photo ? asset("storage/$employee->photo") : asset('img/avatars/8.png') }}"
                alt="preview foto" />
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
            <span class="helper-text">Foto Formal (JPG / PNG, max 2MB)</span>
          @enderror
        </div>
        <div class="space-y-4">
          <div>
            <label class="label-text" for="role">Guru atau Staff?</label>
            <select id="role" @class(['select', 'is-invalid' => $errors->has('role')]) wire:model="role">
              <option value="guru">Guru</option>
              <option value="staff">Staff</option>
            </select>
            @error('role')
              <span class="helper-text">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label class="label-text" for="name">Nama Lengkap</label>
            <input id="name" type="text" wire:model="name" @class([
                'input input-bordered w-full',
                'is-invalid' => $errors->has('name'),
            ])
              placeholder="Contoh: Siti Aminah, S.Pd" />
            @error('name')
              <span class="helper-text">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label class="label-text" for="nip">NIP</label>
            <input id="nip" type="text" wire:model="nip" @class([
                'input input-bordered w-full',
                'is-invalid' => $errors->has('nip'),
            ])
              placeholder="Masukkan NIP" />
            @if ($errors->has('nip'))
              @error('nip')
                <span class="helper-text">{{ $message }}</span>
              @enderror
            @else
              <span class="helper-text">Opsional, kosongkan kalau tidak ada</span>
            @endif
          </div>
          <div>
            <label class="label-text" for="position">Posisi / Jabatan</label>
            <input id="position" type="text" wire:model="position" @class([
                'input input-bordered w-full',
                'is-invalid' => $errors->has('position'),
            ])
              placeholder="Guru Matematika / Staff TU" />
            @error('position')
              <span class="helper-text">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="flex justify-end gap-3 pt-6">
        <a class="btn btn-ghost" href="{{ route('guru-staff.index') }}">
          Batal
        </a>
        <button class="btn btn-primary btn-gradient" type="submit">
          Tambah Guru / Staff
        </button>
      </div>
    </form>
  </div>
</div>
