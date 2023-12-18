@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/member/laporan" class="btn btn-sm"><span class="mdi mdi-keyboard-backspace"></span> Kembali</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <strong>Usulan Kegiatan : </strong> {{ $data->usulan->nama_kegiatan }}
                        </p>
                      
                        <p>
                            <strong>Target Sasaran : </strong> <span class="text-capitalize">{{ $data->usulan->kategori_manfaat }} : {{ getTaransaksiAdmin($data->id_transaksi)->target_sasaran }}</span>
                        </p>
                        <p>
                            <strong>Keterangan : </strong> {!! $data->keterangan !!}
                        </p>
                        <p>
                            <strong>Foto : </strong>
                        </p>
                        <img class="w-50" src="{{ cekGambarMember($data->foto) }}" alt="">

                    </div>
                    <div class="col-md-6">
                        <h4>Dokumen</h4>

                          
                        <form action="/member/laporan/pdf/{{ $data->id }}" method="POST">
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
            <h4 class="page-title">Laporan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
