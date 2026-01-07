@extends('dashboard.layout')

@section('title', 'Prestasi')

@section('dashboard-content')
  <div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h2 class="text-xl font-semibold">Prestasi Sekolah</h2>
        <p class="text-base-content/60 text-sm">
          Kelola data prestasi akademik dan non-akademik yang ditampilkan di website
        </p>
      </div>
      <a class="btn btn-primary btn-gradient" href="{{ route('prestasi.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Prestasi
      </a>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse ($achievements as $achievement)
        <div
          class="bg-base-100 group overflow-hidden rounded-2xl border shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
          <div class="relative h-40 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
              src="{{ asset("storage/$achievement->image") }}" alt="{{ $achievement->name }}" />
            <span
              class="bg-primary/90 absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-medium text-white backdrop-blur">
              {{ Str::ucfirst($achievement->category) }}
            </span>
          </div>
          <div class="space-y-3 p-5">
            <h3 class="font-semibold leading-snug">
              {{ $achievement->name }}
            </h3>
            <p class="text-base-content/60 line-clamp-2 text-sm">
              {{ $achievement->description }}
            </p>
            <div class="flex items-center justify-end pt-2">
              <div class="flex gap-2">
                <a class="btn btn-sm btn-soft" href="{{ route('prestasi.edit', ['achievement' => $achievement->id]) }}"
                  title="Edit Prestasi">
                  <span class="icon-[tabler--edit] size-4"></span>
                </a>
                <form action="{{ route('prestasi.destroy', ['achievement' => $achievement->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-soft text-red-600" type="submit" title="Hapus Prestasi"
                    onclick="return confirm('Yakin ingin menghapus prestasi ini?')">
                    <span class="icon-[tabler--trash] size-4"></span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada data prestasi yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>
  </div>
@endsection
