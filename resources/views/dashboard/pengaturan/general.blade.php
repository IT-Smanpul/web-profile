@use('App\Models\Setting')

@extends('dashboard.layout')

@section('title', 'Pengaturan Umum')

@section('dashboard-content')
  <form class="space-y-10" action="{{ route('setting.general.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
      <h2 class="text-xl font-semibold">Pengaturan Umum</h2>
      <p class="text-base-content/60 text-sm">
        Kelola identitas, informasi dasar, dan visi–misi sekolah
      </p>
    </div>
    <div class="bg-base-100 space-y-6 rounded-2xl p-6 shadow-sm">
      <h3 class="text-lg font-semibold">Identitas Sekolah</h3>
      <div class="grid gap-6 md:grid-cols-2">
        <div>
          <label class="label-text">Nama Sekolah</label>
          <input class="input input-bordered w-full" name="school_name" type="text"
            value="{{ old('school_name', Setting::where('key', 'school_name')->first()->value) }}" />
        </div>
        <div>
          <label class="label-text">NPSN</label>
          <input class="input input-bordered w-full" name="npsn" type="text"
            value="{{ old('npsn', Setting::where('key', 'npsn')->first()->value) }}" />
        </div>
        <div>
          <label class="label-text">Status Sekolah</label>
          <select class="select select-bordered w-full" name="school_status">
            @foreach (['Negeri', 'Swasta'] as $status)
              <option value="{{ $status }}" @selected(old('school_status', Setting::where('key', 'school_status')->first()->value) === $status)>
                {{ $status }}
              </option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="label-text">Akreditasi</label>
          <select class="select select-bordered w-full" name="accreditation">
            @foreach (['A', 'B', 'C', 'Belum Terakreditasi'] as $item)
              <option value="{{ $item }}" @selected(old('accreditation', Setting::where('key', 'accreditation')->first()->value) === $item)>
                {{ $item }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="md:col-span-2">
          <label class="label-text">Kurikulum</label>
          <input class="input input-bordered w-full" name="curriculum" type="text"
            value="{{ old('curriculum', Setting::where('key', 'curriculum')->first()->value) }}" />
        </div>
      </div>
    </div>
    <div class="flex justify-end gap-3">
      <button class="btn btn-primary btn-gradient" type="submit">
        Simpan Pengaturan
      </button>
    </div>
  </form>
@endsection
