<?php

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Collection;

new class extends Component
{
    public function mount(): void
    {
        $data = Setting::all()->pluck('value', 'key')->toArray();

        $this->fill($data);
    }

    public string $school_name = '';

    public string $npsn = '';

    public string $school_status = 'Negeri';

    public string $accreditation = 'A';

    public string $curriculum = '';

    public function save(): void
    {
        $data = Collection::make($this->validate());

        foreach ($data->all() as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $this->redirectRoute('setting.general.edit');
    }

    protected function rules(): array
    {
        return [
            'school_name' => ['required', 'string', 'max:255'],
            'npsn' => ['required', 'string', 'max:255'],
            'school_status' => ['required', 'in:Negeri,Swasta'],
            'accreditation' => ['required', 'string'],
            'curriculum' => ['required', 'string'],
        ];
    }
};
?>

<form class="space-y-6" wire:submit="save">
  @csrf
  <div>
    <h2 class="text-xl font-semibold">Pengaturan Umum</h2>
    <p class="text-base-content/60 text-sm">
      Kelola identitas, NPSN, status, akreditasi, dan kurikulum sekolah.
    </p>
  </div>
  <div class="bg-base-100 space-y-6 rounded-xl p-8 shadow-sm">
    <div class="grid gap-6 md:grid-cols-2">
      <div>
        <label class="label-text" for="name">Nama Sekolah</label>
        <input id="name" type="text" @class([
            'input input-bordered w-full',
            'is-invalid' => $errors->has('school_name'),
        ]) wire:model="school_name"
          placeholder="Masukkan Nama Sekolah" />
        @error('school_name')
          <span class="helper-text">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div>
        <label class="label-text" for="npsn">NPSN</label>
        <input id="npsn" type="text" @class([
            'input input-bordered w-full',
            'is-invalid' => $errors->has('npsn'),
        ]) wire:model="npsn"
          placeholder="Masukkan NPSN Sekolah" />
        @error('npsn')
          <span class="helper-text">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div>
        <label class="label-text" for="school_status">Status Sekolah</label>
        <select id="school_status" @class([
            'select select-bordered w-full',
            'is-invalid' => $errors->has('school_status'),
        ]) wire:model="school_status">
          @foreach (['Negeri', 'Swasta'] as $status)
            <option value="{{ $status }}">
              {{ $status }}
            </option>
          @endforeach
        </select>
        @error('school_status')
          <span class="helper-text">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div>
        <label class="label-text" for="accreditation">Akreditasi</label>
        <select id="accreditation" @class([
            'select select-bordered w-full',
            'is-invalid' => $errors->has('accreditation'),
        ]) wire:model="accreditation">
          @foreach (['A', 'B', 'C', 'Belum Terakreditasi'] as $item)
            <option value="{{ $item }}">
              {{ $item }}
            </option>
          @endforeach
        </select>
        @error('accreditation')
          <span class="helper-text">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div class="md:col-span-2">
        <label class="label-text" for="curriculum">Kurikulum</label>
        <input class="input input-bordered w-full" id="curriculum" type="text" @class([
            'input input-bordered w-full',
            'is-invalid' => $errors->has('curriculum'),
        ])
          wire:model="curriculum" placeholder="Masukkan Kurikulum Sekolah" />
        @error('curriculum')
          <span class="helper-text">
            {{ $message }}
          </span>
        @enderror
      </div>
    </div>
    <div class="flex justify-end gap-3">
      <button class="btn btn-primary btn-gradient" type="submit">
        Simpan Data
      </button>
    </div>
  </div>
</form>