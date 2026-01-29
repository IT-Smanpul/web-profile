<div class="space-y-6">
  <div class="flex flex-wrap items-center justify-between gap-4">
    <div>
      <h2 class="text-xl font-semibold">Prestasi</h2>
      <p class="text-base-content/60 text-sm">
        Kelola prestasi yang ditampilkan di website
      </p>
    </div>
    <div class="flex items-center gap-2">
      <input class="input max-w-sm" type="text" aria-label="input" wire:model.live="keyword"
        placeholder="Cari Prestasi" />
      <a class="btn btn-primary btn-gradient" href="{{ route('prestasi.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Prestasi
      </a>
    </div>
  </div>
  <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
    @forelse ($this->achievements as $achievement)
      <div class="card card-border group rounded-2xl">
        <figure class="relative h-44 overflow-hidden">
          <img class="size-full transition-transform duration-500 group-hover:scale-110"
            src="{{ asset("storage/$achievement->photo") }}" alt="{{ $achievement->name }}" />
        </figure>
        <span @class([
            'badge absolute left-3 top-3 rounded-full',
            'badge-primary' => $achievement->category === 'Akademik',
            'badge-secondary' => $achievement->category === 'Non-Akademik',
        ])>{{ $achievement->category }}</span>
        <div class="card-body">
          <h5 class="card-title mb-2.5">{{ $achievement->name }}</h5>
          <p class="mb-6">{{ Str::limit($achievement->description) }}</p>
          <div class="card-actions justify-end">
            <div class="tooltip">
              <a class="btn btn-sm btn-warning btn-soft"
                href="{{ route('prestasi.edit', ['achievement' => $achievement->id]) }}">
                <span class="icon-[tabler--edit] size-4"></span>
              </a>
              <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                <span class="tooltip-body tooltip-warning">Edit</span>
              </span>
            </div>
            <div class="tooltip">
              <button class="btn btn-sm btn-error btn-soft" type="button"
                @click="$dispatch('delete-prestasi', { achievement: '{{ $achievement->id }}'})">
                <span class="icon-[tabler--trash] size-4"></span>
              </button>
              <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                <span class="tooltip-body tooltip-error">Hapus</span>
              </span>
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
  <livewire:dashboard.prestasi.delete />
  @if ($this->achievements->hasPages())
    <div class="flex justify-end pt-6">
      {{ $this->achievements->links() }}
    </div>
  @endif
</div>
