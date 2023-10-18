@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default" style="text-align: left; margin-bottom: 100px">
        <div class="container">
            <h3>{{ getDataBidang(_get('i'))->nama }}</h3>
            @livewire('kegiatan')
        </div>
    </section>
@endsection
