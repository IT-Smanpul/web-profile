<div class="space-y-8">
  <div>
    <h2 class="text-xl font-semibold">Pengaturan Akun</h2>
    <p class="text-base-content/60 text-sm">
      Kelola informasi akun administrator
    </p>
  </div>
  <form class="bg-base-100 rounded-2xl p-6 shadow-sm" wire:submit="save">
    <div class="grid gap-8 md:grid-cols-[280px_1fr]">
      <div class="flex flex-col items-center gap-4">
        <div @class([
            'bg-base-200 relative flex h-40 w-40 items-center justify-center overflow-hidden rounded-full border',
            'border-error' => $errors->has('photo'),
        ])>
          @if ($photo)
            <img class="h-full w-full object-cover" id="previewImg" src="{{ $photo->temporaryUrl() }}" alt="Foto Profil" />
          @else
            <img class="h-full w-full object-cover" id="previewImg"
              src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/avatars/8.png') }}"
              alt="Foto Profil" />
          @endif
        </div>
        <label class="btn btn-sm btn-outline btn-primary cursor-pointer gap-2" for="photo">
          <span class="icon-[tabler--upload] size-4"></span>
          Ganti Foto
        </label>
        <input class="hidden" id="photo" type="file" wire:model="photo" accept="image/*" />
        @error('photo')
          <p class="text-error text-xs">{{ $message }}</p>
        @else
          <p class="text-base-content/60 text-center text-xs">
            JPG / PNG, maksimal 2MB
          </p>
        @enderror
      </div>
      <div class="space-y-6">
        <div>
          <label class="label-text max-w-max" for="name">Nama</label>
          <input id="name" type="text" wire:model="name" @class([
              'input input-bordered w-full',
              'is-invalid' => $errors->has('name'),
          ]) />
          @error('name')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label class="label-text max-w-max" for="username">Username</label>
          <input id="username" type="text" wire:model="username" @class([
              'input input-bordered w-full',
              'is-invalid' => $errors->has('username'),
          ]) />
          @error('username')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div class="border-t pt-4">
          <p class="mb-3 text-sm font-medium">
            Ubah Password (Opsional)
          </p>
          <div class="space-y-4">
            <div>
              <label class="label-text max-w-max" for="password">Password Baru</label>
              <input id="password" type="password" @class([
                  'input input-bordered w-full',
                  'is-invalid' => $errors->has('password'),
              ]) wire:model="password"
                placeholder="********" />
              @error('password')
                <span class="helper-text">{{ $message }}</span>
              @else
                <span class="helper-text">Opsional</span>
              @enderror
            </div>
            <div>
              <label class="label-text" for="password_confirmation">Konfirmasi Password</label>
              <input id="password_confirmation" type="password" @class([
                  'input input-bordered w-full',
                  'is-invalid' => $errors->has('password'),
              ])
                wire:model="password_confirmation" placeholder="********" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-8 flex justify-end">
      <button class="btn btn-primary btn-gradient" type="submit">
        Simpan Perubahan
      </button>
    </div>
  </form>
</div>
