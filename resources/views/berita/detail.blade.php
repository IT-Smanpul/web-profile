@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <div class="bg-base-200 relative overflow-hidden py-12 sm:py-28">
      <div
        class="bg-primary/20 pointer-events-none absolute -top-32 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full blur-3xl">
      </div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <a class="text-base-content/60 hover:text-primary mb-6 inline-flex items-center gap-2 text-sm"
          href="{{ route('berita') }}">
          <span class="icon-[tabler--arrow-left] size-4"></span>
          Kembali ke Berita
        </a>
        <div class="grid gap-10 lg:grid-cols-[2.5fr_1fr]">
          <div>
            <header class="mb-6 space-y-3">
              <h1 class="text-base-content text-2xl font-bold leading-snug sm:text-3xl">
                {{ $article->title }}
              </h1>
              <div class="text-base-content/60 flex flex-wrap items-center gap-3 text-xs">
                <span>{{ $article->created_at->diffForHumans() }} oleh {{ $article->author->name }}</span>
              </div>
            </header>
            <figure class="mb-6 overflow-hidden rounded-2xl shadow-sm">
              <img class="h-full w-full object-cover" src="{{ asset("storage/$article->thumbnail") }}"
                alt="{{ $article->title }}" />
            </figure>
            <article class="text-base-content/80 space-y-4 text-base leading-relaxed">
              {!! $article->content !!}
            </article>
          </div>
          <aside class="space-y-4 lg:mt-24">
            <h3 class="text-base-content/70 text-sm font-semibold">
              Berita Lainnya
            </h3>
            <div class="space-y-4">
              @foreach ($others as $other)
                <a class="bg-base-100 group flex items-center gap-3 rounded-xl p-3 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md"
                  href="{{ route('berita.show', ['article' => $other->slug]) }}">
                  <img class="h-16 w-16 flex-shrink-0 rounded-lg object-cover"
                    src="{{ asset("storage/$other->thumbnail") }}" alt="{{ $other->title }}" />
                  <div class="min-w-0">
                    <h4 class="group-hover:text-primary line-clamp-2 text-sm font-medium leading-snug">
                      {{ $other->title }}
                    </h4>
                    <p class="text-base-content/50 mt-1 text-xs">
                      {{ $other->created_at->diffForHumans() }}
                    </p>
                  </div>
                </a>
              @endforeach
            </div>
          </aside>
        </div>
      </div>
    </div>
  </main>
  <x-ui.footer />
@endsection
