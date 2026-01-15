@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('dashboard-content')
  <div class="space-y-8">
    <div class="bg-base-100 rounded-2xl border p-8 shadow-sm">
      <h2 class="mb-2 text-xl font-semibold">
        Selamat Datang 👋
      </h2>
      <p class="text-base-content/70">
        Gunakan menu di samping untuk mengelola konten website sekolah.
      </p>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <p class="text-base-content/60 text-sm">Total Berita</p>
        <p class="mt-2 text-3xl font-bold">{{ $totalArticles }}</p>
      </div>
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <p class="text-base-content/60 text-sm">Total Prestasi</p>
        <p class="mt-2 text-3xl font-bold">{{ $totalAchievements }}</p>
      </div>
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <p class="text-base-content/60 text-sm">Total Guru</p>
        <p class="mt-2 text-3xl font-bold">{{ $totalGurus }}</p>
      </div>
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <p class="text-base-content/60 text-sm">Total Staff</p>
        <p class="mt-2 text-3xl font-bold">{{ $totalStaffs }}</p>
      </div>
    </div>
    <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
      <h3 class="mb-4 text-lg font-semibold">
        Aksi Cepat
      </h3>
      <div class="flex flex-wrap gap-3">
        <a class="btn btn-primary btn-soft" href="{{ route('berita.create') }}">
          Tambah Berita
        </a>
        <a class="btn btn-primary btn-soft" href="{{ route('prestasi.create') }}">
          Tambah Prestasi
        </a>
        <a class="btn btn-primary btn-soft" href="{{ route('guru-staff.create') }}">
          Tambah Guru / Staff
        </a>
      </div>
    </div>
    <div class="grid gap-6 lg:grid-cols-2">

      {{-- BERITA TERBARU --}}
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
          <h3 class="font-semibold">Berita Terbaru</h3>
          <a class="text-primary text-sm" href="{{ route('berita.index') }}">
            Lihat semua
          </a>
        </div>

        <div class="space-y-3">
          @forelse ($latestArticles as $article)
            <a class="hover:bg-base-200/60 group flex items-start justify-between gap-3 rounded-lg px-3 py-2 transition"
              href="{{ route('berita.edit', $article->slug) }}">
              <div class="min-w-0">
                <p class="group-hover:text-primary truncate font-medium">
                  {{ $article->title }}
                </p>
                <p class="text-base-content/50 text-xs">
                  {{ $article->created_at->format('d M Y') }}
                </p>
              </div>

              <span class="icon-[tabler--chevron-right] text-base-content/40 size-4"></span>
            </a>
          @empty
            <p class="text-base-content/60 text-sm">
              Belum ada berita.
            </p>
          @endforelse
        </div>
      </div>

      {{-- PRESTASI TERBARU --}}
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
          <h3 class="font-semibold">Prestasi Terbaru</h3>
          <a class="text-primary text-sm" href="{{ route('prestasi.index') }}">
            Lihat semua
          </a>
        </div>

        <div class="space-y-3">
          @forelse ($latestAchievements as $achievement)
            <div class="hover:bg-base-200/60 flex items-start justify-between gap-3 rounded-lg px-3 py-2">
              <div class="min-w-0">
                <p class="truncate font-medium">
                  {{ $achievement->title }}
                </p>
                <p class="text-base-content/50 text-xs">
                  {{ $achievement->created_at->format('d M Y') }}
                </p>
              </div>

              <span class="icon-[tabler--award] text-base-content/40 size-4"></span>
            </div>
          @empty
            <p class="text-base-content/60 text-sm">
              Belum ada prestasi.
            </p>
          @endforelse
        </div>
      </div>

    </div>
  </div>
@endsection
