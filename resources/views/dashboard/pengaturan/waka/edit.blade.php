@extends('components.dashboard.layout')

@section('main')
  <livewire:dashboard::pengaturan.waka.edit :waka="$waka" />
@endsection
