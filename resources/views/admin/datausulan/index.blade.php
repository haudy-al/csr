@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                {{-- <a href="/admin/data-usulan/tambah" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span>
                    Tambah</a> --}}


                <button type="button" data-bs-toggle="modal" data-bs-target="#ModalExportExcel"
                    class="btn btn-success btn-sm text-light"><span class="mdi mdi-file-excel"></span>
                    Export</button>

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
                                <th>Level</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $key => $item)
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
                                        <form action="/admin/data-usulan/pdf/{{ $item->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn"><span class="mdi mdi-eye"></span></button>
                                        </form>
                                    </td>
                                    <td>{{ cekLevelUsulanByMemberId($item->id_member) }}</td>


                                    <td class="d-flex">
                                        <a href="/admin/data-usulan/word/{{ $item->id }}"
                                            class="btn badge btn-info"><span class="mdi mdi-file-word"></span> Word</a>
                                        <form class="d-inline" action="/admin/data-usulan/hapus/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit"
                                                class="btn badge btn-danger text-light"><span class="mdi mdi-delete"></span>
                                                Hapus</button>
                                        </form>
                                        <a class="btn btn-warning badge"
                                            href="/admin/data-usulan/edit?i={{ $item->id }}">
                                            <span class="mdi mdi-file"></span> Ubah
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

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="ModalExportExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="ModalExportExcelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="ModalExportExcelLabel">Export Excel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <form class="d-inline" action="/admin/data-usulan/excel" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="">Password Excel<span class="text-danger">*</span> :</label>
                            <input type="password" placeholder="Masukan Password..." name="password_excel"
                                class="form-control">
                            @error('password_excel')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success btn-sm text-light"><span
                                class="mdi mdi-file-excel"></span>
                            Export</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @if (session()->has('tambahGagal'))
        <script>
            function showModalTambah() {
                $(`#ModalExportExcel`).modal('show');
            }
            $(function() {
                showModalTambah()
            });
        </script>
    @endif

    @include('admin.layouts.alert')

    <script>
        $('#zero_config').DataTable();
    </script>
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
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
