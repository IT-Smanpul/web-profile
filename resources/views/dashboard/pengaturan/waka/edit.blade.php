@extends('components.dashboard.layout')

@section('title', 'Edit Wakil Kepala Sekolah')

@section('main')
  <livewire:dashboard::pengaturan.waka.edit :waka="$waka" />
@endsection
