@extends('member.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                {{-- <a href="/member/data-usulan/tambah" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span>
                    Tambah</a> --}}
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Bidang</th>
                                <th>Penerima Manfaat</th>
                                <th>Bentuk Kegiatan</th>
                                <th>Lokasi</th>
                                <th>Kelurahan</th>
                                <th>anggaran</th>
                                <th>Proposal</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataUsulan as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td>{{ $item->bidang->nama }}</td>
                                    <td>{{ $item->penerima_manfaat }}</td>
                                    <td>{!! $item->bentuk_kegiatan !!}</td>
                                    <td>{{ $item->lokasi_kegiatan }}</td>
                                    <td>{{ $item->kelurahan->nama }}</td>
                                    <td>Rp. {{ $item->anggaran }}</td>
                                    <td>
                                        <form action="/member/data-usulan/pdf/{{ $item->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn"><span class="mdi mdi-eye"></span></button>
                                        </form>
                                    </td>

                                    <td>
                                      
                                        @php
                                            $cekDataL = App\Models\LaporanModel::where('id_usulan_kegiatan', $item->id)->where('id_member',getDataMember()->id)->get()->first();
                                        @endphp

                                        @if (!$cekDataL)
                            
                                        <form action="/member/data-usulan/pemerintah/bantu/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success text-light">Bantu</button>
                                        </form>

                                        @endif

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

    @include('admin.layouts.alert')


    <script>
        $('#zero_config').DataTable();
    </script>
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Data Usulan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Usulan</li>
                        <li class="breadcrumb-item active" aria-current="page">Pemerintah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
