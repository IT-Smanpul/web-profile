<section class="bg-base-200 relative overflow-hidden py-16 sm:py-20">
  <div class="pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>
  <div class="bg-primary/20 pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full blur-3xl"></div>
  <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    <div class="mb-16 space-y-4 text-center">
      <span class="bg-primary text-primary-content inline-block rounded-full px-4 py-1 text-sm font-medium shadow">
        Struktur Organisasi
      </span>
      <h2 class="text-3xl font-bold md:text-4xl">
        Manajemen Sekolah
      </h2>
      <p class="text-base-content/70 mx-auto max-w-2xl">
        Susunan pimpinan sekolah yang bertanggung jawab
        dalam pengelolaan dan pengembangan SMA Negeri 10 Pontianak.
      </p>
    </div>
    <div class="mb-20 flex justify-center">
      @if ($kepalaSekolah)
        <div
          class="bg-base-200/60 rounded-3xl border p-8 text-center shadow-sm backdrop-blur transition hover:shadow-md">
          <img class="mx-auto mb-5 h-32 w-32 rounded-full object-cover shadow-md"
            src="{{ Storage::exists($kepalaSekolah->photo) ? asset("storage/$kepalaSekolah->photo") : asset('img/avatars/1.png') }}"
            alt="Kepala Sekolah" />
          <p class="text-primary text-sm font-medium">
            Kepala Sekolah
          </p>
          <p class="mt-1 text-xl font-semibold">
            {{ $kepalaSekolah->name }}
          </p>
          <p class="text-base-content/60 mt-1 text-xs">
            NIP {{ $kepalaSekolah->nip }}
          </p>
          <div class="bg-primary mx-auto mt-5 h-1 w-20 rounded-full"></div>
        </div>
      @else
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada data kepala sekolah.
          </p>
        </div>
      @endif
    </div>
    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
      @forelse ($wakas as $waka)
        <div
          class="bg-base-200/50 rounded-2xl border p-6 text-center shadow-sm backdrop-blur transition hover:shadow-md">
          <img class="mx-auto mb-4 h-28 w-28 rounded-full object-cover shadow"
            src="{{ Storage::exists($waka->photo) ? asset("storage/$waka->photo") : asset('img/avatars/3.png') }}"
            alt="Waka Kesiswaan" />
          <p class="text-primary text-sm font-medium">
            {{ $waka->position }}
          </p>
          <p class="mt-1 text-lg font-semibold">
            {{ $waka->name }}
          </p>
          <p class="text-base-content/60 mt-1 text-xs">
            NIP {{ $waka->nip }}
          </p>
        </div>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada data wakil kepala sekolah.
          </p>
        </div>
      @endforelse
    </div>
  </div>
</section>
