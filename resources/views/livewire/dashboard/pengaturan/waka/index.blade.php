<div class="space-y-6">
  <div class="flex flex-wrap items-center justify-between gap-4">
    <div>
      <h2 class="text-xl font-semibold">Wakil Kepala Sekolah</h2>
      <p class="text-base-content/60 text-sm">
        Kelola data waka yang ditampilkan di website sekolah
      </p>
    </div>
    <div class="flex items-center gap-2">
      <input class="input max-w-sm" type="text" aria-label="input" wire:model.live="keyword" placeholder="Cari..." />
      <a class="btn btn-primary btn-gradient" href="{{ route('wakil-kepala-sekolah.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Waka
      </a>
    </div>
  </div>
  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($this->employees as $employee)
      <div
        class="card sm:card-side bg-base-100 overflow-hidden rounded-2xl border shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
        <figure class="relative h-48 w-full flex-shrink-0 overflow-hidden sm:h-auto sm:w-44">
          <img class="h-full w-full object-cover" src="{{ asset('storage/' . $employee->photo) }}"
            alt="{{ $employee->name }}" />
        </figure>
        <div class="card-body flex flex-col p-5">
          <div class="space-y-5">
            <div class="min-w-0">
              <h5 class="card-title mb-0.5 break-all">
                {{ $employee->name }}
              </h5>
              <p class="text-base-content/70 text-sm">
                {{ $employee->position }}
              </p>
            </div>
          </div>
          @if ($employee->nip)
            <p class="text-base-content/50 mt-2 text-xs">
              NIP {{ $employee->nip }}
            </p>
          @endif
          <div class="card-actions mt-auto justify-end gap-2">
            <div class="tooltip">
              <a class="btn btn-sm btn-warning btn-soft"
                href="{{ route('wakil-kepala-sekolah.edit', ['waka' => $employee->id]) }}">
                <span class="icon-[tabler--edit] size-4"></span>
              </a>
              <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                <span class="tooltip-body tooltip-warning">Edit</span>
              </span>
            </div>
            <div class="tooltip">
              <button class="btn btn-sm btn-error btn-soft"
                @click="$dispatch('delete-waka', { waka: '{{ $employee->id }}' })">
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
          Belum ada data waka yang ditambahkan.
        </p>
      </div>
    @endforelse
  </div>
  <livewire:dashboard.pengaturan.waka.delete />
  @if ($this->employees->hasPages())
    <div class="flex justify-end pt-6">
      {{ $this->employees->links() }}
    </div>
  @endif
</div>
