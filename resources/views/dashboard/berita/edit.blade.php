@extends('components.dashboard.layout')

@section('title', 'Edit Berita')

@section('main')
  <livewire:dashboard::berita.edit :article="$article" />
@endsection
