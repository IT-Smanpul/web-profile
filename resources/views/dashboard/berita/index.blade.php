@extends('dashboard.layout')

@section('title', 'Berita')

@section('dashboard-content')
  <div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h2 class="text-xl font-semibold">Berita Sekolah</h2>
        <p class="text-base-content/60 text-sm">
          Kelola berita dan informasi terbaru yang ditampilkan di website
        </p>
      </div>
      <a class="btn btn-primary btn-gradient" href="{{ route('berita.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Berita
      </a>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse ($articles as $article)
        <div
          class="bg-base-100 group overflow-hidden rounded-2xl border shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
          <div class="relative h-40 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
              src="{{ asset("storage/$article->thumbnail") }}" alt="{{ $article->title }}" />
            <span
              class="{{ $article->published ? 'bg-green-500/90' : 'bg-gray-500/90' }} absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-medium text-white">
              {{ $article->published ? 'Published' : 'Draft' }}
            </span>
          </div>
          <div class="space-y-3 p-5">
            <div class="text-base-content/50 flex items-center justify-between text-xs">
              <span>
                {{ $article->created_at->translatedFormat('d F Y') }}
              </span>
            </div>
            <h3 class="line-clamp-2 font-semibold leading-snug">
              {{ $article->title }}
            </h3>
            <p class="text-base-content/60 line-clamp-2 text-sm">
              {{ Str::limit(strip_tags($article->content)) }}
            </p>
            <div class="flex items-center justify-between gap-2 pt-2">
              <div class="flex items-center gap-2">
                <div class="avatar">
                  <div class="size-10 rounded-full">
                    <img
                      src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/avatars/8.png') }}"
                      alt="avatar" />
                  </div>
                </div>
                <span class="text-base-content pt-1 text-sm">
                  {{ $article->author->name }}
                </span>
              </div>
              <div class="flex items-center gap-2 pt-2">
                @if ($article->published)
                  <div class="tooltip">
                    <form action="{{ route('berita.unpublish', ['article' => $article->slug]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <button class="btn btn-sm btn-warning" type="submit">
                        <span class="icon-[tabler--x] size-4"></span>
                      </button>
                    </form>
                    <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                      <span class="tooltip-body tooltip-warning">Batalkan Publish</span>
                    </span>
                  </div>
                @else
                  <div class="tooltip">
                    <form action="{{ route('berita.publish', ['article' => $article->slug]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <button class="btn btn-sm btn-success" type="submit">
                        <span class="icon-[tabler--check] size-4"></span>
                      </button>
                    </form>
                    <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                      <span class="tooltip-body tooltip-success">Publish</span>
                    </span>
                  </div>
                @endif
                @if ($article->published)
                  <div class="tooltip">
                    <a class="btn btn-sm btn-accent" href="{{ route('berita.show', ['article' => $article->slug]) }}"
                      target="_blank">
                      <span class="icon-[tabler--external-link] size-4"></span>
                    </a>
                    <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                      <span class="tooltip-body tooltip-accent">Lihat Berita</span>
                    </span>
                  </div>
                @else
                  <div class="tooltip">
                    <a class="btn btn-sm btn-accent" href="{{ route('berita.preview', ['article' => $article->slug]) }}">
                      <span class="icon-[tabler--eye] size-4"></span>
                    </a>
                    <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                      <span class="tooltip-body tooltip-accent">Preview</span>
                    </span>
                  </div>
                @endif
                <div class="tooltip">
                  <a class="btn btn-sm btn-soft btn-warning"
                    href="{{ route('berita.edit', ['article' => $article->slug]) }}" title="Edit Berita">
                    <span class="icon-[tabler--edit] size-4"></span>
                  </a>
                  <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                    <span class="tooltip-body tooltip-warning">Edit</span>
                  </span>
                </div>
                <div class="tooltip">
                  <form action="{{ route('berita.destroy', ['article' => $article->slug]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-soft btn-error" type="submit" title="Hapus Berita"
                      onclick="return confirm('Yakin ingin menghapus berita ini?')">
                      <span class="icon-[tabler--trash] size-4"></span>
                    </button>
                  </form>
                  <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                    <span class="tooltip-body tooltip-error">Hapus</span>
                  </span>
                </div>
              </div>
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

    @if ($articles->hasPages())
      <div class="flex justify-end pt-6">
        {{ $articles->links() }}
      </div>
    @endif
  </div>
@endsection
