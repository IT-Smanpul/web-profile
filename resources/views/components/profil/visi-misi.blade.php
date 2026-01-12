<section class="bg-base-100 relative overflow-hidden py-20 sm:py-24">
  <div class="pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full bg-blue-500/10 blur-3xl"></div>
  <div
    class="bg-primary/10 pointer-events-none absolute right-1/2 top-1/2 h-80 w-80 -translate-y-1/2 translate-x-1/2 rounded-full blur-3xl">
  </div>
  <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-red-400/10 blur-3xl">
  </div>
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="grid gap-20 lg:grid-cols-2">
      <div class="relative">
        <div class="mb-6 h-1 w-16 rounded-full bg-green-500"></div>
        <span class="text-base-content/50 text-sm font-medium uppercase tracking-widest">Visi</span>
        <h2 class="mt-4 text-4xl font-bold leading-tight md:text-5xl">
          Visi Sekolah
        </h2>
        <p class="text-base-content/80 mt-6 text-xl leading-relaxed">
          {{ $vision }}
        </p>
        <p class="text-base-content/60 mt-4 max-w-xl">
          Visi ini menjadi arah dan komitmen SMA Negeri 10 Pontianak
          dalam menyelenggarakan pendidikan yang bermakna dan berkelanjutan.
        </p>
      </div>
      <div class="relative">
        <div class="mb-6 h-1 w-16 rounded-full bg-green-500"></div>
        <span class="text-base-content/50 text-sm font-medium uppercase tracking-widest">Misi</span>
        <h2 class="mt-4 text-4xl font-bold leading-tight md:text-5xl">
          Misi Sekolah
        </h2>
        <ul class="mt-8 space-y-6">
          @foreach ($missions as $mission)
            <li class="flex gap-4">
              <span class="mt-2 h-2 w-2 flex-shrink-0 rounded-full bg-green-500"></span>
              <p class="text-base-content/80 leading-relaxed">
                {{ $mission->content }}
              </p>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
