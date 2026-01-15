@extends('dashboard.layout')

@section('title', 'Edit Guru & Staff')

@section('dashboard-content')
  <div class="relative">
    <div class="bg-base-100 relative mx-auto w-full rounded-3xl border p-8 shadow-sm">
      <div class="mb-8 space-y-2">
        <h2 class="text-xl font-semibold">Edit Guru & Staff</h2>
        <p class="text-base-content/60 text-sm">
          Edit data guru atau staff yang akan ditampilkan di website sekolah
        </p>
      </div>
      @if ($errors->any())
        <div class="alert alert-error mb-6 rounded-xl">
          <span class="icon-[tabler--alert-circle] size-5"></span>
          <div>
            <p class="font-semibold">Terjadi kesalahan</p>
            <p class="text-sm">Silakan periksa kembali input yang kamu isi.</p>
          </div>
        </div>
      @endif
      <form class="space-y-6" method="POST" action="{{ route('guru-staff.update', ['employee' => $employee->id]) }}"
        enctype="multipart/form-data">
        @csrf
        @METHOD('PATCH')
        <div class="grid gap-8 md:grid-cols-[320px_1fr]">
          <div>
            <label class="label">
              <span class="label-text font-medium">Foto</span>
            </label>
            @if ($employee->photo)
              <div
                class="bg-base-200 @error('photo') border-error @enderror mb-3 flex h-64 items-center justify-center overflow-hidden rounded-2xl border"
                id="imagePreview">
                <img class="h-full w-full object-cover" id="previewImg" src="{{ asset("storage/$employee->photo") }}"
                  alt="preview foto" />
              </div>
            @else
              <div
                class="bg-base-200 @error('photo') border-error @enderror mb-3 flex h-64 items-center justify-center overflow-hidden rounded-2xl border"
                id="imagePreview">
                <span class="text-base-content/40 text-sm" id="imagePlaceholder">
                  Preview Foto
                </span>
                <img class="hidden h-full w-full object-cover" id="previewImg" alt="preview foto" />
              </div>
            @endif
            <input class="hidden" id="photo" name="photo" type="file" accept="image/*"
              onchange="previewImage(event)" />
            <label for="photo" @class([
                'btn btn-outline w-full cursor-pointer gap-2',
                'btn-error' => $errors->has('photo'),
                'btn-primary' => !$errors->has('photo'),
            ])>
              <span class="icon-[tabler--upload] size-5"></span>
              Pilih Foto
            </label>
            @error('photo')
              <label class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
              </label>
            @enderror
            <p class="text-base-content/60 mt-1 text-xs">
              Foto formal, rasio 1:1 (JPG / PNG, max 2MB)
            </p>
          </div>
          <div class="space-y-6">
            <div>
              <label class="label-text" for="role">Guru atau Staff?</label>
              <select class="select @error('role') is-invalid @enderror" id="role" name="role">
                <option value="guru" @selected(old('role', $employee->role) === 'guru')>Guru</option>
                <option value="staff" @selected(old('role', $employee->role) === 'staff')>Staff</option>
              </select>
              @error('role')
                <span class="helper-text">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <label class="label-text" for="name">Nama Lengkap</label>
              <input class="input input-bordered @error('name') is-invalid @enderror w-full" id="name" name="name"
                type="text" value="{{ old('name', $employee->name) }}" placeholder="Contoh: Siti Aminah, S.Pd" />
              @error('name')
                <span class="helper-text">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <label class="label-text" for="nip">NIP</label>
              <input class="input input-bordered @error('nip') is-invalid @enderror w-full" id="nip" name="nip"
                type="text" value="{{ old('nip', $employee->nip) }}" placeholder="Masukkan NIP" />
              @if ($errors->has('nip'))
                @error('nip')
                  <span class="helper-text">{{ $message }}</span>
                @enderror
              @else
                <span class="helper-text">Opsional, kosongkan kalau tidak ada</span>
              @endif
            </div>
            <div>
              <label class="label">
                <span class="label-text font-medium">Posisi / Jabatan</span>
              </label>
              <input class="input input-bordered @error('position') is-invalid @enderror w-full" name="position"
                type="text" value="{{ old('position', $employee->position) }}"
                placeholder="Guru Matematika / Staff TU" />
              @error('position')
                <span class="helper-text">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="flex justify-end gap-3 pt-6">
          <a class="btn btn-ghost" href="{{ route('guru-staff.index') }}">
            Batal
          </a>
          <button class="btn btn-primary btn-gradient" type="submit">
            Edit Guru / Staff
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

<script>
  function previewImage(event) {
    const input = event.target
    const placeholder = document.getElementById("imagePlaceholder")
    const preview = document.getElementById("previewImg")

    if (!input.files || !input.files[0]) return

    preview.src = URL.createObjectURL(input.files[0])
    preview.classList.remove("hidden")
    placeholder.classList.add("hidden")
  }
</script>
