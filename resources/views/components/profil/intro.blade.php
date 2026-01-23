<section class="bg-base-200 relative min-h-dvh overflow-hidden">
  <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 size-96 rounded-full blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-40 -right-40 size-96 rounded-full bg-green-400/20 blur-3xl"></div>
  <div class="relative pb-24 pt-28">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-4xl space-y-6 text-center">
        <span class="bg-primary text-primary-content inline-block rounded-full px-4 py-1 text-sm font-medium shadow">
          Profil Sekolah
        </span>
        <h1 class="text-base-content text-4xl font-bold md:text-5xl">
          SMA Negeri 10 Pontianak
        </h1>
        <p class="text-base-content/80 text-lg leading-relaxed">
          SMA Negeri 10 Pontianak merupakan institusi pendidikan menengah atas
          yang berkomitmen membentuk peserta didik berkarakter, berprestasi,
          dan berdaya saing melalui pendidikan berkualitas serta lingkungan
          belajar yang kondusif.
        </p>
      </div>
      <div class="mt-20 grid gap-6 sm:grid-cols-2">
        <div class="bg-base-100 rounded-2xl border-l-4 border-l-green-500 p-6 shadow-sm transition hover:shadow-md">
          <div class="flex items-center gap-4">
            <div class="text-green-600">
              <span class="icon-[tabler--id] size-6"></span>
            </div>
            <div>
              <p class="text-base-content/60 text-xs uppercase tracking-wide">
                NPSN
              </p>
              <p class="text-lg font-semibold tracking-wide">
                {{ $npsn ?? '-' }}
              </p>
            </div>
          </div>
        </div>
        <div class="bg-base-100 rounded-2xl border-l-4 border-l-slate-400 p-6 shadow-sm transition hover:shadow-md">
          <div class="flex items-center gap-4">
            <div class="text-base-content/60">
              <span class="icon-[tabler--school] size-6"></span>
            </div>
            <div>
              <p class="text-base-content/60 text-xs uppercase tracking-wide">
                Status
              </p>
              <p class="text-lg font-semibold">
                Sekolah {{ $status ?? '-' }}
              </p>
            </div>
          </div>
        </div>
        <div class="bg-base-100 rounded-2xl border-l-4 border-l-yellow-500 p-6 shadow-sm transition hover:shadow-md">
          <div class="flex items-center gap-4">
            <div class="text-yellow-600">
              <span class="icon-[tabler--award] size-6"></span>
            </div>
            <div>
              <p class="text-base-content/60 text-xs uppercase tracking-wide">
                Akreditasi
              </p>
              <p class="text-2xl font-bold">
                {{ $akreditasi ?? '-' }}
              </p>
            </div>
          </div>
        </div>
        <div class="bg-base-100 rounded-2xl border-l-4 border-l-indigo-500 p-6 shadow-sm transition hover:shadow-md">
          <div class="flex items-center gap-4">
            <div class="text-indigo-600">
              <span class="icon-[tabler--book] size-6"></span>
            </div>
            <div>
              <p class="text-base-content/60 text-xs uppercase tracking-wide">
                Kurikulum
              </p>
              <p class="text-lg font-semibold">
                {{ $kurikulum ?? '-' }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
