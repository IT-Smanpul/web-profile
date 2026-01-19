@extends('components.dashboard.layout')

@section('main')
  <x-dashboard.index.metrics />

  <livewire:dashboard::index.recent-article />
@endsection
