@extends('root')

@section('content')
  <div class="bg-base-200 flex h-screen overflow-hidden">
    <aside class="bg-base-100 w-65 flex shrink-0 flex-col border-r">
      <div class="flex h-16 items-center gap-3 border-b px-6">
        <img class="h-9 w-9" src="{{ asset('img/logo.png') }}" alt="Logo">
        <div>
          <p class="font-semibold leading-none">SMAN 10</p>
          <p class="text-base-content/60 text-xs">Admin Panel</p>
        </div>
      </div>
      <nav class="flex-1 space-y-1 overflow-y-auto px-4 py-6 text-sm">
        <a class="{{ Route::is('dashboard') ? 'bg-green-500/10 text-green-600' : '' }} hover:bg-base-200 flex items-center gap-3 rounded-xl px-4 py-2.5 font-medium"
          href="/dashboard">
          <span class="icon-[tabler--dashboard] size-5"></span>
          Dashboard
        </a>
        <a class="hover:bg-base-200 flex items-center gap-3 rounded-xl px-4 py-2.5" href="/dashboard/berita">
          <span class="icon-[tabler--news] size-5"></span>
          Berita
        </a>
        <a class="hover:bg-base-200 flex items-center gap-3 rounded-xl px-4 py-2.5" href="/dashboard/prestasi">
          <span class="icon-[tabler--award] size-5"></span>
          Prestasi
        </a>

        <a class="{{ Route::is('fasilitas') ? 'bg-green-500/10 text-green-600' : '' }} hover:bg-base-200 flex items-center gap-3 rounded-xl px-4 py-2.5"
          href="/dashboard/fasilitas">
          <span class="icon-[tabler--building] size-5"></span>
          Fasilitas
        </a>
        <a class="hover:bg-base-200 flex items-center gap-3 rounded-xl px-4 py-2.5" href="/dashboard/guru">
          <span class="icon-[tabler--users] size-5"></span>
          Guru & Staff
        </a>
        <a class="hover:bg-base-200 flex items-center gap-3 rounded-xl px-4 py-2.5" href="/dashboard/settings">
          <span class="icon-[tabler--settings] size-5"></span>
          Pengaturan
        </a>
      </nav>
      <div class="border-t p-4">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="flex w-full items-center gap-3 rounded-xl px-4 py-2.5 text-sm text-red-600 hover:bg-red-50">
            <span class="icon-[tabler--logout] size-5"></span>
            Logout
          </button>
        </form>
      </div>
    </aside>
    <div class="flex flex-1 flex-col overflow-hidden">
      <header class="bg-base-100 flex h-16 shrink-0 items-center justify-between border-b px-8">
        <h1 class="text-lg font-semibold">
          @yield('title', 'Dashboard')
        </h1>
        <div class="flex items-center gap-3">
          <div class="text-right text-sm">
            <p class="font-medium">{{ Auth::user()->name ?? 'Admin' }}</p>
            <p class="text-base-content/60 text-xs">Administrator</p>
          </div>
          <div class="avatar">
            <div class="w-9 overflow-hidden rounded-full">
              <img class="h-full w-full object-cover" src="{{ asset('img/avatars/1.png') }}" alt="Admin Avatar" />
            </div>
          </div>
        </div>
      </header>
      <main class="flex-1 overflow-y-auto p-8">
        @yield('dashboard-content')
      </main>
    </div>
  </div>
@endsection
