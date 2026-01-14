@extends('dashboard.layout')

@section('title', 'Pengaturan Akun')

@section('dashboard-content')
  <div class="space-y-8">
    <div>
      <h2 class="text-xl font-semibold">Pengaturan Akun</h2>
      <p class="text-base-content/60 text-sm">
        Kelola informasi akun administrator
      </p>
    </div>
    <form class="bg-base-100 rounded-2xl p-6 shadow-sm" action="#" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="grid gap-8 md:grid-cols-[280px_1fr]">
        <div class="flex flex-col items-center gap-4">
          <div
            class="bg-base-200 @error('photo') border-error @enderror relative flex h-40 w-40 items-center justify-center overflow-hidden rounded-full border">
            <img class="h-full w-full object-cover" id="previewImg"
              src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/avatars/8.png') }}"
              alt="Foto Profil" />
          </div>
          <label class="btn btn-sm btn-outline btn-primary cursor-pointer gap-2" for="photo">
            <span class="icon-[tabler--upload] size-4"></span>
            Ganti Foto
          </label>
          <input class="hidden" id="photo" name="photo" type="file" accept="image/*"
            onchange="previewImage(event)" />
          @error('photo')
            <p class="text-error text-xs">{{ $message }}</p>
          @enderror
          <p class="text-base-content/60 text-center text-xs">
            JPG / PNG, maksimal 2MB
          </p>
        </div>
        <div class="space-y-6">
          <div>
            <label class="label-text">Nama</label>
            <input class="input input-bordered @error('name') input-error @enderror w-full" name="name" type="text"
              value="{{ old('name', auth()->user()->name) }}" required />
            @error('name')
              <p class="text-error mt-1 text-xs">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label class="label-text">Username</label>
            <input class="input input-bordered @error('username') input-error @enderror w-full" name="username"
              type="text" value="{{ old('username', auth()->user()->username) }}" required />
            @error('username')
              <p class="text-error mt-1 text-xs">{{ $message }}</p>
            @enderror
          </div>
          <div class="border-t pt-4">
            <p class="mb-3 text-sm font-medium">
              Ubah Password (Opsional)
            </p>
            <div class="space-y-4">
              <div>
                <label class="label-text">Password Baru</label>
                <input class="input input-bordered @error('password') input-error @enderror w-full" name="password"
                  type="password" placeholder="Kosongkan jika tidak ingin mengubah" />
                @error('password')
                  <p class="text-error mt-1 text-xs">{{ $message }}</p>
                @enderror
              </div>
              <div>
                <label class="label-text">Konfirmasi Password</label>
                <input class="input input-bordered w-full" name="password_confirmation" type="password" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-8 flex justify-end">
        <button class="btn btn-primary btn-gradient">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
@endsection

<script>
  function previewImage(event) {
    const img = document.getElementById('previewImg')
    if (!event.target.files || !event.target.files[0]) return
    img.src = URL.createObjectURL(event.target.files[0])
  }
</script>
