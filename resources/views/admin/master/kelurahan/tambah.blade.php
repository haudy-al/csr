@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/admin/master/kelurahan" class="btn btn-sm"><span class="mdi mdi-keyboard-backspace"></span> Kembali</a>
            </div>

            <div class="card-body">

                @livewire('master.tambah-kelurahan')

            </div>
        </div>
    </div>
    
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Kelurahan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Kelurahan</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
