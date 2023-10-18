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
                    <div class="col-md-3 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="text-transform: capitalize">{{ $item->nama }}</h4>
                            </div>
                            <a href="/proyek-csr/kegiatan?i={{ $item->id }}">
                                <div class="card-footer "
                                    style="cursor: pointer; @if (getJumlahKegiatanByBidang($item->id) < 1) background-color: red; @else background-color: green; @endif">
                                    <div class="row">
                                        <div class="col-6">

                                            <small style="color: #fff">{{ getJumlahKegiatanByBidang($item->id) }}
                                                Kegiatan</small>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right d-flex">
                                                <i class="fa-solid fa-arrow-right" style="color: #fff"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
