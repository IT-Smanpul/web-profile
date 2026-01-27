@use('App\Models\Ekskul')

<div class="bg-base-100 relative overflow-hidden py-12 sm:py-20 lg:py-28">
  <div class="bg-primary/15 pointer-events-none absolute -left-32 -top-32 h-96 w-96 rounded-full blur-3xl">
  </div>
  <div class="pointer-events-none absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-green-400/15 blur-3xl">
  </div>
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-14 space-y-6 text-center sm:mb-20 lg:mb-24">
      <div class="flex justify-center">
        <span class="bg-primary text-primary-content rounded-full px-4 py-1 text-sm font-medium shadow">
          Ekstrakurikuler
        </span>
      </div>
      <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
        Wadah Pengembangan Minat & Bakat
      </h2>
      <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        Beragam kegiatan ekstrakurikuler disediakan sebagai wadah bagi peserta didik
        untuk mengembangkan minat, bakat, kreativitas, serta membentuk karakter dan
        kerja sama di luar kegiatan akademik.
      </p>
    </div>
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @forelse (Ekskul::take(6)->get() as $ekskul)
        <article class="bg-base-100 group rounded-3xl border shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <div class="relative overflow-hidden rounded-3xl">
            <div class="bg-primary absolute left-0 top-0 h-full w-1"></div>
            <figure class="relative aspect-video overflow-hidden">
              <a class="block h-full w-full" data-fancybox="{{ $ekskul->name }}"
                href="{{ asset("storage/$ekskul->photo") }}">
                <img class="h-full w-full object-cover" src="{{ asset("storage/$ekskul->photo") }}"
                  alt="{{ $ekskul->name }}" />
              </a>
              @if (Storage::directoryExists("images/ekskul/$ekskul->id/galeri"))
                @foreach (Storage::files("images/ekskul/$ekskul->id/galeri") as $file)
                  <a class="block h-full w-full" data-fancybox="{{ $ekskul->name }}"
                    href="{{ asset("storage/$file") }}">
                    <img class="h-full w-full object-cover" src="{{ asset("storage/$file") }}"
                      alt="{{ $ekskul->name }}" />
                  </a>
                @endforeach
              @endif
            </figure>
            <div class="space-y-3 p-6">
              <h3 class="text-xl font-semibold">
                {{ $ekskul->name }}
              </h3>
              <p class="text-base-content/80 text-sm leading-relaxed">
                {{ $ekskul->description }}
              </p>
            </div>
          </div>
        </article>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada data ekstrakurikuler yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>
    <div class="mt-14 text-center">
      <a class="btn btn-primary btn-gradient btn-lg" href="{{ route('ekskul') }}">
        Lihat Semua Ekstrakurikuler
        <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
      </a>
    </div>
  </div>
</div>
