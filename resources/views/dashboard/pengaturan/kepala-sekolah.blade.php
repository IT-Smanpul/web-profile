@extends('dashboard.layout')

@section('title', 'Kepala Sekolah')

@section('dashboard-content')
  <div class="space-y-8">
    <div>
      <h2 class="text-xl font-semibold">Kepala Sekolah</h2>
      <p class="text-base-content/60 text-sm">
        Kelola informasi Kepala Sekolah yang ditampilkan di halaman profil
      </p>
    </div>
    <form class="bg-base-100 space-y-8 rounded-2xl p-6 shadow-sm"
      action="{{ route('setting.struktur.kepala-sekolah.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @METHOD('PATCH')
      <div class="flex flex-col items-center gap-4">
        <div class="bg-base-200 relative flex h-36 w-36 items-center justify-center overflow-hidden rounded-full border">
          @if ($kepalaSekolah?->photo && Storage::exists($kepalaSekolah->photo))
            <img class="h-full w-full object-cover" id="previewImg" src="{{ asset("storage/$kepalaSekolah->photo") }}"
              alt="Preview Foto" />
          @else
            <img class="hidden h-full w-full object-cover" id="previewImg" src="{{ asset('img/avatar-placeholder.png') }}"
              alt="Preview Foto" />
            <span class="text-base-content/40 px-4 text-center text-xs" id="previewPlaceholder">
              Preview Foto
            </span>
          @endif
        </div>
        <label class="btn btn-sm btn-outline btn-primary cursor-pointer gap-2" for="photo">
          <span class="icon-[tabler--upload] size-4"></span>
          Pilih Foto
        </label>
        <input class="hidden" id="photo" name="photo" type="file" accept="image/*"
          onchange="previewImage(event)" />
        <p class="text-base-content/60 text-xs">
          Disarankan foto formal, rasio 1:1
        </p>
      </div>
      <div class="space-y-5">
        <div>
          <label class="label-text">Nama Lengkap</label>
          <input class="input input-bordered w-full" name="name" type="text"
            value="{{ old('name', $kepalaSekolah?->name) }}" placeholder="Contoh: Drs. Ahmad Sahroni M.Bg" />
        </div>
        <div>
          <label class="label-text">NIP</label>
          <input class="input input-bordered w-full" name="nip" type="text"
            value="{{ old('nip', $kepalaSekolah?->nip) }}" placeholder="Masukkan NIP" />
        </div>
      </div>
      <div class="flex justify-end">
        <button class="btn btn-primary btn-gradient">
          Simpan
        </button>
      </div>
    </form>
  </div>
@endsection

<script>
  function previewImage(event) {
    const img = document.getElementById('previewImg')
    const placeholder = document.getElementById('previewPlaceholder')

    if (!event.target.files || !event.target.files[0]) return

    img.src = URL.createObjectURL(event.target.files[0])
    img.classList.remove('hidden')
    placeholder.classList.add('hidden')
  }
</script>
