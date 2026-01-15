@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    {{-- HERO --}}
    <section class="bg-base-200 relative overflow-hidden py-28 pb-20">
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>

      <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        <span class="inline-block rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
          PPDB Tahun Ajaran 2026 / 2027
        </span>

        <h1 class="mt-6 text-4xl font-bold md:text-5xl">
          Penerimaan Peserta Didik Baru
        </h1>

        <p class="text-base-content/80 mx-auto mt-6 max-w-3xl text-lg leading-relaxed">
          SMA Negeri Contoh membuka kesempatan bagi calon peserta didik
          untuk bergabung dan berkembang dalam lingkungan belajar
          yang unggul, berkarakter, dan berprestasi.
        </p>
      </div>
    </section>

    {{-- INFO UMUM --}}
    <section class="bg-base-100 py-20">
      <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
          <h2 class="text-3xl font-bold">Informasi Umum</h2>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
          <div class="rounded-2xl border p-6 shadow-sm">
            <h3 class="mb-2 font-semibold">Jenjang</h3>
            <p class="text-base-content/70">Sekolah Menengah Atas (SMA)</p>
          </div>

          <div class="rounded-2xl border p-6 shadow-sm">
            <h3 class="mb-2 font-semibold">Kuota</h3>
            <p class="text-base-content/70">360 Peserta Didik</p>
          </div>

          <div class="rounded-2xl border p-6 shadow-sm">
            <h3 class="mb-2 font-semibold">Sistem Seleksi</h3>
            <p class="text-base-content/70">
              Zonasi, Afirmasi, Perpindahan Orang Tua, Prestasi
            </p>
          </div>

          <div class="rounded-2xl border p-6 shadow-sm">
            <h3 class="mb-2 font-semibold">Biaya</h3>
            <p class="text-base-content/70">
              Gratis (Sesuai ketentuan pemerintah)
            </p>
          </div>
        </div>
      </div>
    </section>

    {{-- JADWAL --}}
    <section class="bg-base-200 py-20">
      <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
          <h2 class="text-3xl font-bold">Jadwal PPDB</h2>
        </div>

        <div class="space-y-4">
          <div class="bg-base-100 flex justify-between rounded-xl border p-4">
            <span>Pendaftaran Online</span>
            <span class="font-medium">1 – 7 Juli 2026</span>
          </div>
          <div class="bg-base-100 flex justify-between rounded-xl border p-4">
            <span>Verifikasi Berkas</span>
            <span class="font-medium">1 – 8 Juli 2026</span>
          </div>
          <div class="bg-base-100 flex justify-between rounded-xl border p-4">
            <span>Pengumuman Hasil</span>
            <span class="font-medium">10 Juli 2026</span>
          </div>
          <div class="bg-base-100 flex justify-between rounded-xl border p-4">
            <span>Daftar Ulang</span>
            <span class="font-medium">11 – 13 Juli 2026</span>
          </div>
        </div>
      </div>
    </section>

    {{-- ALUR --}}
    <section class="bg-base-100 py-20">
      <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
          <h2 class="text-3xl font-bold">Alur Pendaftaran</h2>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
          @foreach (['Membuat akun pendaftaran', 'Mengisi data & memilih jalur', 'Unggah berkas persyaratan', 'Menunggu pengumuman hasil'] as $step)
            <div class="rounded-2xl border p-6 text-center shadow-sm">
              <p class="font-medium">{{ $step }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    {{-- PERSYARATAN --}}
    <section class="bg-base-200 py-20">
      <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
          <h2 class="text-3xl font-bold">Persyaratan Umum</h2>
        </div>

        <ul class="bg-base-100 space-y-3 rounded-2xl border p-6 shadow-sm">
          <li>• Fotokopi Akta Kelahiran</li>
          <li>• Fotokopi Kartu Keluarga</li>
          <li>• Ijazah / Surat Keterangan Lulus</li>
          <li>• Rapor SMP / Sederajat</li>
          <li>• Pas Foto Terbaru</li>
        </ul>
      </div>
    </section>

    {{-- CTA --}}
    <section class="bg-base-100 py-20">
      <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold">
          Informasi Lebih Lanjut
        </h2>

        <p class="text-base-content/70 mx-auto mt-4 max-w-xl">
          Jika ada pertanyaan seputar PPDB, silakan hubungi panitia
          melalui kontak di bawah ini.
        </p>

        <div class="mt-8 flex justify-center gap-4">
          <a class="btn btn-primary btn-gradient">
            Hubungi Panitia
          </a>
          <a class="btn btn-outline">
            Unduh Brosur
          </a>
        </div>
      </div>
    </section>

  </main>
@endsection
