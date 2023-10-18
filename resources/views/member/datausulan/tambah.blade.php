@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/member/data-usulan" class="btn btn-sm"><span class="mdi mdi-keyboard-backspace"></span> Kembali</a>
            </div>

            <div class="card-body">

                @livewire('member.tambah-usulan-kegiatan')

            </div>
        </div>
    </div>

   
    
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Usulan Kegiatan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usulan Kegiatan</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
