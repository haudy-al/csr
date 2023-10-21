@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default" style="text-align: left; margin-bottom: 100px">
        <div class="container">
            <h3>Mitra Csr</h3>
            @livewire('mitra-csr')
        </div>
    </section>
@endsection
