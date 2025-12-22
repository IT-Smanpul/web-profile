<!doctype html>
<html class="scroll-smooth" data-theme="light" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>SMA Negeri 10 Pontianak</title>

    <meta name="description"
      content=" FlyonUIPro is the best FlyonUI dashboard for responsive web apps. Streamline your app development process with ease." />
    <link type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" rel="icon" />

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&ampdisplay=swap"
      rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <header class="border-base-content/20 bg-base-100 fixed top-0 z-10 w-full border-b py-px">
      <nav class="navbar mx-auto max-w-7xl rounded-b-xl px-4 sm:px-6 lg:px-8">
        <div class="w-full justify-between lg:flex lg:items-center lg:gap-2">
          <div class="navbar-start items-center justify-between max-lg:w-full">
            <a class="text-base-content flex items-center gap-3 text-xl font-semibold" href="/">
              <img class="size-12" src="{{ asset('img/logo.png') }}" alt="Logo Sekolah">
              <span>SMA Negeri 10 Pontianak</span>
            </a>
            <div class="flex items-center gap-3 lg:hidden">
              <a class="btn btn-primary btn-sm" href="/">SIMPUL</a>
              <a class="btn btn-primary btn-sm" href="/">Login</a>
              <button class="collapse-toggle btn btn-outline btn-secondary btn-square" data-collapse="#navbar-block-4"
                type="button" aria-controls="navbar-block-4" aria-label="Toggle navigation">
                <span class="icon-[tabler--menu-2] collapse-open:hidden size-5.5"></span>
                <span class="icon-[tabler--x] collapse-open:block size-5.5 hidden"></span>
              </button>
            </div>
          </div>
          <div
            class="lg:navbar-center transition-height collapse hidden grow overflow-hidden font-medium duration-300 lg:flex"
            id="navbar-block-4">
            <div class="text-base-content flex gap-6 text-base max-lg:mt-4 max-lg:flex-col lg:items-center">
              <a class="hover:text-primary nav-link" href="#beranda">Beranda</a>
              <a class="hover:text-primary nav-link" href="#profil">Profil Sekolah</a>
              <a class="hover:text-primary nav-link" href="#akademik">Akademik</a>
              <a class="hover:text-primary nav-link" href="#fasilitas">Fasilitas</a>
              <a class="hover:text-primary nav-link" href="#prestasi">Prestasi</a>
              <a class="hover:text-primary nav-link" href="#berita">Berita</a>
            </div>
          </div>
          <div class="navbar-end gap-3 max-lg:hidden">
            <a class="btn btn-primary" href="/">SIMPUL</a>
            <a class="btn btn-primary" href="/">LOGIN</a>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section id="beranda">
        <x-hero />
      </section>
      <section id="profil">
        <div class="bg-base-200 relative overflow-hidden py-12 sm:py-20 lg:py-28">
          <!-- Background shapes -->
          <div class="bg-primary/20 h-128 w-lg pointer-events-none absolute -left-40 -top-40 rounded-full blur-3xl">
          </div>
          <div
            class="h-112 w-md pointer-events-none absolute -bottom-40 -right-40 rounded-full bg-green-400/20 blur-3xl">
          </div>
          <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-16 lg:gap-24">
              <!-- Header -->
              <div class="space-y-6 text-center">
                <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
                  Profil Sekolah
                </h2>
                <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
                  SMA Negeri 10 Pontianak merupakan ruang belajar dan bertumbuh
                  bagi peserta didik untuk mengembangkan potensi akademik,
                  membangun karakter, serta mempersiapkan diri menghadapi masa depan
                  melalui pendidikan yang bermakna dan lingkungan yang suportif.
                </p>
                <!-- Values -->
                <div class="flex flex-wrap justify-center gap-3 pt-2">
                  <span class="badge badge-outline backdrop-blur">Berkarakter</span>
                  <span class="badge badge-outline backdrop-blur">Berprestasi</span>
                  <span class="badge badge-outline backdrop-blur">Berintegritas</span>
                  <span class="badge badge-outline backdrop-blur">Berdaya Saing</span>
                </div>
                <a class="btn btn-primary btn-lg btn-gradient mt-4" href="/profil">
                  Lihat Profil Lengkap
                  <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
                </a>
              </div>
              <!-- Visual block -->
              <div class="relative">
                <!-- Image composition -->
                <div class="grid gap-6 lg:grid-cols-5">
                  <!-- Main image -->
                  <div class="relative lg:col-span-3">
                    <div class="bg-primary/10 absolute -inset-2 rounded-3xl blur-xl"></div>
                    <img class="relative h-full w-full rounded-3xl object-cover shadow-xl"
                      src="{{ asset('img/profile-1.webp') }}" alt="Suasana Pembelajaran SMA Negeri 10 Pontianak" />
                  </div>
                  <!-- Side images -->
                  <div class="grid gap-6 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-1">
                    <img class="h-full w-full rounded-2xl object-cover shadow-lg"
                      src="{{ asset('img/profile-2.jpeg') }}" alt="Pembelajaran di kelas" />
                    <img class="h-full w-full rounded-2xl object-cover shadow-lg" src="{{ asset('img/ekskul.jpg') }}"
                      alt="Kegiatan ekstrakurikuler" />
                  </div>
                </div>
                <!-- Floating stats -->
                <div
                  class="bg-base-100/90 border-base-content/20 rounded-box mt-12 grid gap-10 border px-10 py-8 shadow-xl backdrop-blur sm:grid-cols-2 lg:absolute lg:-bottom-20 lg:left-1/2 lg:w-3/4 lg:-translate-x-1/2 lg:grid-cols-4 xl:w-max">
                  <div class="flex flex-col items-center gap-3">
                    <span class="text-primary text-3xl font-bold" id="count1"></span>
                    <p class="text-base-content/80 text-center text-sm">
                      Guru & Tenaga Pendidik
                    </p>
                  </div>
                  <div class="flex flex-col items-center gap-3">
                    <span class="text-primary text-3xl font-bold" id="count2"></span>
                    <p class="text-base-content/80 text-center text-sm">
                      Peserta Didik Aktif
                    </p>
                  </div>
                  <div class="flex flex-col items-center gap-3">
                    <span class="text-primary text-3xl font-bold" id="count3"></span>
                    <p class="text-base-content/80 text-center text-sm">
                      Prestasi Diraih
                    </p>
                  </div>
                  <div class="flex flex-col items-center gap-3">
                    <span class="text-primary text-3xl font-bold" id="count4"></span>
                    <p class="text-base-content/80 text-center text-sm">
                      Ekstrakurikuler
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="bg-base-100 relative overflow-hidden py-24" id="akademik">
        <!-- Background Shape -->
        <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-green-500/10 blur-3xl"></div>
        <div class="bg-primary/10 absolute -bottom-32 -left-32 h-96 w-96 rounded-full blur-3xl"></div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="grid items-center gap-16 lg:grid-cols-2">
            <!-- Text Content -->
            <div>
              <span class="mb-3 inline-block rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white">
                Akademik
              </span>
              <h2 class="mt-4 text-3xl font-bold leading-tight md:text-4xl">
                Akademik Unggulan
              </h2>
              <p class="text-base-content/80 mt-4 max-w-xl">
                SMA Negeri 10 Pontianak menerapkan Kurikulum Merdeka dengan pendekatan
                pembelajaran aktif dan terarah untuk mengembangkan potensi akademik
                peserta didik secara optimal.
              </p>
              <!-- Academic Points -->
              <div class="mt-10 grid gap-6 sm:grid-cols-2">
                <div class="border-base-content/10 rounded-xl border p-5">
                  <h3 class="font-semibold">Kurikulum Merdeka</h3>
                  <p class="text-base-content/70 mt-1 text-sm">
                    Pembelajaran berbasis proyek yang mendorong kreativitas dan kemandirian siswa.
                  </p>
                </div>
                <div class="border-base-content/10 rounded-xl border p-5">
                  <h3 class="font-semibold">Peminatan IPA & IPS</h3>
                  <p class="text-base-content/70 mt-1 text-sm">
                    Jalur akademik sesuai minat dan bakat untuk persiapan pendidikan lanjut.
                  </p>
                </div>
                <div class="border-base-content/10 rounded-xl border p-5">
                  <h3 class="font-semibold">Metode Pembelajaran Aktif</h3>
                  <p class="text-base-content/70 mt-1 text-sm">
                    Diskusi, presentasi, praktikum, dan pemanfaatan teknologi pembelajaran.
                  </p>
                </div>
                <div class="border-base-content/10 rounded-xl border p-5">
                  <h3 class="font-semibold">Dukungan Akademik</h3>
                  <p class="text-base-content/70 mt-1 text-sm">
                    Bimbingan belajar, pendampingan akademik, dan penguatan literasi numerasi.
                  </p>
                </div>
              </div>
              <!-- CTA -->
              <a class="btn btn-primary btn-gradient mt-10" href="#">
                Lihat Akademik Lengkap
              </a>
            </div>

            <!-- Image Content -->
            <div class="relative">
              <div class="bg-primary/10 absolute -inset-4 rounded-3xl blur-xl"></div>
              <img class="relative rounded-3xl object-cover shadow-xl" src="{{ asset('img/profile-3.jpeg') }}"
                alt="Kegiatan Akademik SMA Negeri 10 Pontianak" />
            </div>

          </div>
        </div>
      </section>
      <section id="fasilitas">
        <x-facility />
      </section>
      <section id="prestasi">
        <div class="bg-base-200 relative overflow-hidden py-12 sm:py-20 lg:py-28">
          <!-- Background shapes -->
          <div
            class="bg-primary/20 size-136 pointer-events-none absolute -top-40 left-1/2 -translate-x-1/2 rounded-full blur-3xl">
          </div>
          <div
            class="h-112 w-md pointer-events-none absolute -bottom-40 -left-40 rounded-full bg-yellow-400/20 blur-3xl">
          </div>
          <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-14 space-y-5 text-center sm:mb-20 lg:mb-24">
              <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
                Prestasi Sekolah
              </h2>
              <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
                Berbagai capaian akademik dan non-akademik menjadi bukti
                komitmen sekolah dalam mendukung potensi, bakat, dan kerja keras
                peserta didik.
              </p>
            </div>
            <!-- Achievement cards -->
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
              <!-- Card -->
              <div
                class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
                  <div class="bg-primary/20 absolute -right-20 -top-20 h-40 w-40 rounded-full blur-2xl"></div>
                </div>
                <figure class="relative h-52 overflow-hidden">
                  <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                    src="{{ asset('img/prestasi/placeholder-1.jpg') }}" alt="Prestasi Akademik" />
                  <span
                    class="bg-primary/90 absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-medium text-white backdrop-blur">
                    Akademik
                  </span>
                </figure>
                <div class="relative space-y-3 p-6">
                  <h3 class="text-lg font-semibold">
                    Juara 1 Olimpiade Sains Tingkat Provinsi
                  </h3>
                  <p class="text-base-content/70 text-sm">
                    Capaian prestasi siswa dalam ajang kompetisi sains
                    tingkat provinsi tahun 2024.
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
                  <div class="absolute -right-20 -top-20 h-40 w-40 rounded-full bg-green-400/20 blur-2xl"></div>
                </div>
                <figure class="relative h-52 overflow-hidden">
                  <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                    src="{{ asset('img/prestasi/placeholder-2.jpg') }}" alt="Prestasi Non Akademik" />
                  <span
                    class="absolute left-4 top-4 rounded-full bg-green-500/90 px-3 py-1 text-xs font-medium text-white backdrop-blur">
                    Non-Akademik
                  </span>
                </figure>
                <div class="relative space-y-3 p-6">
                  <h3 class="text-lg font-semibold">
                    Juara Umum Lomba Seni & Budaya
                  </h3>
                  <p class="text-base-content/70 text-sm">
                    Prestasi siswa dalam bidang seni dan kreativitas
                    di tingkat kota.
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
                  <div class="absolute -right-20 -top-20 h-40 w-40 rounded-full bg-yellow-400/20 blur-2xl"></div>
                </div>
                <figure class="relative h-52 overflow-hidden">
                  <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                    src="{{ asset('img/prestasi/placeholder-3.jpg') }}" alt="Prestasi Olahraga" />
                  <span
                    class="absolute left-4 top-4 rounded-full bg-yellow-500/90 px-3 py-1 text-xs font-medium text-white backdrop-blur">
                    Olahraga
                  </span>
                </figure>
                <div class="relative space-y-3 p-6">
                  <h3 class="text-lg font-semibold">
                    Medali Emas Kejuaraan Atletik
                  </h3>
                  <p class="text-base-content/70 text-sm">
                    Prestasi siswa dalam ajang olahraga tingkat regional.
                  </p>
                </div>
              </div>
            </div>
            <!-- CTA -->
            <div class="mt-14 text-center">
              <a class="btn btn-primary btn-gradient btn-lg" href="/prestasi">
                Lihat Semua Prestasi
                <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
              </a>
            </div>
          </div>
        </div>
      </section>
      <section id="berita">
        <div class="bg-base-100 relative overflow-hidden py-12 sm:py-20 lg:py-28">
          <div class="size-120 bg-primary/20 pointer-events-none absolute -right-40 -top-40 rounded-full blur-3xl">
          </div>
          <div class="size-104 pointer-events-none absolute -bottom-40 -left-40 rounded-full bg-sky-400/20 blur-3xl">
          </div>
          <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-14 space-y-5 text-center sm:mb-20 lg:mb-24">
              <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
                Berita & Kegiatan
              </h2>
              <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
                Informasi terbaru seputar kegiatan sekolah, prestasi,
                serta berbagai momen kebersamaan di SMA Negeri 10 Pontianak.
              </p>
            </div>
            <div class="grid gap-8 lg:grid-cols-3">
              <a class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl lg:col-span-2"
                href="#">
                <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
                  <div class="bg-primary/20 absolute -right-20 -top-20 h-40 w-40 rounded-full blur-2xl"></div>
                </div>
                <figure class="relative h-64 overflow-hidden sm:h-80">
                  <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                    src="{{ asset('img/berita/featured.jpg') }}" alt="Kegiatan Sekolah" />
                </figure>
                <div class="relative space-y-3 p-6 sm:p-8">
                  <span class="text-primary text-xs font-medium">
                    Kegiatan Sekolah • 12 Juli 2025
                  </span>
                  <h3 class="text-xl font-semibold sm:text-2xl">
                    Kegiatan Projek Penguatan Profil Pelajar Pancasila
                  </h3>
                  <p class="text-base-content/70 text-sm sm:text-base">
                    Peserta didik mengikuti rangkaian kegiatan P5
                    sebagai bagian dari penguatan karakter dan pembelajaran kontekstual.
                  </p>
                </div>
              </a>
              <div class="space-y-8">
                <a class="bg-base-100 group flex gap-4 rounded-2xl p-4 transition hover:-translate-y-0.5 hover:shadow-md"
                  href="#">
                  <img class="h-20 w-20 flex-shrink-0 rounded-xl object-cover"
                    src="{{ asset('img/berita/news-1.jpg') }}" alt="Berita Sekolah" />
                  <div class="space-y-1">
                    <span class="text-base-content/60 text-xs">
                      Prestasi • 5 Juli 2025
                    </span>
                    <h4 class="text-sm font-semibold leading-snug">
                      Siswa Raih Juara Olimpiade Sains Tingkat Kota
                    </h4>
                  </div>
                </a>
                <a class="bg-base-100 group flex gap-4 rounded-2xl p-4 transition hover:-translate-y-0.5 hover:shadow-md"
                  href="#">
                  <img class="h-20 w-20 flex-shrink-0 rounded-xl object-cover"
                    src="{{ asset('img/berita/news-2.jpg') }}" alt="Berita Sekolah" />
                  <div class="space-y-1">
                    <span class="text-base-content/60 text-xs">
                      Akademik • 1 Juli 2025
                    </span>
                    <h4 class="text-sm font-semibold leading-snug">
                      Pelaksanaan Asesmen Akhir Semester Genap
                    </h4>
                  </div>
                </a>
                <a class="bg-base-100 group flex gap-4 rounded-2xl p-4 transition hover:-translate-y-0.5 hover:shadow-md"
                  href="#">
                  <img class="h-20 w-20 flex-shrink-0 rounded-xl object-cover"
                    src="{{ asset('img/berita/news-3.jpg') }}" alt="Berita Sekolah" />
                  <div class="space-y-1">
                    <span class="text-base-content/60 text-xs">
                      Kegiatan • 28 Juni 2025
                    </span>
                    <h4 class="text-sm font-semibold leading-snug">
                      Kegiatan Bakti Sosial Bersama OSIS
                    </h4>
                  </div>
                </a>
              </div>
            </div>
            <div class="mt-14 text-center">
              <a class="btn btn-primary btn-gradient btn-lg" href="/berita">
                Lihat Semua Berita
                <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="bg-base-100">
      <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <!-- Top -->
        <div class="grid gap-10 md:grid-cols-4">
          <!-- School identity -->
          <div class="space-y-4">
            <a class="flex items-center gap-3 text-xl font-semibold" href="/">
              <img class="size-10" src="{{ asset('img/logo.png') }}" alt="Logo SMA Negeri 10 Pontianak">
              <span>SMA Negeri 10 Pontianak</span>
            </a>
            <p class="text-base-content/70 text-sm leading-relaxed">
              Sekolah menengah atas yang berkomitmen membentuk peserta didik
              berkarakter, berprestasi, dan siap menghadapi masa depan.
            </p>
          </div>
          <!-- Quick links -->
          <div>
            <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide">
              Navigasi
            </h4>
            <ul class="text-base-content/80 space-y-2 text-sm">
              <li><a class="hover:text-primary" href="/profil">Profil Sekolah</a></li>
              <li><a class="hover:text-primary" href="/akademik">Akademik</a></li>
              <li><a class="hover:text-primary" href="/fasilitas">Fasilitas</a></li>
              <li><a class="hover:text-primary" href="/prestasi">Prestasi</a></li>
              <li><a class="hover:text-primary" href="/berita">Berita</a></li>
            </ul>
          </div>
          <!-- PPDB -->
          <div>
            <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide">
              PPDB
            </h4>
            <ul class="text-base-content/80 space-y-2 text-sm">
              <li><a class="hover:text-primary" href="/ppdb">Informasi PPDB</a></li>
              <li><a class="hover:text-primary" href="/ppdb#jadwal">Jadwal Pendaftaran</a></li>
              <li><a class="hover:text-primary" href="/ppdb#alur">Alur Pendaftaran</a></li>
              <li><a class="hover:text-primary" href="/ppdb#kontak">Kontak Panitia</a></li>
            </ul>
          </div>
          <!-- Contact & Social -->
          <div>
            <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide">
              Kontak
            </h4>
            <ul class="text-base-content/80 space-y-2 text-sm">
              <li>📍 Pontianak, Kalimantan Barat</li>
              <li>📞 (0561) 123456</li>
              <li>✉️ info@sman10pontianak.sch.id</li>
            </ul>
            <div class="mt-4 flex gap-4">
              <a href="#" aria-label="Instagram">
                <span class="icon-[tabler--brand-instagram] size-5"></span>
              </a>
              <a href="#" aria-label="Facebook">
                <span class="icon-[tabler--brand-facebook] size-5"></span>
              </a>
              <a href="#" aria-label="YouTube">
                <span class="icon-[tabler--brand-youtube] size-5"></span>
              </a>
            </div>
          </div>
        </div>
        <!-- Divider -->
        <div class="divider my-10"></div>
        <!-- Bottom -->
        <div class="flex flex-col items-center justify-between gap-3 text-center text-sm md:flex-row md:text-left">
          <p class="text-base-content/70">
            © {{ now()->year }} SMA Negeri 10 Pontianak. All rights reserved.
          </p>
          <p class="text-base-content/70">
            Dikembangkan oleh <a class="text-primary font-medium" href="/">Tim IT SMANPUL</a>
          </p>
        </div>
      </div>
    </footer>
    <button
      class="btn btn-circle btn-soft btn-secondary/20 bottom-15 end-15 motion-preset-slide-right motion-duration-800 motion-delay-100 z-3 fixed hidden"
      id="scrollToTopBtn" aria-label="Circle Soft Icon Button">
      <span class="icon-[tabler--chevron-up] size-5 shrink-0"></span>
    </button>
  </body>
</html>
