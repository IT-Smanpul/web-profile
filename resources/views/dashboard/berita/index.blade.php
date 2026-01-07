@php
  $beritas = [
      [
          'id' => 1,
          'title' => 'SMA Negeri X Raih Juara Umum Olimpiade Sains Tingkat Kabupaten',
          'slug' => 'sma-negeri-x-raih-juara-umum-olimpiade-sains',
          'excerpt' =>
              'SMA Negeri X kembali menorehkan prestasi membanggakan dengan meraih Juara Umum Olimpiade Sains tingkat kabupaten.',
          'content' =>
              'SMA Negeri X kembali menunjukkan kualitas pendidikan yang unggul dengan meraih Juara Umum dalam ajang Olimpiade Sains tingkat kabupaten tahun 2024. Prestasi ini diraih melalui kerja keras para siswa, bimbingan guru, serta dukungan penuh dari pihak sekolah. Beberapa siswa berhasil meraih juara pada cabang Matematika, Fisika, dan Biologi.',
          'thumbnail' => 'berita/olimpiade-sains.jpg',
          'is_published' => true,
          'published_at' => now()->subDays(2),
          'author' => 'Admin',
      ],
      [
          'id' => 2,
          'title' => 'Pelepasan Siswa Kelas XII Tahun Ajaran 2023/2024 Berlangsung Khidmat',
          'slug' => 'pelepasan-siswa-kelas-xii-2023-2024',
          'excerpt' => 'Acara pelepasan siswa kelas XII SMA Negeri X berlangsung khidmat dan penuh haru.',
          'content' =>
              'SMA Negeri X menyelenggarakan acara pelepasan siswa kelas XII tahun ajaran 2023/2024 dengan suasana khidmat dan penuh haru. Acara ini dihadiri oleh orang tua siswa, guru, serta jajaran pimpinan sekolah sebagai bentuk apresiasi atas perjuangan siswa selama menempuh pendidikan.',
          'thumbnail' => 'berita/pelepasan-siswa.jpg',
          'is_published' => true,
          'published_at' => now()->subDays(5),
          'author' => 'Admin',
      ],
      [
          'id' => 3,
          'title' => 'Kegiatan P5: Siswa SMA Negeri X Gelar Pameran Karya Kreatif',
          'slug' => 'kegiatan-p5-pameran-karya-kreatif',
          'excerpt' =>
              'Siswa SMA Negeri X menampilkan berbagai karya kreatif dalam kegiatan Projek Penguatan Profil Pelajar Pancasila.',
          'content' =>
              'Dalam rangka Projek Penguatan Profil Pelajar Pancasila (P5), siswa SMA Negeri X menggelar pameran karya kreatif yang menampilkan hasil inovasi dan kreativitas siswa. Kegiatan ini bertujuan untuk menumbuhkan karakter gotong royong, kreatif, dan mandiri.',
          'thumbnail' => 'berita/p5-karya-kreatif.jpg',
          'is_published' => true,
          'published_at' => now()->subDays(8),
          'author' => 'Admin',
      ],
      [
          'id' => 4,
          'title' => 'SMA Negeri X Gelar Lomba Class Meeting Pasca Ujian Akhir',
          'slug' => 'class-meeting-pasca-ujian-akhir',
          'excerpt' =>
              'Berbagai lomba seru digelar dalam kegiatan class meeting SMA Negeri X setelah ujian akhir semester.',
          'content' =>
              'Setelah pelaksanaan ujian akhir semester, SMA Negeri X mengadakan kegiatan class meeting yang diisi dengan berbagai lomba olahraga dan seni. Kegiatan ini bertujuan untuk mempererat kebersamaan antar siswa serta memberikan hiburan setelah masa ujian.',
          'thumbnail' => 'berita/class-meeting.jpg',
          'is_published' => false,
          'published_at' => now()->addDays(10),
          'author' => 'Admin',
      ],
      [
          'id' => 5,
          'title' => 'Peringatan Hari Guru Nasional di SMA Negeri X Berlangsung Meriah',
          'slug' => 'peringatan-hari-guru-nasional',
          'excerpt' => 'SMA Negeri X memperingati Hari Guru Nasional dengan berbagai kegiatan dan penampilan menarik.',
          'content' =>
              'Dalam rangka memperingati Hari Guru Nasional, SMA Negeri X mengadakan berbagai kegiatan seperti upacara khusus, penampilan seni dari siswa, serta pemberian penghargaan kepada guru berprestasi. Kegiatan ini menjadi bentuk penghormatan atas jasa para guru.',
          'thumbnail' => 'berita/hari-guru.jpg',
          'is_published' => true,
          'published_at' => now()->subDays(12),
          'author' => 'Admin',
      ],
  ];
@endphp

@extends('dashboard.layout')

@section('title', 'Berita')

@section('dashboard-content')
  <div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h2 class="text-xl font-semibold">Berita Sekolah</h2>
        <p class="text-base-content/60 text-sm">
          Kelola berita dan informasi terbaru yang ditampilkan di website
        </p>
      </div>
      <a class="btn btn-primary btn-gradient" href="{{ route('berita.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Berita
      </a>
    </div>

    {{-- Cards --}}
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse ($beritas as $berita)
        <div
          class="bg-base-100 group overflow-hidden rounded-2xl border shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
          <div class="relative h-40 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
              src="{{ asset('img/free-blog-2.png') }}" alt="{{ $berita['title'] }}" />
            <span
              class="{{ $berita['is_published'] ? 'bg-green-500/90' : 'bg-gray-500/90' }} absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-medium text-white">
              {{ $berita['is_published'] ? 'Published' : 'Draft' }}
            </span>
          </div>
          <div class="space-y-3 p-5">
            <h3 class="line-clamp-2 font-semibold leading-snug">
              {{ $berita['title'] }}
            </h3>
            <p class="text-base-content/60 line-clamp-2 text-sm">
              {{ $berita['excerpt'] ?? Str::limit(strip_tags($berita['content']), 100) }}
            </p>
            <div class="text-base-content/50 flex items-center justify-between pt-2 text-xs">
              <span>
                {{ $berita['published_at']?->format('d M Y') ?? '—' }}
              </span>
              <span>
                {{ $berita['author'] ?? 'Admin' }}
              </span>
            </div>
            <div class="flex items-center justify-end gap-2 pt-2">
              <a class="btn btn-sm btn-soft" href="{{ route('berita.edit', $berita['id']) }}" title="Edit Berita">
                <span class="icon-[tabler--edit] size-4"></span>
              </a>
              <form action="{{ route('berita.destroy', $berita['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-soft text-red-600" type="submit" title="Hapus Berita"
                  onclick="return confirm('Yakin ingin menghapus berita ini?')">
                  <span class="icon-[tabler--trash] size-4"></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada berita yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>

    {{-- Pagination --}}
    {{--    @if ($beritas->hasPages()) --}}
    {{--      <div class="flex justify-center pt-6"> --}}
    {{--        {{ $beritas->links() }} --}}
    {{--      </div> --}}
    {{--    @endif --}}
  </div>
@endsection
