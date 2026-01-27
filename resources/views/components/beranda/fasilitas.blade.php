@use('App\Models\Facility')

<div class="bg-base-100 relative overflow-hidden py-12 sm:py-20 lg:py-28">
  <div class="bg-primary/15 size-104 pointer-events-none absolute -right-32 -top-32 rounded-full blur-3xl">
  </div>
  <div class="size-120 pointer-events-none absolute -bottom-32 -left-32 rounded-full bg-green-400/15 blur-3xl">
  </div>
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-14 space-y-6 text-center sm:mb-20 lg:mb-24">
      <div class="flex justify-center">
        <span class="bg-primary text-primary-content rounded-full px-4 py-1 text-sm font-medium shadow">
          Fasilitas Sekolah
        </span>
      </div>
      <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
        Sarana & Prasarana Pendukung
      </h2>
      <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        Berbagai fasilitas pendukung disediakan untuk menciptakan
        lingkungan belajar yang nyaman, aman, dan mendukung
        pengembangan potensi peserta didik secara optimal.
      </p>
    </div>
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @forelse (Facility::take(6)->get() as $facility)
        <div
          class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <figure class="relative h-56 overflow-hidden">
            <a data-fancybox="{{ $facility->name }}" href="{{ asset("storage/$facility->photo") }}">
              <img class="h-full w-full object-cover transition duration-500"
                src="{{ asset("storage/$facility->photo") }}" alt="{{ $facility->name }}" />
            </a>
            @if (Storage::directoryExists("images/fasilitas/$facility->id/galeri"))
              @foreach (Storage::files("images/fasilitas/$facility->id/galeri") as $file)
                <a data-fancybox="{{ $facility->name }}" href="{{ asset("storage/$file") }}">
                  <img class="h-full w-full object-cover transition duration-500" src="{{ asset("storage/$file") }}"
                    alt="{{ $facility->name }}" />
                </a>
              @endforeach
            @endif
          </figure>
          <div class="relative space-y-4 p-6">
            <h3 class="text-xl font-semibold">
              {{ $facility->name }}
            </h3>
            <p class="text-base-content/80 text-sm leading-relaxed">
              {{ $facility->description }}
            </p>
          </div>
        </div>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada data fasilitas yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>
    <div class="mt-14 text-center">
      <a class="btn btn-primary btn-gradient btn-lg" href="{{ route('fasilitas') }}">
        Lihat Semua Fasilitas
        <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
      </a>
    </div>
  </div>
</div>
