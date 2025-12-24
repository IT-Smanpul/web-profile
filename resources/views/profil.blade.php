@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <x-profil.intro />
    <x-profil.visi-misi />
    <section class="bg-base-200 relative overflow-hidden py-16 sm:py-20">
      <!-- Background shape -->
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>

      <div class="relative mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-16 space-y-4 text-center">
          <span class="badge badge-outline">Sejarah</span>
          <h2 class="text-3xl font-bold md:text-4xl">
            Sejarah Singkat Sekolah
          </h2>
          <p class="text-base-content/70 mx-auto max-w-2xl">
            Perjalanan SMA Negeri 10 Pontianak dalam membangun
            kualitas pendidikan dan mencetak generasi berkarakter.
          </p>
        </div>

        <!-- Timeline -->
        <ol class="border-base-content/20 relative space-y-14 border-l pl-8">

          <!-- Item 1 -->
          <li class="relative">
            <span class="absolute -left-[10px] top-1 flex h-5 w-5 items-center justify-center rounded-full bg-green-500">
            </span>

            <div class="space-y-2">
              <span class="text-sm font-semibold text-green-600">
                2005
              </span>
              <h3 class="text-xl font-semibold">
                Pendirian SMA Negeri 10 Pontianak
              </h3>
              <p class="text-base-content/80 leading-relaxed">
                SMA Negeri 10 Pontianak didirikan untuk memenuhi kebutuhan
                pendidikan menengah atas di wilayah Pontianak dan sekitarnya.
              </p>
            </div>
          </li>

          <!-- Item 2 -->
          <li class="relative">
            <span class="absolute -left-[10px] top-1 flex h-5 w-5 items-center justify-center rounded-full bg-green-500">
            </span>

            <div class="space-y-2">
              <span class="text-sm font-semibold text-green-600">
                2015
              </span>
              <h3 class="text-xl font-semibold">
                Pengembangan Sarana dan Prasarana
              </h3>
              <p class="text-base-content/80 leading-relaxed">
                Penambahan ruang kelas, laboratorium, serta fasilitas
                pendukung pembelajaran untuk meningkatkan mutu pendidikan.
              </p>
            </div>
          </li>

          <!-- Item 3 -->
          <li class="relative">
            <span class="absolute -left-[10px] top-1 flex h-5 w-5 items-center justify-center rounded-full bg-green-500">
            </span>

            <div class="space-y-2">
              <span class="text-sm font-semibold text-green-600">
                Sekarang
              </span>
              <h3 class="text-xl font-semibold">
                Sekolah Berprestasi dan Berkarakter
              </h3>
              <p class="text-base-content/80 leading-relaxed">
                SMA Negeri 10 Pontianak terus berkembang sebagai sekolah
                yang aktif meraih prestasi akademik dan non-akademik,
                serta berkomitmen menciptakan lingkungan belajar yang positif.
              </p>
            </div>
          </li>

        </ol>
      </div>
    </section>
    <x-profil.struktur />

    <section class="bg-base-200 relative overflow-hidden py-16 sm:py-20">
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl">
      </div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-14 space-y-4 text-center">
          <span class="inline-block rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
            Guru & Staff
          </span>
          <h2 class="text-3xl font-bold md:text-4xl">
            Tenaga Pendidik
          </h2>
          <p class="text-base-content/70 mx-auto max-w-2xl">
            Tenaga pendidik profesional yang berperan dalam
            membimbing dan mengembangkan potensi peserta didik.
          </p>
        </div>
        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <div
            class="bg-base-100/70 rounded-2xl border p-5 text-center shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-md">
            <img class="mx-auto h-32 w-32 rounded-full object-cover shadow" src="{{ asset('img/avatars/5.png') }}"
              alt="Nama Guru" />
            <p class="mt-4 font-semibold">
              Nama Guru
            </p>
            <p class="text-base-content/60 text-sm">
              Guru Matematika
            </p>
          </div>
          <div
            class="bg-base-100/70 rounded-2xl border p-5 text-center shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-md">
            <img class="mx-auto h-32 w-32 rounded-full object-cover shadow" src="{{ asset('img/avatars/6.png') }}"
              alt="Nama Guru" />
            <p class="mt-4 font-semibold">
              Nama Guru
            </p>
            <p class="text-base-content/60 text-sm">
              Guru Bahasa Indonesia
            </p>
          </div>
          <div
            class="bg-base-100/70 rounded-2xl border p-5 text-center shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-md">
            <img class="mx-auto h-32 w-32 rounded-full object-cover shadow" src="{{ asset('img/avatars/7.png') }}"
              alt="Nama Guru" />
            <p class="mt-4 font-semibold">
              Nama Guru
            </p>
            <p class="text-base-content/60 text-sm">
              Guru IPA
            </p>
          </div>
          <div
            class="bg-base-100/70 rounded-2xl border p-5 text-center shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-md">
            <img class="mx-auto h-32 w-32 rounded-full object-cover shadow" src="{{ asset('img/avatars/8.png') }}"
              alt="Nama Guru" />
            <p class="mt-4 font-semibold">
              Nama Guru
            </p>
            <p class="text-base-content/60 text-sm">
              Guru Sejarah
            </p>
          </div>
        </div>
        <div class="mt-14 text-center">
          <a class="btn btn-primary btn-gradient btn-lg" href="/guru">
            Lihat Semua Guru
            <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
          </a>
        </div>
      </div>
    </section>
  </main>
  <x-ui.footer />
@endsection
