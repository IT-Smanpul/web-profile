@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <div class="bg-base-200 relative overflow-hidden pb-12 pt-28 sm:pb-20 lg:pb-28">
      <div
        class="bg-primary/20 size-136 pointer-events-none absolute -top-40 left-1/2 -translate-x-1/2 rounded-full blur-3xl">
      </div>
      <div class="h-112 w-md pointer-events-none absolute -bottom-40 -left-40 rounded-full bg-yellow-400/20 blur-3xl">
      </div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-14 space-y-6 text-center sm:mb-20 lg:mb-24">
          <div class="flex justify-center">
            <span class="bg-primary text-primary-content rounded-full px-4 py-1 text-sm font-medium shadow">
              Prestasi Sekolah
            </span>
          </div>
          <h1 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
            Daftar Prestasi Sekolah
          </h1>
          <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
            Berbagai capaian akademik dan non-akademik yang telah diraih sebagai
            wujud komitmen sekolah dalam mengembangkan potensi peserta didik.
          </p>
        </div>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          @forelse ($achievements as $achievement)
            <div
              class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
              <figure class="relative h-52 overflow-hidden">
                <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                  src="{{ asset("storage/$achievement->image") }}" alt="Gambar {{ $achievement->name }}" />
                <span @class([
                    'absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-medium text-white backdrop-blur',
                    'bg-primary/90' => $achievement->category === 'Akademik',
                    'bg-secondary/90' => $achievement->category === 'Non-Akademik',
                ])>
                  {{ Str::ucfirst($achievement->category) }}
                </span>
              </figure>
              <div class="relative space-y-3 p-6">
                <h3 class="text-lg font-semibold leading-snug">
                  {{ $achievement->name }}
                </h3>
                <p class="text-base-content/70 line-clamp-3 text-sm">
                  {{ $achievement->description }}
                </p>
              </div>
            </div>
          @empty
            <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
              <p class="text-base-content/60">
                Belum ada prestasi yang ditambahkan.
              </p>
            </div>
          @endforelse
        </div>
        @if ($achievements->hasPages())
          <div class="mt-16 flex justify-center">
            {{ $achievements->links() }}
          </div>
        @endif
      </div>
    </div>
  </main>
  <x-ui.footer />
@endsection
