@extends('components.dashboard.layout')

@section('title', 'Tambah Fasilitas')

@section('main')
  <livewire:dashboard::fasilitas.edit :facility="$facility" />
@endsection
