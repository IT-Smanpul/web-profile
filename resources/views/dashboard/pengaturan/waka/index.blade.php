@extends('dashboard.layout')

@section('title', 'Kepala Sekolah')

@section('dashboard-content')
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-xl font-semibold">Wakil Kepala Sekolah</h2>
        <p class="text-base-content/60 text-sm">
          Kelola data waka yang ditampilkan di website sekolah
        </p>
      </div>
      <a class="btn btn-primary btn-gradient" href="{{ route('wakil-kepala-sekolah.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Waka
      </a>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse ($wakilKepalaSekolah as $waka)
        <div class="bg-base-100 rounded-2xl border p-6 text-center shadow-sm transition hover:shadow-md">
          <img class="mx-auto mb-4 h-24 w-24 rounded-full object-cover shadow"
            src="{{ Storage::exists($waka->photo) ? asset("storage/$waka->photo") : asset('img/avatar-placeholder.png') }}"
            alt="{{ $waka->name }}" />
          <p class="text-base-content/60 text-sm">
            {{ $waka->position }}
          </p>
          <p class="mt-1 font-semibold">
            {{ $waka->name }}
          </p>
          <p class="text-base-content/50 mt-1 text-xs">
            NIP {{ $waka->nip ?? '-' }}
          </p>
          <div class="mt-4 flex justify-center gap-2">
            <a class="btn btn-sm btn-outline" href="{{ route('wakil-kepala-sekolah.edit', ['waka' => $waka->id]) }}">
              Edit
            </a>
            <form action="{{ route('wakil-kepala-sekolah.destroy', ['waka' => $waka->id]) }}" method="POST"
              onsubmit="return confirm('Yakin hapus data ini?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-soft text-red-600" type="submit">
                Hapus
              </button>
            </form>
          </div>
        </div>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60">
            Belum ada data waka yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>
  </div>
@endsection
