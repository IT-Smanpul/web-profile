@extends('dashboard.layout')

@section('title', 'Guru dan Staff')

@section('dashboard-content')
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-xl font-semibold">Guru dan Staff Sekolah</h2>
        <p class="text-base-content/60 text-sm">
          Kelola data guru dan staff yang ditampilkan di website sekolah
        </p>
      </div>
      <a class="btn btn-primary btn-gradient" href="{{ route('guru-staff.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Guru dan Staff
      </a>
    </div>
    <div class="grid gap-4 lg:grid-cols-3">
      @forelse ($employees as $employee)
        <div
          class="bg-base-100 group flex h-40 overflow-hidden rounded-xl border shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
          <div class="relative w-40 flex-shrink-0 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
              src="{{ $employee->photo ? asset("storage/$employee->photo") : asset('img/avatars/8.png') }}"
              alt="{{ $employee->name }}" />
          </div>
          <div class="flex flex-1 flex-col p-4">
            <div class="flex items-start justify-between gap-2">
              <div class="min-w-0">
                <h3 class="truncate text-base font-semibold">
                  {{ $employee->name }}
                </h3>
                <p class="text-primary text-wrap text-sm font-medium">
                  {{ $employee->position }}
                </p>
              </div>
              @if ($employee->role === 'guru')
                <span class="badge badge-primary badge-sm">Guru</span>
              @else
                <span class="badge badge-secondary badge-sm">Staff</span>
              @endif
            </div>
            @if ($employee->nip)
              <p class="text-base-content/60 mt-1 text-xs">
                NIP. {{ $employee->nip }}
              </p>
            @endif
            <div class="mt-auto flex justify-end gap-2">
              <a class="btn btn-xs btn-soft" href="{{ route('guru-staff.edit', $employee->id) }}" title="Edit">
                <span class="icon-[tabler--edit] size-4"></span>
              </a>
              <form action="{{ route('guru-staff.destroy', $employee->id) }}" method="POST"
                onsubmit="return confirm('Yakin hapus data ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-xs btn-soft text-red-600" title="Hapus">
                  <span class="icon-[tabler--trash] size-4"></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
          <p class="text-base-content/60 text-sm">
            Belum ada data guru dan staff yang ditambahkan.
          </p>
        </div>
      @endforelse
    </div>
  </div>
@endsection
