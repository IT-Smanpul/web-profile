@extends('components.dashboard.layout')

@section('main')
  <livewire:dashboard::guru-staff.edit :employee="$employee" />
@endsection
