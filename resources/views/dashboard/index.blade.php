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
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <h3 class="mb-4 font-semibold">Berita Terbaru</h3>
        <ul class="space-y-2 text-sm">
          @forelse ($latestArticles as $article)
            <li class="flex justify-between">
              <span class="truncate">{{ $article->title }}</span>
              <span class="text-base-content/50">
                {{ $article->created_at->diffForHumans() }}
              </span>
            </li>
          @empty
            <p class="text-base-content/60">Belum ada berita.</p>
          @endforelse
        </ul>
      </div>
      <div class="bg-base-100 rounded-2xl border p-6 shadow-sm">
        <h3 class="mb-4 font-semibold">Prestasi Terbaru</h3>
        <ul class="space-y-2 text-sm">
          @forelse ($latestAchievements as $achievement)
            <li class="flex justify-between">
              <span class="truncate">{{ $achievement->title }}</span>
              <span class="text-base-content/50">
                {{ $achievement->created_at->diffForHumans() }}
              </span>
            </li>
          @empty
            <p class="text-base-content/60">Belum ada prestasi.</p>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
@endsection
