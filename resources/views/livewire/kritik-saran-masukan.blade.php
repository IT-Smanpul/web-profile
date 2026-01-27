<form class="space-y-6" wire:submit="save">
  <div>
    <label class="label-text">Peran</label>
    <select class="select select-bordered w-full" wire:model="as">
      <option value="" selected disabled>Pilih Peran</option>
      <option value="siswa">Siswa</option>
      <option value="orangtua">Orang Tua</option>
      <option value="guru">Guru</option>
      <option value="alumni">Alumni</option>
      <option value="umum">Umum</option>
    </select>
  </div>
  <div>
    <label class="label-text font-medium">
      Pesan <span class="text-error">*</span>
    </label>
    <textarea class="textarea textarea-bordered w-full" wire:model="message" rows="5" required
      placeholder="Tuliskan kritik, saran, atau masukan Anda di sini...">{{ old('message') }}</textarea>
  </div>
  <div class="bg-base-200/60 text-base-content/70 rounded-xl p-4 text-sm">
    <p>
      🔒 Masukan Anda bersifat <strong>rahasia</strong> dan hanya dapat
      dibaca oleh pihak sekolah
    </p>
  </div>
  <div class="flex justify-end pt-4">
    <button class="btn btn-primary btn-gradient" type="submit">
      Kirim Masukan
    </button>
  </div>
</form>
