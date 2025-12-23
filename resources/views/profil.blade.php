@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <!-- ================= INTRO + DATA RESMI ================= -->
    <section class="bg-base-200 relative overflow-hidden py-16 sm:py-20 lg:py-28">
      <!-- Background shapes -->
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>

      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Intro -->
        <div class="mx-auto max-w-4xl space-y-6 text-center">
          <span class="inline-block rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
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

        <!-- Data Resmi -->
        <div class="mt-20 grid gap-6 sm:grid-cols-2">

          <!-- NPSN -->
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
                  12345678
                </p>
              </div>
            </div>
          </div>

          <!-- Status -->
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
                  Sekolah Negeri
                </p>
              </div>
            </div>
          </div>

          <!-- Akreditasi -->
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
                  A
                </p>
              </div>
            </div>
          </div>

          <!-- Kurikulum -->
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
                  Kurikulum Merdeka
                </p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ================= VISI & MISI ================= -->
    <section class="bg-base-100 py-16 sm:py-20">
      <div class="mx-auto grid max-w-7xl gap-14 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">

        <div class="space-y-6">
          <span class="badge badge-outline">Visi</span>
          <h2 class="text-3xl font-bold">Visi Sekolah</h2>
          <p class="text-base-content/80 leading-relaxed">
            Terwujudnya peserta didik yang beriman, berkarakter,
            berprestasi, dan berdaya saing global.
          </p>
        </div>

        <div class="space-y-6">
          <span class="badge badge-outline">Misi</span>
          <h2 class="text-3xl font-bold">Misi Sekolah</h2>
          <ul class="text-base-content/80 list-disc space-y-3 pl-5">
            <li>Menyelenggarakan pembelajaran yang aktif dan inovatif</li>
            <li>Mengembangkan potensi akademik dan non-akademik siswa</li>
            <li>Menanamkan nilai karakter dan integritas</li>
            <li>Menciptakan lingkungan belajar yang kondusif</li>
          </ul>
        </div>

      </div>
    </section>

    <!-- ================= SEJARAH ================= -->
    <section class="bg-base-200 relative overflow-hidden py-16 sm:py-20">
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl">
      </div>

      <div class="relative mx-auto max-w-5xl space-y-12 px-4 sm:px-6 lg:px-8">
        <div class="space-y-4 text-center">
          <span class="badge badge-outline">Sejarah</span>
          <h2 class="text-3xl font-bold md:text-4xl">Sejarah Singkat Sekolah</h2>
        </div>

        <div class="space-y-6">
          <div class="bg-base-100 rounded-2xl p-6 shadow-sm">
            <h3 class="font-semibold">2005 – Berdiri</h3>
            <p class="text-base-content/80">
              SMA Negeri 10 Pontianak didirikan untuk memenuhi kebutuhan
              pendidikan menengah di wilayah Pontianak.
            </p>
          </div>

          <div class="bg-base-100 rounded-2xl p-6 shadow-sm">
            <h3 class="font-semibold">2015 – Perkembangan Fasilitas</h3>
            <p class="text-base-content/80">
              Penambahan ruang kelas, laboratorium, dan fasilitas pendukung.
            </p>
          </div>

          <div class="bg-base-100 rounded-2xl p-6 shadow-sm">
            <h3 class="font-semibold">Sekarang</h3>
            <p class="text-base-content/80">
              Menjadi sekolah yang aktif berprestasi di bidang akademik
              dan non-akademik.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= STRUKTUR ORGANISASI ================= -->
    <section class="bg-base-100 py-16 sm:py-20">
      <div class="mx-auto max-w-5xl space-y-10 px-4 text-center sm:px-6 lg:px-8">
        <span class="badge badge-outline">Struktur Organisasi</span>
        <h2 class="text-3xl font-bold">Manajemen Sekolah</h2>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <div class="bg-base-200/40 rounded-2xl border p-6">
            <p class="font-semibold">Kepala Sekolah</p>
            <p class="text-base-content/70">Drs. Nama Kepala Sekolah</p>
          </div>

          <div class="bg-base-200/40 rounded-2xl border p-6">
            <p class="font-semibold">Waka Kurikulum</p>
            <p class="text-base-content/70">Nama Wakil</p>
          </div>

          <div class="bg-base-200/40 rounded-2xl border p-6">
            <p class="font-semibold">Waka Kesiswaan</p>
            <p class="text-base-content/70">Nama Wakil</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= GURU & STAFF ================= -->
    <section class="bg-base-200 py-16 sm:py-20">
      <div class="mx-auto max-w-7xl space-y-10 px-4 text-center sm:px-6 lg:px-8">
        <span class="badge badge-outline">Guru & Staff</span>
        <h2 class="text-3xl font-bold">Tenaga Pendidik</h2>

        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <div class="bg-base-100 rounded-2xl border p-4 shadow-sm">
            <div class="bg-base-200 h-32 rounded-xl"></div>
            <p class="mt-3 font-semibold">Nama Guru</p>
            <p class="text-base-content/60 text-sm">Guru Matematika</p>
          </div>
        </div>

        <a class="btn btn-primary btn-gradient mt-6" href="/guru">
          Lihat Semua Guru
        </a>
      </div>
    </section>

  </main>
  <x-ui.footer />
@endsection
