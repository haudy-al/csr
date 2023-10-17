@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')

    @livewire('register-perusahaan')
@endsection

@section('custom_cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@endsection
