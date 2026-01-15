@extends('dashboard.layout')

@section('title', 'Edit Wakil Kepala Sekolah')

@section('dashboard-content')
  <div class="space-y-8">
    <div>
      <h2 class="text-xl font-semibold">Edit Wakil Kepala Sekolah</h2>
      <p class="text-base-content/60 text-sm">
        Edit data Wakil Kepala Sekolah ke struktur organisasi
      </p>
    </div>
    <form class="bg-base-100 space-y-8 rounded-2xl p-6 shadow-sm"
      action="{{ route('wakil-kepala-sekolah.update', ['waka' => $waka->id]) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="flex flex-col items-center gap-4">
        @if (Storage::exists($waka->photo))
          <div
            class="bg-base-200 @error('photo') border-error @enderror relative flex h-32 w-32 items-center justify-center overflow-hidden rounded-full border">
            <img class="h-full w-full object-cover" id="wakilPreview" src="{{ asset("storage/$waka->photo") }}"
              alt="Preview Foto" />
          </div>
        @else
          <div
            class="bg-base-200 @error('photo') border-error @enderror relative flex h-32 w-32 items-center justify-center overflow-hidden rounded-full border">
            <img class="{{ old('photo') ? '' : 'hidden' }} h-full w-full object-cover" id="wakilPreview"
              alt="Preview Foto" />
            <span class="text-base-content/40 px-4 text-center text-xs" id="wakilPlaceholder">
              Preview Foto
            </span>
          </div>
        @endif
        <label class="btn btn-sm btn-outline btn-primary cursor-pointer gap-2" for="wakilPhoto">
          <span class="icon-[tabler--upload] size-4"></span>
          Pilih Foto
        </label>
        <input class="hidden" id="wakilPhoto" name="photo" type="file" accept="image/*"
          onchange="previewWakil(event)" />
        @error('photo')
          <p class="text-error text-xs">{{ $message }}</p>
        @enderror
        <p class="text-base-content/60 text-xs">
          Foto formal, rasio 1:1 (JPG / PNG, max 2MB)
        </p>
      </div>
      <div class="mx-auto max-w-xl space-y-5">
        <div>
          <label class="label-text">Nama Lengkap</label>
          <input class="input input-bordered @error('name') input-error @enderror w-full" name="name" type="text"
            value="{{ old('name', $waka->name) }}" placeholder="Masukkan Nama" required />
          @error('name')
            <p class="text-error mt-1 text-xs">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="label-text">NIP</label>
          <input class="input input-bordered @error('nip') input-error @enderror w-full" name="nip" type="text"
            value="{{ old('nip', $waka->nip) }}" placeholder="Masukkan NIP" />
          @error('nip')
            <p class="text-error mt-1 text-xs">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="label-text">Bidang / Jabatan</label>
          <input class="input input-bordered @error('position') input-error @enderror w-full" name="position"
            type="text" value="{{ old('position', $waka->position) }}" placeholder="Contoh : Waka Kurikulum"
            required />
          @error('position')
            <p class="text-error mt-1 text-xs">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <div class="flex justify-end gap-3">
        <a class="btn btn-ghost" href="{{ route('wakil-kepala-sekolah.index') }}">
          Batal
        </a>
        <button class="btn btn-primary btn-gradient">
          Edit Waka
        </button>
      </div>
    </form>
  </div>
@endsection

<script>
  function previewWakil(event) {
    const img = document.getElementById('wakilPreview')
    const placeholder = document.getElementById('wakilPlaceholder')

    if (!event.target.files || !event.target.files[0]) return

    img.src = URL.createObjectURL(event.target.files[0])
    img.classList.remove('hidden')
    placeholder.classList.add('hidden')
  }
</script>
