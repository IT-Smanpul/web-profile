<?php

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

new class extends Component
{
    use WithFileUploads;

    public string $title = '';

    public string $content = '';

    public ?Article $article = null;

    public ?TemporaryUploadedFile $thumbnail = null;

    public function mount(Article $article): void
    {
        $this->article = $article;

        $this->fill($article->except('thumbnail'));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! is_null($data->get('thumbnail'))) {
            if (Storage::exists($this->article->thumbnail)) {
                Storage::delete($this->article->thumbnail);
            }

            $data->put('thumbnail', $this->thumbnail->store('images/berita'));
        } else {
            $data->forget(['thumbnail']);
        }

        $this->article?->update($data->all());

        $this->redirectRoute('berita.index');
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'thumbnail' => ['nullable', File::image()->max(2048)],
        ];
    }
};
?>

<div class="relative">
  <div class="mb-8">
    <h2 class="text-xl font-semibold">Edit Berita</h2>
    <p class="text-base-content/60 text-sm">
      Edit berita yang akan ditampilkan di website sekolah
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
      <div>
        <label class="label-text">Judul Berita</label>
        <input type="text" wire:model="title" @class(['input w-full', 'is-invalid' => $errors->has('title')])
          placeholder="Contoh: SMA Negeri X Raih Juara Olimpiade" />
        @error('title')
          <span class="helper-text">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label class="label-text">Isi Berita</label>
        <x-editor wire:ignore wire:model="content" />
        @error('content')
          <p class="helper-text text-error">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label class="label-text font-medium">Thumbnail Berita</label>
        <div
          class="bg-base-200 @error('thumbnail') border-error @enderror mb-3 flex h-44 items-center justify-center overflow-hidden rounded-2xl border">
          @if ($thumbnail)
            <img class="h-full w-full object-cover" src="{{ $thumbnail->temporaryUrl() }}" alt="Thumbnail Berita" />
          @elseif($article->thumbnail)
            <img class="h-full w-full object-cover" src="{{ asset("storage/$article->thumbnail") }}"
              alt="Thumbnail Berita" />
          @else
            <span class="text-base-content/40 text-sm">
              Preview Thumbnail
            </span>
          @endif
        </div>
        <div class="max-w-sm">
          <input id="fileInputHelperText" type="file" @class(['input', 'is-invalid' => $errors->has('thumbnail')]) wire:model="thumbnail" />
          @error('thumbnail')
            <span class="helper-text">{{ $message }}</span>
          @else
            <span class="helper-text">Disarankan rasio 16:9 (JPG / PNG, max 2MB)</span>
          @enderror
        </div>
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