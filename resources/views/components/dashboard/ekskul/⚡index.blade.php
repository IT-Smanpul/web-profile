<?php

use App\Models\Ekskul;
use Livewire\Component;
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
    public function ekskuls(): LengthAwarePaginator
    {
        return Ekskul::paginate(9);
    }
};
?>

<div class="space-y-6">
  <div class="flex flex-wrap items-center justify-between gap-4">
    <div>
      <h2 class="text-xl font-semibold">Ekstrakurikuler</h2>
      <p class="text-base-content/60 text-sm">
        Kelola ekskul yang ada di sekolah
      </p>
    </div>
    <div class="flex items-center gap-2">
      <input class="input max-w-sm" type="text" aria-label="input" wire:model.live="keyword" placeholder="Cari Ekskul" />
      <a class="btn btn-primary btn-gradient" href="{{ route('ekskul.create') }}">
        <span class="icon-[tabler--plus] size-5"></span>
        Tambah Ekskul
      </a>
    </div>
  </div>
  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($this->ekskuls as $ekskul)
      <div
        class="bg-base-100 group overflow-hidden rounded-2xl border shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
        <div class="relative h-40 overflow-hidden">
          <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
            src="{{ asset("storage/$ekskul->photo") }}" alt="{{ $ekskul->name }}" />
        </div>
        <div class="space-y-3 p-5">
          <h3 class="line-clamp-2 font-semibold leading-snug">
            {{ $ekskul->name }}
          </h3>
          <p class="text-base-content/60 line-clamp-2 text-sm">
            {{ $ekskul->description }}
          </p>
          <div class="flex items-center justify-end gap-2 pt-2">
            <div class="flex items-center gap-2 pt-2">
              <div class="tooltip">
                <a class="btn btn-sm btn-soft btn-warning" href="{{ route('ekskul.edit', ['ekskul' => $ekskul->id]) }}"
                  title="Edit Berita">
                  <span class="icon-[tabler--edit] size-4"></span>
                </a>
                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                  <span class="tooltip-body tooltip-warning">Edit</span>
                </span>
              </div>
              <div class="tooltip">
                <button class="btn btn-sm btn-soft btn-error" id="delete-button" type="button" title="Hapus Ekskul"
                  @click="$dispatch('delete-ekskul', { ekskul: '{{ $ekskul->id }}' })">
                  <span class="icon-[tabler--trash] size-4"></span>
                </button>
                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                  <span class="tooltip-body tooltip-error">Hapus</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
        <p class="text-base-content/60">
          Belum ada ekskul yang ditambahkan.
        </p>
      </div>
    @endforelse
  </div>
  <livewire:dashboard::ekskul.delete />
  @if ($this->ekskuls->hasPages())
    <div class="flex justify-end pt-6">
      {{ $this->ekskuls->links() }}
    </div>
  @endif
</div>