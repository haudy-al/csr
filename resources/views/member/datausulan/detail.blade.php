@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/member/data-usulan" class="btn btn-sm"><span class="mdi mdi-keyboard-backspace"></span> Kembali</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                       

                        <p class="card-text">
                            <strong>Nama Kegiatan:</strong> {{ $data->nama_kegiatan }}
                        </p>

                        <p class="card-text">
                            <strong>Kategori Manfaat:</strong> {{ $data->bidang->nama }}
                        </p>

                        <p class="card-text">
                            <strong>Penerima Manfaat:</strong> {{ $data->penerima_manfaat }}
                        </p>

                        <p class="card-text">
                            <strong>Bentuk Manfaat:</strong> ({{ convertSatuanTargetSasaran2($data->kategori_manfaat) }})
                        </p>

                        <p class="card-text">
                            <strong>Lokasi Kegiatan:</strong> {{ $data->lokasi_kegiatan }}
                        </p>

                        <p class="card-text">
                            <strong>Jumlah Penerima Manfaat:</strong> {{ convertSatuanTargetSasaran($data->kategori_manfaat, $data->jumlah_penerima_manfaat) }}
                        </p>

                        <div class="card mt-3"
                            style="background: rgb(133, 182, 255); border: 2px solid #0741ff; color: #ffffff">

                            <div class="card-body">
                                <p class="card-text ">
                                    <strong>Bentuk Kegiatan:</strong>
                                    <br>
                                    {!! $data->bentuk_kegiatan !!}
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <h4>Dokumen</h4>

                        <form action="/member/data-usulan/pdf/{{ $data->id }}" method="POST">
                            @csrf
                            Download <button class="p-0 d-inline bg-transparent border-0 text-danger">disini</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Data Usulan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Usulan>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
