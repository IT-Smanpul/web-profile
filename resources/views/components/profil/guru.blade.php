@use('App\Models\Employee')

<section class="bg-base-100 relative overflow-hidden py-16 sm:py-20">
  <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl">
  </div>
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-14 space-y-4 text-center">
      <span class="bg-primary text-primary-content inline-block rounded-full px-4 py-1 text-sm font-medium shadow">
        Tim Sekolah
      </span>
      <h2 class="text-3xl font-bold md:text-4xl">
        Guru dan Staff
      </h2>
      <p class="text-base-content/70 mx-auto max-w-2xl">
        Guru dan staff yang bekerja bersama dalam menciptakan lingkungan belajar yang aman, nyaman, dan mendukung
        perkembangan siswa.
      </p>
    </div>
    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
      @forelse(Employee::guru()->inRandomOrder()->take(6)->get() as $guru)
        <div
          class="bg-base-100/70 rounded-2xl border p-5 text-center shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-md">
          <img class="mx-auto h-32 w-32 rounded-full object-cover shadow"
            src="{{ $guru->photo ? asset("storage/$guru->photo") : asset('img/avatars/8.png') }}" alt="Nama Guru" />
          <p class="mt-4 font-semibold">
            {{ $guru->name }}
          </p>
          <p class="text-base-content/60 text-sm">
            {{ $guru->position }}
          </p>
        </div>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada data yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>
    <div class="mt-14 text-center">
      <a class="btn btn-primary btn-gradient btn-lg" href="{{ route('guru-staff') }}">
        Lihat Semua Guru
        <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
      </a>
    </div>
  </div>
</section>
