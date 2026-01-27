@extends('root')

@section('meta')
  <meta name="robots" content="noindex, nofollow" />
  <meta name="description" content="Dashboard Website SMA Negeri 10 Pontianak." />
@endsection

@section('content')
  <div class="bg-base-200 flex min-h-screen flex-col">
    <x-dashboard.ui.navbar />

    <x-dashboard.ui.sidebar />

    <div class="lg:ps-75 flex grow flex-col">
      <main class="mx-auto w-full flex-1 grow space-y-6 p-6">
        @yield('main')
      </main>
    </div>
  </div>
@endsection
