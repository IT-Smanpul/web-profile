@extends('root')

@section('content')
  <div class="bg-base-200 flex h-screen overflow-hidden">
    <aside class="bg-base-100 w-65 flex shrink-0 flex-col border-r">
      <a class="flex h-16 items-center gap-3 border-b px-6" href="/">
        <img class="h-9 w-9" src="{{ asset('img/logo.png') }}" alt="Logo">
        <div>
          <p class="font-semibold leading-none">SMAN 10</p>
          <p class="text-base-content/60 text-xs">Admin Panel</p>
        </div>
      </a>
      <ul class="menu w-64 space-y-0.5">
        <li>
          <a href="{{ route('dashboard') }}" @class([
              'bg-green-500/10 text-green-600 hover:bg-green-500/20 hover:text-green-700' => Route::is(
                  'dashboard'),
          ])>
            <span class="icon-[tabler--home] size-5"></span>
            Dashboard
          </a>
        </li>
        <li>
          <a href="{{ route('berita.index') }}" @class([
              'bg-green-500/10 text-green-600 hover:bg-green-500/20 hover:text-green-700' => Route::is(
                  'berita.index'),
          ])>
            <span class="icon-[tabler--news] size-5"></span>
            Berita
          </a>
        </li>
        <li>
          <a href="{{ route('prestasi.index') }}" @class([
              'bg-green-500/10 text-green-600 hover:bg-green-500/20 hover:text-green-700' => Route::is(
                  'prestasi.index'),
          ])>
            <span class="icon-[tabler--award] size-5"></span>
            Prestasi
          </a>
        </li>
        <li>
          <a href="{{ route('fasilitas.index') }}" @class([
              'bg-green-500/10 text-green-600 hover:bg-green-500/20 hover:text-green-700' => Route::is(
                  'fasilitas.index'),
          ])>
            <span class="icon-[tabler--building] size-5"></span>
            Fasilitas
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon-[tabler--users] size-5"></span>
            Guru dan Staff
          </a>
        </li>
        <li class="space-y-0.5">
          <a class="collapse-toggle collapse-open:bg-base-content/10 open" id="menu-app"
            data-collapse="#menu-app-collapse">
            <span class="icon-[tabler--settings] size-5"></span>
            Pengaturan
            <span class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4 transition-all duration-300"></span>
          </a>
          <ul class="open collapse w-auto space-y-0.5 overflow-hidden transition-[height] duration-300"
            id="menu-app-collapse" aria-labelledby="menu-app">
            <li>
              <a href="{{ route('setting.general.edit') }}" @class([
                  'bg-green-500/10 text-green-600 hover:bg-green-500/20 hover:text-green-700' => Route::is(
                      'setting.general.edit'),
              ])>
                <span class="icon-[tabler--message] size-5"></span>
                Informasi Umum
              </a>
            </li>
            <li>
              <a href="{{ route('setting.visi-misi.edit') }}" @class([
                  'bg-green-500/10 text-green-600 hover:bg-green-500/20 hover:text-green-700' => Route::is(
                      'setting.visi-misi.edit'),
              ])>
                <span class="icon-[tabler--calendar] size-5"></span>
                Visi Misi
              </a>
            </li>
            <li>
              <a href="#">
                <span class="icon-[tabler--calendar] size-5"></span>
                Struktur Organisasi
              </a>
            </li>
            <li>
              <a href="#">
                <span class="icon-[tabler--user] size-5"></span>
                Akun
              </a>
            </li>
            {{--            <li class="space-y-0.5"> --}}
            {{--              <a class="collapse-toggle collapse-open:bg-base-content/10 open" id="sub-menu-academy" --}}
            {{--                data-collapse="#sub-menu-academy-collapse"> --}}
            {{--                <span class="icon-[tabler--book] size-5"></span> --}}
            {{--                Struktur Organisasi --}}
            {{--                <span class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4"></span> --}}
            {{--              </a> --}}
            {{--              <ul class="open collapse w-auto space-y-0.5 overflow-hidden transition-[height] duration-300" --}}
            {{--                id="sub-menu-academy-collapse" aria-labelledby="sub-menu-academy"> --}}
            {{--                <li> --}}
            {{--                  <a href="#"> --}}
            {{--                    <span class="icon-[tabler--books] size-5"></span> --}}
            {{--                    Courses --}}
            {{--                  </a> --}}
            {{--                </li> --}}
            {{--                <li> --}}
            {{--                  <a href="#"> --}}
            {{--                    <span class="icon-[tabler--list-details] size-5"></span> --}}
            {{--                    Course details --}}
            {{--                  </a> --}}
            {{--                </li> --}}
            {{--                <li class="space-y-0.5"> --}}
            {{--                  <a class="collapse-toggle collapse-open:bg-base-content/10 open" id="sub-menu-academy-stats" --}}
            {{--                    data-collapse="#sub-menu-academy-stats-collapse"> --}}
            {{--                    <span class="icon-[tabler--chart-bar] size-5"></span> --}}
            {{--                    Stats --}}
            {{--                    <span class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4"></span> --}}
            {{--                  </a> --}}
            {{--                  <ul class="open collapse w-auto space-y-0.5 overflow-hidden transition-[height] duration-300" --}}
            {{--                    id="sub-menu-academy-stats-collapse" aria-labelledby="sub-menu-academy-stats"> --}}
            {{--                    <li> --}}
            {{--                      <a href="#"> --}}
            {{--                        <span class="icon-[tabler--chart-donut] size-5"></span> --}}
            {{--                        Goals --}}
            {{--                      </a> --}}
            {{--                    </li> --}}
            {{--                  </ul> --}}
            {{--                </li> --}}
            {{--              </ul> --}}
            {{--            </li> --}}
          </ul>
        </li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-error btn-soft flex w-full items-center gap-2">
            <span class="icon-[tabler--logout] size-5"></span>
            Logout
          </button>
        </form>
      </ul>
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
