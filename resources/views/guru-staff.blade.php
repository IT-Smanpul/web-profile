@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <section class="bg-base-200 relative overflow-hidden py-28 pb-20">
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>
      <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        <span class="bg-primary text-primary-content inline-block rounded-full px-4 py-1 text-sm font-medium shadow">
          Personil Sekolah
        </span>
        <h1 class="mt-6 text-4xl font-bold md:text-5xl">
          Guru & Staff Sekolah
        </h1>
        <p class="text-base-content/80 mx-auto mt-6 max-w-3xl text-lg leading-relaxed">
          Guru dan staff profesional yang berkomitmen dalam mendukung
          proses pembelajaran, pengelolaan sekolah, serta pengembangan
          potensi peserta didik.
        </p>
      </div>
    </section>
    <section class="bg-base-100 py-4">
      <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="tabs tabs-bordered" role="tablist" aria-label="Tabs" aria-orientation="horizontal">
          <button class="tab active-tab:tab-active active" id="tabs-basic-item-1" data-tab="#tabs-basic-1" type="button"
            role="tab" aria-controls="tabs-basic-1" aria-selected="true">
            Guru
          </button>
          <button class="tab active-tab:tab-active" id="tabs-basic-item-2" data-tab="#tabs-basic-2" type="button"
            role="tab" aria-controls="tabs-basic-2" aria-selected="false">
            Staff
          </button>
        </div>
        <div class="mt-3">
          <div id="tabs-basic-1" role="tabpanel" aria-labelledby="tabs-basic-item-1">
            <div class="grid gap-6 lg:grid-cols-3">
              @forelse ($gurus as $employee)
                <div
                  class="bg-base-100/70 rounded-2xl border p-5 text-center shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-md">
                  <img class="mx-auto h-32 w-32 rounded-full object-cover shadow"
                    src="{{ $employee->photo ? asset("storage/$employee->photo") : asset('img/avatars/8.png') }}"
                    alt="{{ $employee->name }}" />
                  <div class="mt-4 space-y-1">
                    <p class="text-base-content text-base font-semibold">
                      {{ $employee->name }}
                    </p>
                    <p class="text-primary text-sm font-medium">
                      {{ $employee->position }}
                    </p>
                    @if ($employee->nip)
                      <p class="text-base-content/50 text-xs">
                        NIP {{ $employee->nip }}
                      </p>
                    @endif
                  </div>
                </div>
              @empty
                <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
                  <p class="text-base-content/60">
                    Belum ada data guru yang ditampilkan.
                  </p>
                </div>
              @endforelse
            </div>
          </div>
          <div class="hidden" id="tabs-basic-2" role="tabpanel" aria-labelledby="tabs-basic-item-2">
            <div class="grid gap-6 lg:grid-cols-3">
              @forelse ($staffs as $employee)
                <div
                  class="bg-base-100/70 rounded-2xl border p-5 text-center shadow-sm backdrop-blur transition hover:-translate-y-1 hover:shadow-md">
                  <img class="mx-auto h-32 w-32 rounded-full object-cover shadow"
                    src="{{ $employee->photo ? asset("storage/$employee->photo") : asset('img/avatars/8.png') }}"
                    alt="{{ $employee->name }}" />
                  <div class="mt-4 space-y-1">
                    <p class="text-base-content text-base font-semibold">
                      {{ $employee->name }}
                    </p>
                    <p class="text-primary text-sm font-medium">
                      {{ $employee->position }}
                    </p>
                  </div>
                </div>
              @empty
                <div class="col-span-full rounded-xl border border-dashed p-10 text-center">
                  <p class="text-base-content/60">
                    Belum ada data staff yang ditampilkan.
                  </p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <x-ui.footer />
@endsection
