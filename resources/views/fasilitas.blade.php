@use('App\Models\Facility')

@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <section class="bg-base-200 relative overflow-hidden py-20 sm:py-24">
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>
      <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        <span class="inline-block rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
          Fasilitas Sekolah
        </span>
        <h1 class="mt-6 text-4xl font-bold md:text-5xl">
          Sarana & Prasarana
        </h1>
        <p class="text-base-content/80 mx-auto mt-6 max-w-3xl text-lg leading-relaxed">
          Berbagai fasilitas pendukung disediakan untuk menciptakan
          lingkungan belajar yang nyaman, aman, dan mendukung
          pengembangan potensi peserta didik secara optimal.
        </p>
      </div>
    </section>
    <section class="bg-base-100 py-20">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
          @foreach (Facility::all() as $facility)
            <div
              class="bg-base-100 group overflow-hidden rounded-3xl border shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
              <div class="relative h-56 overflow-hidden">
                <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                  src="{{ asset("storage/$facility->image") }}" alt="{{ $facility->name }}" />
              </div>
              <div class="space-y-3 p-6">
                <h3 class="text-xl font-semibold">
                  {{ $facility->name }}
                </h3>
                <p class="text-base-content/70 text-sm leading-relaxed">
                  {{ $facility->description }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <section class="bg-base-200 py-16">
      <div class="mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold md:text-3xl">
          Ingin Mengenal Sekolah Lebih Dekat?
        </h2>
        <p class="text-base-content/70 mx-auto mt-4 max-w-2xl">
          Pelajari lebih lanjut mengenai profil, prestasi,
          serta informasi penerimaan peserta didik baru.
        </p>

        <div class="mt-8 flex justify-center gap-4">
          <a class="btn btn-primary btn-gradient" href="/profil">
            Profil Sekolah
          </a>
          <a class="btn btn-outline" href="/ppdb">
            Informasi PPDB
          </a>
        </div>
      </div>
    </section>
  </main>
  <x-ui.footer />
@endsection
