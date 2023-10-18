@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default" style="text-align: left; margin-bottom: 100px">
        <div class="container">
            <h3>{{ getDataUsulan(_get('i'))->nama_kegiatan }}</h3>

            @livewire('detail-proyek')
        </div>
    </section>
@endsection
