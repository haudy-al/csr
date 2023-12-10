@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                {{-- <a href="/member/data-usulan/tambah" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span>
                    Tambah</a> --}}

                <div class="dropdown">
                    <button class="btn btn-primary btn-sm " type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tambah
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/member/data-usulan/tambah/baru">Kegiatan Baru</a></li>
                        <li><a class="dropdown-item" href="/member/data-usulan/tambah/sudah-berjalan">Sudah Berjalan</a></li>
                    </ul>
                </div>
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
                                <th>Jumlah Penerima Manfaat</th>
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Kelurahan</th>
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
                                    <td>{{ $item->kategori_manfaat }} : {{ $item->jumlah_penerima_manfaat }}</td>
                                    <td>{!! $item->bentuk_kegiatan !!}</td>
                                    <td>{{ $item->lokasi_kegiatan }}</td>
                                    <td>{{ $item->kelurahan->nama ?? '' }}</td>
                                    <td>
                                        <form action="/member/data-usulan/pdf/{{ $item->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn"><span class="mdi mdi-eye"></span></button>
                                        </form>
                                    </td>

                                    <td class="d-flex">
                                        <form class="d-inline" action="/member/data-usulan/hapus/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit"
                                                class="btn badge m-1 btn-danger text-light"><span
                                                    class="mdi mdi-delete"></span> Hapus</button>
                                        </form>
                                        <a class="btn btn-warning badge m-1"
                                            href="/membar/data-usulan/edit?i={{ $item->id }}">
                                            <span class="mdi mdi-file"></span> Ubah
                                        </a>
                                        <a class="btn btn-secondary badge m-1"
                                            href="/membar/data-usulan/detail?i={{ $item->id }}">
                                            <span class="mdi mdi-eye"></span> Detail
                                        </a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

    @if (session()->has('BantuGagal'))
        <script>
            function showModalTambah(id) {
                $(`#modalBantu${id}`).modal('show');
            }
            $(function() {
                showModalTambah(`{{ session('BantuGagal') }}`)
            });
        </script>
    @endif

    @include('admin.layouts.alert')


    <script>
        $('#zero_config').DataTable();
        $('#zero_config2').DataTable();
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
                        <li class="breadcrumb-item active" aria-current="page">Perusahaan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
