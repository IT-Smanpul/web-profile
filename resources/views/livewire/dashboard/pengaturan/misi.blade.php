<form class="bg-base-100 space-y-4 rounded-xl p-6 shadow-sm" wire:submit="save">
  <div class="flex items-center justify-between">
    <h3 class="text-lg font-semibold">Tambahkan Misi</h3>
    <button class="btn btn-sm btn-outline btn-primary" type="button" wire:click="addMission">
      <span class="icon-[tabler--plus] size-4"></span>
      Tambah Misi
    </button>
  </div>
  <div class="space-y-3" id="mission-list">
    @foreach ($missions as $mission)
      <div class="flex items-center gap-3">
        <input class="input input-bordered w-full" type="text" wire:model="missions.{{ $loop->index }}"
          placeholder="Poin misi..." />
        <button class="btn btn-square btn-sm btn-soft text-red-500" type="button" title="Hapus"
          wire:click="removeMission({{ $loop->index }})">
          <span class="icon-[tabler--trash] size-4"></span>
        </button>
      </div>
    @endforeach
  </div>
  <div class="flex justify-end">
    <button class="btn btn-primary" type="submit">Simpan Misi</button>
  </div>
</form>
