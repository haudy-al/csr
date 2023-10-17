@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default" style="text-align: left; margin-bottom: 100px">
        <div class="container">
            <h3>Daftar Projek CSR</h3>
            <div class="row">
                @foreach ($dataBidang as $item)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $item->nama }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
