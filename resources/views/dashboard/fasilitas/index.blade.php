@extends('dashboard.layout')

@section('title', 'Fasilitas')

@section('dashboard-content')
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-xl font-semibold">Fasilitas Sekolah</h2>
        <p class="text-base-content/60 text-sm">
          Kelola data fasilitas yang ditampilkan di website sekolah
        </p>
      </div>
      <a class="btn btn-primary btn-gradient" href="{{ route('fasilitas.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Fasilitas
      </a>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse ($facilities as $facility)
        <div class="bg-base-100 group overflow-hidden rounded-2xl border shadow-sm transition hover:shadow-md">
          <div class="relative h-40 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
              src="{{ asset("storage/$facility->image") }}" alt="Laboratorium Komputer" />
          </div>
          <div class="space-y-3 p-5">
            <div class="flex items-start justify-between gap-3">
              <h3 class="font-semibold leading-snug">
                {{ $facility->name }}
              </h3>
            </div>
            <p class="text-base-content/60 line-clamp-2 text-sm">
              {{ $facility->description }}
            </p>
            <div class="flex items-center justify-end pt-2">
              <div class="flex gap-2">
                <a class="btn btn-sm btn-soft" href="{{ route('fasilitas.edit', ['facility' => $facility->id]) }}"
                  title="Edit Fasilitas">
                  <span class="icon-[tabler--edit] size-4"></span>
                </a>
                <form action="{{ route('fasilitas.destroy', ['facility' => $facility->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-soft text-red-600" title="Hapus Fasilitas"
                    onclick="return confirm('yakin hapus?')">
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
            Belum ada data fasilitas yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>
  </div>
@endsection
