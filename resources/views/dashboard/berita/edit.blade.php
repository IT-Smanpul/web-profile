@extends('dashboard.layout')

@section('title', 'Edit Berita')

@section('dashboard-content')
  <div class="relative">
    <div class="bg-base-100 relative mx-auto w-full rounded-3xl border p-8 shadow-sm">
      <div class="mb-8 space-y-2">
        <h2 class="text-xl font-semibold">Edit Berita</h2>
        <p class="text-base-content/60 text-sm">
          Edit berita dan informasi yang akan ditampilkan di website sekolah
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
      <form class="space-y-6" action="{{ route('berita.update', ['article' => $article->slug]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @METHOD('PATCH')
        <div>
          <label class="label">
            <span class="label-text font-medium">Judul Berita</span>
          </label>
          <input name="title" type="text" value="{{ old('title', $article->title) }}" @class([
              'input input-bordered w-full',
              'input-error' => $errors->has('title'),
          ])
            placeholder="Contoh: SMA Negeri X Raih Juara Olimpiade" />
          @error('title')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
        </div>
        <div>
          <label class="label">
            <span class="label-text font-medium">Isi Berita</span>
          </label>
          <input id="content" name="content" type="hidden" value="{{ old('content', $article->content) }}">
          <trix-editor class="trix-content" input="content"></trix-editor>
          @error('content')
            <p class="text-error text-xs">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="label">
            <span class="label-text font-medium">Thumbnail Berita</span>
          </label>
          <div
            class="bg-base-200 @error('thumbnail') border-error @enderror mb-3 flex h-44 items-center justify-center overflow-hidden rounded-2xl border"
            id="imagePreview">
            <img class="h-full w-full object-cover" id="previewImg" src="{{ asset("storage/$article->thumbnail") }}"
              alt="preview thumbnail" />
          </div>
          <input class="hidden" id="thumbnail" name="thumbnail" type="file" accept="image/*"
            onchange="previewImage(event)" />
          <label for="thumbnail" @class([
              'btn btn-outline w-full cursor-pointer gap-2',
              'btn-primary' => !$errors->has('thumbnail'),
              'btn-error' => $errors->has('thumbnail'),
          ])>
            <span class="icon-[tabler--upload] size-5"></span>
            Pilih Thumbnail
          </label>
          @error('thumbnail')
            <p class="text-error text-xs">{{ $message }}</p>
          @enderror
          <p class="text-base-content/60 mt-1 text-xs">
            Disarankan rasio 16:9 (JPG / PNG, max 2MB)
          </p>
        </div>
        <div class="flex items-center justify-end gap-3 pt-4">
          <a class="btn btn-ghost" href="{{ route('berita.index') }}">
            Batal
          </a>
          <button class="btn btn-primary btn-gradient" type="submit">
            Simpan Berita
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

<script>
  function previewImage(event) {
    const input = event.target
    const preview = document.getElementById("previewImg")

    if (!input.files || !input.files[0]) return

    preview.src = URL.createObjectURL(input.files[0])
  }
</script>
