@extends('dashboard.layout')

@section('title', 'Tambah Fasilitas')

@section('dashboard-content')
  <div class="relative">
    <div class="bg-base-100 relative mx-auto w-full rounded-3xl border p-8 shadow-sm">
      <div class="mb-8 space-y-2">
        <h2 class="text-xl font-semibold">Edit Fasilitas</h2>
        <p class="text-base-content/60 text-sm">
          Edit data fasilitas yang akan ditampilkan di website sekolah
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
      <form class="space-y-6" method="POST" action="{{ route('fasilitas.update', ['facility' => $facility]) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-control">
          <label class="label">
            <span class="label-text font-medium">Nama Fasilitas</span>
          </label>
          <input class="input input-bordered @error('name') input-error @enderror w-full" name="name" type="text"
            value="{{ old('name', $facility->name) }}" placeholder="Contoh: Laboratorium Komputer" />
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
            rows="4" placeholder="Deskripsi singkat fasilitas...">{{ old('description', $facility->description) }}</textarea>
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
            <span class="text-base-content/40 hidden text-sm" id="imagePlaceholder">
              Preview Gambar
            </span>
            <img class="h-full w-full object-cover" id="previewImg" src="{{ asset("storage/$facility->image") }}"
              alt="Preview Image" />
          </div>
          <input class="file-input file-input-bordered @error('image') file-input-error @enderror w-full" name="image"
            type="file" accept="image/*" onchange="previewImage(event)" />
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
            Perbarui Fasilitas
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

<script>
  function previewImage(event) {
    const file = event.target.files[0];
    const previewImg = document.getElementById("previewImg");
    const placeholder = document.getElementById("imagePlaceholder");

    if (!file) return;

    const reader = new FileReader();

    reader.onload = function(e) {
      previewImg.src = e.target.result;
      previewImg.classList.remove("hidden");
      placeholder.classList.add("hidden");
    };

    reader.readAsDataURL(file);
  }
</script>
