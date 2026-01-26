@extends('components.dashboard.layout')

@section('main')
  <div>
    <h2 class="text-xl font-semibold">Visi & Misi Sekolah</h2>
    <p class="text-base-content/60 text-sm">
      Kelola visi sekolah dan poin-poin misi yang ditampilkan di halaman profil
    </p>
  </div>
  <nav class="tabs bg-base-200 rounded-field w-fit space-x-1 overflow-x-auto p-1" role="tablist" aria-label="Tabs"
    aria-orientation="horizontal">
    <button class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary active hover:bg-transparent"
      id="tabs-segment-item-1" data-tab="#tabs-segment-1" type="button" role="tab" aria-controls="tabs-segment-1"
      aria-selected="true">
      Visi
    </button>
    <button class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary hover:bg-transparent"
      id="tabs-segment-item-2" data-tab="#tabs-segment-2" type="button" role="tab" aria-controls="tabs-segment-2"
      aria-selected="false">
      Misi
    </button>
  </nav>
  <div class="mt-3">
    <div id="tabs-segment-1" role="tabpanel" aria-labelledby="tabs-segment-item-1">
      <livewire:dashboard::pengaturan.visi />
    </div>
    <div class="hidden" id="tabs-segment-2" role="tabpanel" aria-labelledby="tabs-segment-item-2">
      <livewire:dashboard::pengaturan.misi />
    </div>
  </div>
@endsection
