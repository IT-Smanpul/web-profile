@use('App\Models\Achievement')

<div class="bg-base-200 relative overflow-hidden py-12 sm:py-20 lg:py-28">
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
      <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
        Capaian & Prestasi Membanggakan
      </h2>
      <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        Berbagai capaian akademik dan non-akademik menjadi bukti
        komitmen sekolah dalam mendukung potensi, bakat, dan kerja keras
        peserta didik.
      </p>
    </div>
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @forelse (Achievement::latest()->take(6)->get() as $achievement)
        <div
          class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
            <div class="bg-primary/20 absolute -right-20 -top-20 h-40 w-40 rounded-full blur-2xl"></div>
          </div>
          <figure class="relative h-52 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
              src="{{ asset("storage/$achievement->photo") }}" alt="Gambar Prestasi {{ $achievement->name }}" />
            <span @class([
                'absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-medium text-white backdrop-blur',
                'bg-primary/90' => $achievement->category === 'Akademik',
                'bg-secondary/90' => $achievement->category === 'Non-Akademik',
            ])>
              {{ $achievement->category }}
            </span>
          </figure>
          <div class="relative space-y-3 p-6">
            <h3 class="text-lg font-semibold">{{ $achievement->name }}</h3>
            <p class="text-base-content/70 text-sm">{{ $achievement->description }}</p>
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
    <div class="mt-14 text-center">
      <a class="btn btn-primary btn-gradient btn-lg" href="{{ route('prestasi') }}">
        Lihat Semua Prestasi
        <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
      </a>
    </div>
  </div>
</div>
