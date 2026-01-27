<form class="bg-base-100 space-y-4 rounded-xl p-6 shadow-sm" wire:submit="save">
  <h3 class="text-lg font-semibold">Tuliskan Visi</h3>
  <textarea class="textarea textarea-bordered w-full" wire:model="vision" rows="4" placeholder="......"></textarea>
  <div class="flex justify-end">
    <button class="btn btn-primary justify-end" type="submit">Simpan Visi</button>
  </div>
</form>
