@use('App\Models\Suggestions')

@php
  $suggestions = Suggestions::orderBy('created_at', 'desc')->paginate(10);
@endphp

@extends('components.dashboard.layout')

@section('main')
  <div class="space-y-8">

    {{-- HEADER --}}
    <div>
      <h2 class="text-xl font-semibold">Kotak Saran</h2>
      <p class="text-base-content/60 text-sm">
        Kritik, saran, dan masukan untuk SMAN 10 Pontianak
      </p>
    </div>

    @if ($suggestions->isEmpty())
      <div class="rounded-xl border border-dashed p-10 text-center">
        <p class="text-base-content/60">
          Belum ada kritik atau saran yang masuk.
        </p>
      </div>
    @else
      <div class="grid gap-6 md:grid-cols-2">
        @foreach ($suggestions as $suggestion)
          <div
            class="bg-base-100 relative flex flex-col overflow-hidden rounded-2xl border p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="bg-primary absolute left-0 top-0 h-full w-1 rounded-l-2xl"></div>
            <div class="mb-3 flex items-center justify-between gap-3">
              <div class="flex items-center gap-3">
                <div class="avatar placeholder">
                  <div class="bg-primary/20 text-primary w-9 rounded-full">
                    <span class="text-sm font-semibold">
                      {{ Str::upper(Str::substr($suggestion->as ?? 'A', 0, 1)) }}
                    </span>
                  </div>
                </div>
                <div class="flex flex-col leading-tight">
                  <span class="font-medium">
                    Dari {{ $suggestion->as ?? 'Anonim' }}
                  </span>
                  <span class="text-base-content/50 text-xs">
                    {{ $suggestion->created_at->diffForHumans() }}
                  </span>
                </div>
              </div>
              <form method="POST" action="#">
                @csrf
                @method('DELETE')
                <button class="btn btn-xs btn-soft btn-error" title="Hapus"
                  onclick="return confirm('Yakin hapus saran ini?')">
                  <span class="icon-[tabler--trash] size-3.5"></span>
                </button>
              </form>
            </div>
            <p class="text-base-content/80 text-sm leading-relaxed">
              {{ $suggestion->message }}
            </p>
          </div>
        @endforeach
      </div>
      @if ($suggestions->hasPages())
        <div class="flex justify-end pt-6">
          {{ $suggestions->links() }}
        </div>
      @endif
    @endif
  </div>
@endsection
