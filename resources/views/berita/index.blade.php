@extends('root')

@section('meta')
  <meta name="robots" content="index, follow" />
  <meta name="description"
    content="Berita dan informasi terbaru seputar kegiatan, pengumuman, prestasi, dan aktivitas sekolah SMA Negeri 10 Pontianak." />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="Berita Sekolah | SMA Negeri 10 Pontianak" />
  <meta property="og:description"
    content="Ikuti berita dan informasi terbaru dari SMA Negeri 10 Pontianak terkait kegiatan sekolah, pengumuman penting, dan prestasi siswa." />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ asset('img/og-berita.jpg') }}" />
@endsection

@section('content')
  <x-ui.navbar />
  <main>
    <div class="bg-base-200 relative overflow-hidden pb-12 pt-28 sm:pb-20 lg:pb-28">
      <div
        class="bg-primary/20 size-136 pointer-events-none absolute -top-40 left-1/2 -translate-x-1/2 rounded-full blur-3xl">
      </div>
      <div class="h-112 w-md pointer-events-none absolute -bottom-40 -left-40 rounded-full bg-green-400/20 blur-3xl">
      </div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-14 space-y-6 text-center sm:mb-20 lg:mb-24">
          <div class="flex justify-center">
            <span class="bg-primary rounded-full px-4 py-1 text-sm font-medium text-white shadow">
              Berita Sekolah
            </span>
          </div>
          <h1 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
            Informasi & Berita Terbaru
          </h1>
          <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
            Informasi terbaru seputar kegiatan, pengumuman, dan berbagai
            aktivitas yang berlangsung di lingkungan sekolah.
          </p>
        </div>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          @forelse ($articles as $article)
            <article
              class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
              <a class="absolute inset-0 z-10" href="{{ route('berita.show', ['article' => $article->slug]) }}"
                aria-label="Baca berita: {{ $article->title }}"></a>
              <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
                <div class="bg-primary/20 absolute -right-20 -top-20 h-40 w-40 rounded-full blur-2xl"></div>
              </div>
              <figure class="relative h-52 overflow-hidden">
                <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                  src="{{ asset("storage/$article->thumbnail") }}" alt="{{ $article->title }}" />
              </figure>
              <div class="relative space-y-3 p-6">
                <h3 class="line-clamp-2 text-lg font-semibold leading-snug">
                  {{ $article->title }}
                </h3>
                <p class="text-base-content/70 line-clamp-3 text-sm">
                  {{ Str::excerpt($article->content, 140) }}
                </p>
                <div class="text-base-content/60 flex items-center justify-between pt-3 text-xs">
                  <span>
                    {{ $article->created_at->diffForHumans() }}
                  </span>
                  <span class="text-primary inline-flex items-center gap-1 font-medium">
                    Baca Selengkapnya
                    <span class="icon-[tabler--arrow-right] size-4"></span>
                  </span>
                </div>
              </div>
            </article>
          @empty
            <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
              <p class="text-base-content/60">
                Belum ada berita yang dipublikasikan.
              </p>
            </div>
          @endforelse
        </div>
        @if ($articles->hasPages())
          <div class="mt-16 flex justify-center">
            {{ $articles->links() }}
          </div>
        @endif
      </div>
    </div>
  </main>
  <x-ui.footer />
@endsection
