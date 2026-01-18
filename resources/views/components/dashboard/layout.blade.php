@extends('root')

@section('content')
  <div class="bg-base-200 flex min-h-screen flex-col">
    <x-dashboard.ui.navbar />

    <x-dashboard.ui.sidebar />

    <div class="lg:ps-75 flex grow flex-col">
      <main class="mx-auto w-full max-w-7xl flex-1 grow space-y-6 p-6">
        @yield('main')
      </main>

      <x-dashboard.ui.footer />
    </div>
  </div>
@endsection
