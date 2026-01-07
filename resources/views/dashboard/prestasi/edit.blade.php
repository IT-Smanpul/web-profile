@extends('dashboard.layout')

@section('title', 'Edit Prestasi')

@section('dashboard-content')
  <div class="relative">
    <div class="bg-base-100 relative mx-auto w-full rounded-3xl border p-8 shadow-sm">
      <div class="mb-8 space-y-2">
        <h2 class="text-xl font-semibold">Edit Prestasi</h2>
        <p class="text-base-content/60 text-sm">
          Edit data prestasi yang akan ditampilkan di website sekolah
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
      <form class="space-y-6" method="POST" action="{{ route('prestasi.update', ['achievement' => $achievement->id]) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="w-full">
          <label class="label-text" for="name">Nama Prestasi</label>
          <input class="input @error('name') is-invalid @enderror" id="name" name="name" type="text"
            value="{{ old('name', $achievement->name) }}" placeholder="Contoh : Juara 1 Menghina Pemerintah" />
          @error('name')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div class="w-full">
          <label class="label-text" for="kategori">Kategori</label>
          <select class="select @error('category') is-invalid @enderror" id="kategori" name="category">
            <option {{ old('category', $achievement->category) === 'Akademik' ? 'selected' : '' }}>
              Akademik
            </option>
            <option {{ old('category', $achievement->category) === 'Non-Akademik' ? 'selected' : '' }}>
              Non-Akademik
            </option>
          </select>
          @error('category')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div class="w-full">
          <label class="label-text" for="deskripsi">Deskripsi</label>
          <textarea class="textarea @error('description') is-invalid @enderror" id="deskripsi" name="description"
            placeholder="Singkat Saja">{{ old('description', $achievement->description) }}</textarea>
          @error('description')
            <span class="helper-text">{{ $message }}</span>
          @enderror
        </div>
        <div class="space-y-3">
          <label class="label-text">Gambar</label>
          <div
            class="bg-base-200 @error('image') border-error @enderror flex h-44 items-center justify-center overflow-hidden rounded-2xl border"
            id="imagePreview">
            <img class="h-full w-full object-cover" id="previewImg" src="{{ asset("storage/$achievement->image") }}"
              alt="preview image" />
          </div>

          {{-- Hidden input --}}
          <input class="hidden" id="image" name="image" type="file" accept="image/*"
            onchange="previewImage(event)" />

          {{-- Button upload --}}
          <label for="image" @class([
              'btn btn-outline w-full cursor-pointer gap-2',
              'btn-error' => $errors->has('image'),
              'btn-primary' => !$errors->has('image'),
          ])>
            <span class="icon-[tabler--upload] size-5"></span>
            Pilih Gambar
          </label>

          {{-- Error --}}
          @error('image')
            <p class="text-error text-xs">{{ $message }}</p>
          @enderror

          <p class="text-base-content/60 text-xs">
            Disarankan rasio 16:9 (JPG / PNG)
          </p>
        </div>

        <div class="flex justify-end gap-3 pt-4">
          <a class="btn btn-ghost" href="{{ route('prestasi.index') }}">
            Batal
          </a>
          <button class="btn btn-primary btn-gradient" type="submit">
            Perbarui Prestasi
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
