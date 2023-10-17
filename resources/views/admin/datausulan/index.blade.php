@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/admin/data-usulan/tambah" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span> Tambah</a>
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
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Kelurahan</th>
                                <th>anggaran</th>
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
                                    <td>{!! $item->bentuk_kegiatan !!}</td>
                                    <td>{{ $item->lokasi_kegiatan }}</td>
                                    <td>{{ $item->kelurahan->nama }}</td>
                                    <td>Rp. {{ $item->anggaran }}</td>
                                    <td>
                                        <form action="/admin/data-usulan/pdf/{{ $item->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn"><span class="mdi mdi-eye"></span></button>
                                        </form>
                                    </td>
                                    <td>{{ cekLevelUsulanByMemberId($item->id_member) }}</td>


                                    <td>
                                        <form class="" action="/admin/data-usulan/hapus/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit"
                                                class="btn btn-sm btn-danger text-light"><span
                                                    class="mdi mdi-delete"></span> Hapus</button>
                                        </form>
                                        <a class="btn btn-warning btn-sm"
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
