@extends('dashboard.layout')

@section('title', 'Visi & Misi')

@section('dashboard-content')
  <form class="space-y-10" action="/" method="POST">
    @csrf
    @method('PUT')

    {{-- Header --}}
    <div>
      <h2 class="text-xl font-semibold">Visi & Misi Sekolah</h2>
      <p class="text-base-content/60 text-sm">
        Kelola visi sekolah dan poin-poin misi yang ditampilkan di halaman profil
      </p>
    </div>

    {{-- VISI --}}
    <div class="bg-base-100 space-y-4 rounded-2xl p-6 shadow-sm">
      <h3 class="text-lg font-semibold">Visi</h3>

      <textarea class="textarea textarea-bordered w-full" name="vision" rows="4" placeholder="Tuliskan visi sekolah...">{{ old('vision') }}</textarea>
    </div>

    {{-- MISI --}}
    <div class="bg-base-100 space-y-4 rounded-2xl p-6 shadow-sm">
      <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold">Misi</h3>
        <button class="btn btn-sm btn-outline btn-primary" type="button" onclick="addMission()">
          <span class="icon-[tabler--plus] size-4"></span>
          Tambah Misi
        </button>
      </div>

      <div class="space-y-3" id="mission-list">
        @forelse (['a', 'b', 'c'] as $item)
          <div class="flex items-start gap-3">
            <input class="input input-bordered w-full" name="mission[]" type="text" value="{{ $item }}"
              placeholder="Poin misi..." />
            <button class="btn btn-square btn-sm btn-ghost text-red-500" type="button" title="Hapus"
              onclick="removeMission(this)">
              <span class="icon-[tabler--trash] size-4"></span>
            </button>
          </div>
        @empty
          <div class="flex items-start gap-3">
            <input class="input input-bordered w-full" name="mission[]" type="text" placeholder="Poin misi..." />
            <button class="btn btn-square btn-sm btn-ghost text-red-500" type="button" onclick="removeMission(this)">
              <span class="icon-[tabler--trash] size-4"></span>
            </button>
          </div>
        @endforelse
      </div>
    </div>

    {{-- ACTION --}}
    <div class="flex justify-end">
      <button class="btn btn-primary btn-gradient" type="submit">
        Simpan Visi & Misi
      </button>
    </div>
  </form>

  {{-- JS --}}
  <script>
    function addMission() {
      const list = document.getElementById('mission-list')

      const item = document.createElement('div')
      item.className = 'flex items-start gap-3'

      item.innerHTML = `
      <input
        type="text"
        name="mission[]"
        class="input input-bordered w-full"
        placeholder="Poin misi..."
      />
      <button
        type="button"
        class="btn btn-square btn-sm btn-ghost text-red-500"
        onclick="removeMission(this)"
      >
        <span class="icon-[tabler--trash] size-4"></span>
      </button>
    `
      list.appendChild(item)
    }

    function removeMission(button) {
      button.parentElement.remove()
    }
  </script>
@endsection
