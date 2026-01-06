@extends('dashboard.layout')

@section('title', 'Tambah Fasilitas')

@section('dashboard-content')
  <div class="relative">
    <div class="bg-base-100 relative mx-auto w-full rounded-3xl border p-8 shadow-sm">
      <div class="mb-8 space-y-2">
        <h2 class="text-xl font-semibold">Tambah Fasilitas</h2>
        <p class="text-base-content/60 text-sm">
          Tambahkan data fasilitas yang akan ditampilkan di website sekolah
        </p>
      </div>
      @if ($errors->any())
        <div class="alert alert-error mb-6 rounded-xl">
          <span class="icon-[tabler--alert-circle] size-5"></span>
          <div>
            <p class="font-semibold">Terjadi kesalahan</p>
            <p class="text-sm">Silakan periksa kembali input yang kamu isi.</p>
          </div>
        </div>
      @endif
      <form class="space-y-6" method="POST" action="{{ route('fasilitas.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-control">
          <label class="label">
            <span class="label-text font-medium">Nama Fasilitas</span>
          </label>
          <input class="input input-bordered @error('name') input-error @enderror w-full" name="name" type="text"
            value="{{ old('name') }}" placeholder="Contoh: Laboratorium Komputer" />
          @error('name')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text font-medium">Deskripsi</span>
          </label>
          <textarea class="textarea textarea-bordered @error('description') textarea-error @enderror w-full" name="description"
            rows="4" placeholder="Deskripsi singkat fasilitas...">{{ old('description') }}</textarea>
          @error('description')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text font-medium">Foto Fasilitas</span>
          </label>
          <div
            class="bg-base-200 @error('image') border-error @enderror mb-3 flex h-44 items-center justify-center overflow-hidden rounded-2xl border"
            id="imagePreview">
            <span class="text-base-content/40 text-sm" id="imagePlaceholder">
              Preview Gambar
            </span>
            <img class="hidden h-full w-full object-cover" id="previewImg" alt="preview image" />
          </div>
          <input class="hidden" id="image" name="image" type="file" accept="image/*"
            onchange="previewImage(event)" />
          <label for="image" @class([
              'btn btn-outline w-full cursor-pointer gap-2',
              'btn-error' => $errors->has('image'),
              'btn-primary' => !$errors->has('image'),
          ])>
            <span class="icon-[tabler--upload] size-5"></span>
            Pilih Gambar
          </label>
          @error('image')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
          <p class="text-base-content/60 mt-1 text-xs">
            Disarankan rasio 16:9 (JPG / PNG)
          </p>
        </div>
        <div class="flex justify-end gap-3 pt-4">
          <a class="btn btn-ghost" href="{{ route('fasilitas.index') }}">
            Batal
          </a>
          <button class="btn btn-primary btn-gradient" type="submit">
            Tambah Fasilitas
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

<script>
  function previewImage(event) {
    const input = event.target;
    const placeholder = document.getElementById("imagePlaceholder")
    const preview = document.getElementById("previewImg");

    if (!input.files || !input.files[0]) return;

    preview.src = URL.createObjectURL(input.files[0]);
    preview.classList.remove("hidden");
    placeholder.classList.add("hidden");
  }
</script>
