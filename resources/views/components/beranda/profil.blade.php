<div class="bg-base-200 relative overflow-hidden py-12 sm:py-20 lg:py-28">
  <div class="h-128 w-lg bg-primary/20 pointer-events-none absolute -left-40 -top-40 rounded-full blur-3xl"></div>
  <div class="h-112 w-md pointer-events-none absolute -bottom-40 -right-40 rounded-full bg-green-400/20 blur-3xl"></div>
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col gap-16 lg:gap-24">
      <div class="space-y-6 text-center">
        <div class="flex justify-center">
          <span class="rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
            Profil Sekolah
          </span>
        </div>
        <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
          Tentang SMA Negeri 10 Pontianak
        </h2>
        <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
          SMA Negeri 10 Pontianak merupakan ruang belajar dan bertumbuh bagi para murid untuk mengembangkan potensi
          akademik, membangun karakter, serta mempersiapkan diri menghadapi masa depan melalui pendidikan yang bermakna
          dan lingkungan yang suportif.
        </p>
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
      <div class="relative">
        <div class="grid gap-6 lg:grid-cols-5">
          <div class="relative lg:col-span-3">
            <div class="bg-primary/10 absolute -inset-2 rounded-3xl blur-xl"></div>
            <img class="relative h-full w-full rounded-3xl object-cover shadow-xl"
              src="{{ asset('img/profile-1.webp') }}" alt="Suasana Pembelajaran SMA Negeri 10 Pontianak" />
          </div>
          <div class="grid gap-6 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-1">
            <img class="h-full w-full rounded-2xl object-cover shadow-lg" src="{{ asset('img/profile-2.jpeg') }}"
              alt="Pembelajaran di kelas" />
            <img class="h-full w-full rounded-2xl object-cover shadow-lg" src="{{ asset('img/ekskul.jpg') }}"
              alt="Kegiatan ekstrakurikuler" />
          </div>
        </div>
        <div
          class="bg-base-100/90 border-base-content/20 rounded-box mt-12 grid gap-10 border px-10 py-8 shadow-xl backdrop-blur sm:grid-cols-2 lg:absolute lg:-bottom-20 lg:left-1/2 lg:w-3/4 lg:-translate-x-1/2 lg:grid-cols-4 xl:w-max">
          <div class="flex flex-col items-center gap-2">
            <span class="text-primary text-3xl font-bold" id="count1"></span>
            <p class="text-base-content/80 text-center text-sm">
              Guru & Tenaga Pendidik
            </p>
          </div>
          <div class="flex flex-col items-center gap-2">
            <span class="text-primary text-3xl font-bold" id="count2"></span>
            <p class="text-base-content/80 text-center text-sm">
              Peserta Didik Aktif
            </p>
          </div>
          <div class="flex flex-col items-center gap-2">
            <span class="text-primary text-3xl font-bold" id="count3"></span>
            <p class="text-base-content/80 text-center text-sm">
              Prestasi Diraih
            </p>
          </div>
          <div class="flex flex-col items-center gap-2">
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
