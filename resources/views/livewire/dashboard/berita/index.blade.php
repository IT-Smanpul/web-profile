<div class="space-y-6">
  <div class="flex flex-wrap items-center justify-between gap-4">
    <div>
      <h2 class="text-xl font-semibold">Berita Sekolah</h2>
      <p class="text-base-content/60 text-sm">
        Kelola berita yang ditampilkan di website
      </p>
    </div>
    <div class="flex items-center gap-2">
      <input class="input max-w-sm" type="text" aria-label="input" wire:model.live="keyword" placeholder="Cari Berita" />
      <a class="btn btn-primary btn-gradient" href="{{ route('berita.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Berita
      </a>
    </div>
  </div>
  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($this->articles as $article)
      <div
        class="bg-base-100 group relative overflow-hidden rounded-2xl border shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
        <div class="relative h-40 overflow-hidden">
          <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
            src="{{ asset("storage/$article->thumbnail") }}" alt="{{ $article->title }}" />
          <span
            class="{{ $article->published ? 'bg-green-500/90' : 'bg-gray-500/90' }} absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-medium text-white">
            {{ $article->published ? 'Published' : 'Draft' }}
          </span>
        </div>
        <div class="p-5 pb-16">
          <div class="flex items-center gap-2">
            <div class="avatar">
              <div class="size-10 rounded-full">
                <img
                  src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/avatars/8.png') }}"
                  alt="avatar" />
              </div>
            </div>
            <div class="flex flex-col">
              <span class="text-sm font-medium">
                {{ $article->author->name }}
              </span>
              <span class="text-base-content/50 text-xs">
                {{ $article->created_at->translatedFormat('d F Y') }}
              </span>
            </div>
          </div>
          <h3 class="mt-3 line-clamp-2 font-semibold">
            {{ $article->title }}
          </h3>
          <p class="text-base-content/60 mt-1 line-clamp-2 text-sm">
            {{ Str::limit(strip_tags($article->content)) }}
          </p>
        </div>
        <div class="absolute bottom-4 right-4 flex gap-2">
          @if ($article->published)
            <div class="tooltip">
              <button class="tooltip-toggle btn btn-sm btn-warning" type="button" aria-label="Unpublish Berita"
                @click="$dispatch('unpublish-article', { article: '{{ $article->slug }}' })">
                <span class="icon-[tabler--x]"></span>
              </button>
              <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                <span class="tooltip-body tooltip-warning">Unpublish Berita</span>
              </span>
            </div>
          @else
            <div class="tooltip">
              <button class="tooltip-toggle btn btn-sm btn-primary" type="button" aria-label="Publish Berita"
                @click="$dispatch('publish-article', { article: '{{ $article->slug }}' })">
                <span class="icon-[tabler--check] size-4"></span>
              </button>
              <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                <span class="tooltip-body tooltip-primary">Publish</span>
              </span>
            </div>
          @endif
          <div class="tooltip">
            <a class="btn btn-sm btn-accent" href="{{ route('berita.show', ['article' => $article->slug]) }}"
              target="_blank">
              <span class="icon-[tabler--external-link] size-4"></span>
            </a>
            <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
              <span class="tooltip-body tooltip-accent">Lihat Berita</span>
            </span>
          </div>
          <div class="tooltip">
            <a class="btn btn-sm btn-soft btn-warning"
              href="{{ route('berita.edit', ['article' => $article->slug]) }}">
              <span class="icon-[tabler--edit] size-4"></span>
            </a>
            <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
              <span class="tooltip-body tooltip-warning">Edit Berita</span>
            </span>
          </div>
          <div class="tooltip">
            <button class="btn btn-sm btn-soft btn-error"
              @click="$dispatch('delete-article', { article: '{{ $article->slug }}' })">
              <span class="icon-[tabler--trash] size-4"></span>
            </button>
            <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
              <span class="tooltip-body tooltip-error">Hapus Berita</span>
            </span>
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
        <p class="text-base-content/60">
          Belum ada berita yang ditambahkan.
        </p>
      </div>
    @endforelse
  </div>
  <livewire:dashboard.berita.publish />
  <livewire:dashboard.berita.unpublish />
  <livewire:dashboard.berita.delete />
  @if ($this->articles->hasPages())
    <div class="flex justify-end pt-6">
      {{ $this->articles->links() }}
    </div>
  @endif
</div>
