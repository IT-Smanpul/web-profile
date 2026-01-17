@extends('root')

@section('content')
  <div class="bg-base-200 flex min-h-screen flex-col">
    <x-dashboard.ui.navbar />

    <x-dashboard.ui.sidebar />

    <div class="lg:ps-75 flex grow flex-col">
      @yield('dashboard-content')

      <x-dashboard.ui.footer />
    </div>
  </div>
@endsection
