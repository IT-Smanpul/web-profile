@extends('dashboard.layout')

@section('title', 'Preview Berita')

@section('dashboard-content')
  <div class="bg-base-200 relative overflow-hidden rounded-3xl p-6 sm:p-10">
    <div class="mx-auto mb-6 flex max-w-3xl flex-wrap items-center justify-between gap-3">
      <span class="bg-warning/20 text-warning rounded-full px-4 py-1 text-sm font-medium">
        Mode Preview (Belum Dipublikasikan)
      </span>
      <div class="flex gap-2">
        @if (!$article->published)
          <form action="{{ route('berita.publish', $article->slug) }}" method="POST"
            onsubmit="return confirm('Publikasikan berita ini?')">
            @csrf
            @method('PATCH')
            <button class="btn btn-sm btn-success gap-1">
              <span class="icon-[tabler--send] size-4"></span>
              Publish
            </button>
          </form>
        @else
          <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
            Sudah Dipublikasikan
          </span>
        @endif
        <a class="btn btn-sm btn-outline btn-primary" href="{{ route('berita.edit', $article->id) }}">
          <span class="icon-[tabler--edit] size-4"></span>
          Edit
        </a>
        <a class="btn btn-sm btn-ghost" href="{{ route('berita.index') }}">
          Kembali
        </a>
      </div>
    </div>
    <div class="mx-auto max-w-3xl">
      <header class="mb-6 space-y-3">
        <h1 class="text-base-content text-2xl font-bold leading-snug sm:text-3xl">
          {{ $article->title }}
        </h1>
        <div class="text-base-content/60 flex flex-wrap items-center gap-3 text-xs">
          <span>{{ $article->created_at->diffInDays(now()) < 1 ? $article->created_at->diffForHumans() : $article->created_at->translatedFormat('d F Y') }}
            oleh {{ $article->author->name }}</span>
        </div>
      </header>
      <figure class="bg-base-100 mb-6 overflow-hidden rounded-2xl border">
        <img class="h-full w-full object-cover" src="{{ asset('storage/' . $article->thumbnail) }}"
          alt="{{ $article->title }}" />
      </figure>
      <article class="text-base-content/80 space-y-4 text-base leading-relaxed">
        {!! $article->content !!}
      </article>
    </div>
  </div>
@endsection
