@use('App\Models\Article')

@php
  $featured = Article::published()->latest()->first();
  $articles = Article::published()->latest()->skip(1)->take(4)->get();
@endphp

<div class="bg-base-100 relative overflow-hidden py-12 sm:py-20 lg:py-28">
  <div class="bg-primary/20 size-120 pointer-events-none absolute -right-40 -top-40 rounded-full blur-3xl">
  </div>
  <div class="size-104 pointer-events-none absolute -bottom-40 -left-40 rounded-full bg-sky-400/20 blur-3xl">
  </div>
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-14 space-y-6 text-center sm:mb-20">
      <div class="flex justify-center">
        <span class="rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
          Berita & Kegiatan
        </span>
      </div>
      <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
        Informasi Terbaru Sekolah
      </h2>
      <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        Informasi terbaru seputar kegiatan sekolah serta berbagai momen kebersamaan di SMA Negeri 10 Pontianak.
      </p>
    </div>
    @if (!$featured && $articles->isEmpty())
      <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
        <p class="text-base-content/60">
          Belum ada berita yang dipublikasikan.
        </p>
      </div>
    @else
      <div class="grid gap-8 lg:grid-cols-3 lg:items-stretch">
        <a class="bg-base-100 group relative flex h-full flex-col overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl lg:col-span-2"
          href="{{ route('berita.show', ['article' => $featured->slug]) }}">
          <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
            <div class="bg-primary/20 absolute -right-20 -top-20 h-40 w-40 rounded-full blur-2xl"></div>
          </div>
          <figure class="relative flex-1 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
              src="{{ asset("storage/$featured->thumbnail") }}" alt="Kegiatan Sekolah" />
          </figure>
          <div class="relative space-y-3 p-6 sm:p-8">
            <span class="text-primary text-xs font-medium">
              {{ $featured->created_at->diffForHumans() }} oleh {{ $featured->author->name }}
            </span>
            <h3 class="text-xl font-semibold sm:text-2xl">
              {{ $featured->title }}
            </h3>
            <p class="text-base-content/70 text-sm sm:text-base">
              {{ Str::limit($featured->content) }}
            </p>
          </div>
        </a>
        <div class="grid h-full grid-rows-4 gap-6">
          @foreach ($articles as $article)
            <a class="border-base-content/10 bg-base-100 group flex gap-4 rounded-2xl border p-4 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md"
              href="{{ route('berita.show', ['article' => $article->slug]) }}">
              <img class="h-20 w-20 flex-shrink-0 rounded-xl object-cover" src="{{ asset('img/berita/berita-2.jpg') }}"
                alt="Berita Sekolah" />
              <div class="flex flex-col justify-between gap-1">
                <span class="text-base-content/60 text-xs">
                  {{ $article->created_at->diffForHumans() }} oleh {{ $article->author->name }}
                </span>
                <h4 class="line-clamp-2 text-sm font-semibold leading-snug">
                  {{ $article->title }}
                </h4>
                <p class="text-base-content/70 line-clamp-2 text-xs leading-relaxed">
                  {{ Str::limit($article->content) }}
                </p>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    @endif
    <div class="mt-14 text-center">
      <a class="btn btn-primary btn-gradient btn-lg" href="{{ route('berita') }}">
        Lihat Semua Berita
        <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
      </a>
    </div>
  </div>
</div>
