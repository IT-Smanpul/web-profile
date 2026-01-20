@extends('components.dashboard.layout')

@section('title', 'Edit Guru & Staff')

@section('main')
  <livewire:dashboard::guru-staff.edit :employee="$employee" />
@endsection
