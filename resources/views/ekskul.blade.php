@use('App\Models\Ekskul')

@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <section class="bg-base-200 relative overflow-hidden py-28 pb-20">
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-14 space-y-6 text-center sm:mb-20 lg:mb-24">
          <div class="flex justify-center">
            <span class="bg-primary text-primary-content rounded-full px-4 py-1 text-sm font-medium shadow">
              Ekskul
            </span>
          </div>
          <h1 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
            Ekstrakurikuler Sekolah
          </h1>
          <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
            Beragam kegiatan ekstrakurikuler disediakan sebagai wadah bagi peserta didik
            untuk mengembangkan minat, bakat, kreativitas, serta membentuk karakter dan
            kerja sama di luar kegiatan akademik.
          </p>
        </div>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          @forelse (Ekskul::all() as $ekskul)
            <article
              class="bg-base-100 group relative overflow-hidden rounded-3xl border shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
              <div class="bg-primary absolute left-0 top-0 h-full w-1"></div>
              <figure class="relative overflow-hidden">
                <a data-fancybox="{{ $ekskul->name }}" data-caption="{{ $ekskul->name }} - {{ $loop->iteration }}"
                  href="{{ asset("storage/$ekskul->photo") }}">
                  <img src="{{ asset("storage/$ekskul->photo") }}" alt="Thumbnail">
                </a>
              </figure>
              <div class="space-y-3 p-6">
                <h3 class="text-xl font-semibold">
                  {{ $ekskul->name }}
                </h3>
                <p class="text-base-content/80 text-sm leading-relaxed">
                  {{ $ekskul->description }}
                </p>
              </div>
            </article>
          @empty
            <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
              <p class="text-base-content/60">
                Belum ada data ekskul.
              </p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </main>
  <x-ui.footer />
@endsection
