<div class="relative space-y-8">
  <div>
    <h2 class="text-xl font-semibold">Edit Berita</h2>
    <p class="text-base-content/60 text-sm">
      Tambahkan berita yang akan ditampilkan di website sekolah
    </p>
  </div>
  <div class="bg-base-100 rounded-2xl border p-8 shadow-sm">
    @if ($errors->any())
      <div class="alert alert-error mb-8 rounded-xl">
        <span class="icon-[tabler--alert-circle] size-5"></span>
        <div>
          <p class="font-semibold">Terjadi kesalahan</p>
          <p class="text-sm">Silakan periksa kembali input yang kamu isi.</p>
        </div>
      </div>
    @endif
    <form class="flex flex-col gap-10 lg:flex-row" wire:submit="save">
      <div class="lg:w-105 lg:flex-shrink-0">
        <label class="label-text">Thumbnail Berita</label>
        <div class="space-y-4">
          <div
            class="bg-base-200 @error('thumbnail') border-error @enderror flex aspect-video items-center justify-center overflow-hidden rounded-2xl border">
            @if ($thumbnail)
              <img class="h-full w-full object-cover" src="{{ $thumbnail->temporaryUrl() }}" alt="Preview Thumbnail" />
            @elseif($article->thumbnail)
              <img class="h-full w-full object-cover" src="{{ asset("storage/$article->thumbnail") }}"
                alt="Preview Thumbnail" />
            @else
              <div class="text-base-content/40 text-center text-sm">
                Preview Thumbnail
              </div>
            @endif
          </div>
          <label @class([
              'btn btn-outline w-full cursor-pointer gap-2',
              'btn-primary' => !$errors->has('thumbnail'),
              'btn-error' => $errors->has('thumbnail'),
          ])>
            <span class="icon-[tabler--upload] size-5"></span>
            Pilih Thumbnail
            <input class="@error('thumbnail') is-invalid @enderror hidden" type="file" wire:model="thumbnail" />
          </label>
          @error('thumbnail')
            <p class="text-error text-xs">{{ $message }}</p>
          @else
            <p class="text-base-content/60 text-xs">
              JPG / PNG, maksimal 2MB
            </p>
          @enderror
        </div>
      </div>
      <div class="min-w-0 flex-1 space-y-6">
        <div>
          <label class="label-text">Judul Berita</label>
          <input class="input input-bordered @error('title') is-invalid @enderror w-full" type="text"
            wire:model="title" placeholder="Contoh: SMA Negeri X Raih Juara Olimpiade" />
          @error('title')
            <p class="helper-text">{{ $message }}</p>
          @enderror
        </div>
        <div class="min-w-0">
          <label class="label-text">Isi Berita</label>
          <x-editor wire:ignore wire:model="content" />
          @error('content')
            <p class="text-error text-xs">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex justify-end gap-3 pt-4">
          <a class="btn btn-ghost" href="{{ route('berita.index') }}">
            Batal
          </a>
          <button class="btn btn-primary btn-gradient" type="submit">
            Simpan Berita
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
