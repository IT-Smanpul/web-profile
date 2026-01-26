@extends('components.dashboard.layout')

@section('main')
  <livewire:dashboard::fasilitas.edit :facility="$facility" />
@endsection
