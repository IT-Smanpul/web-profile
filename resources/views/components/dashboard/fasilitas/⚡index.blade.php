<?php

use Livewire\Component;
use App\Models\Facility;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;

new class extends Component
{
    use WithPagination;

    #[Url]
    public string $keyword = '';

    #[Computed]
    public function facilities(): LengthAwarePaginator
    {
        return Facility::searchBy('name', $this->keyword)->latest()->paginate(8);
    }
};
?>

<div class="space-y-6">
  <div class="flex flex-wrap items-center justify-between gap-4">
    <div>
      <h2 class="text-xl font-semibold">Fasilitas</h2>
      <p class="text-base-content/60 text-sm">
        Kelola fasilitas yang ditampilkan di website
      </p>
    </div>
    <div class="flex items-center gap-2">
      <input class="input max-w-sm" type="text" aria-label="input" wire:model.live="keyword"
        placeholder="Cari Fasilitas" />
      <a class="btn btn-primary btn-gradient" href="{{ route('fasilitas.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Fasilitas
      </a>
    </div>
  </div>
  <div class="grid gap-6 sm:grid-cols-3 2xl:grid-cols-4">
    @forelse ($this->facilities as $facility)
      <div class="card card-border group rounded-2xl">
        <figure class="relative h-44 overflow-hidden">
          <img class="size-full transition-transform duration-500 group-hover:scale-110"
            src="{{ asset("storage/$facility->image") }}" alt="Shoes" />
        </figure>
        <div class="card-body">
          <h5 class="card-title mb-2.5">{{ $facility->name }}</h5>
          <p class="mb-6">{{ Str::limit($facility->description) }}</p>
          <div class="card-actions justify-end">
            <div class="tooltip">
              <a class="btn btn-sm btn-warning btn-soft"
                href="{{ route('fasilitas.edit', ['facility' => $facility->id]) }}">
                <span class="icon-[tabler--edit] size-4"></span>
              </a>
              <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                <span class="tooltip-body tooltip-warning">Edit</span>
              </span>
            </div>
            <div class="tooltip">
              <button class="btn btn-sm btn-error btn-soft" type="button"
                @click="$dispatch('delete-fasilitas', { facility: '{{ $facility->id }}' })">
                <span class="icon-[tabler--x] size-4"></span>
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
          Belum ada data fasilitas yang ditambahkan.
        </p>
      </div>
    @endforelse
  </div>
  <livewire:dashboard::fasilitas.delete />
  @if ($this->facilities->hasPages())
    <div class="flex justify-end pt-6">
      {{ $this->facilities->links() }}
    </div>
  @endif
</div>