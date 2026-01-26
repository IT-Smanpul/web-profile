@extends('components.dashboard.layout')

@section('main')
  <livewire:dashboard::berita.edit :article="$article" />
@endsection
