@extends('components.dashboard.layout')

@section('title', 'Edit Prestasi')

@section('main')
  <livewire:dashboard::prestasi.edit :achievement="$achievement" />
@endsection
