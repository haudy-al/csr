@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                {{-- <a href="#" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span> Tambah</a> --}}

            </div>

            <div class="card-body">

                {{-- <h3>Dalam Tahap pengembangan</h3> --}}

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Anggaran</th>
                                <th>Keterangan</th>
                                <th>Dokumen Laporan</th>
                                <th>Foto Kegiatan</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataLaporan as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->usulanKegiatan->nama_kegiatan ?? 'Kegiatan Telah Dihapus...' }}</td>
                                    <td>{{ $item->anggaran }}</td>
                                    <td>{!! $item->keterangan !!}</td>

                                    <td>

                                        <form action="/member/laporan/pdf/{{ $item->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn"><span class="mdi mdi-eye"></span></button>
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ asset('storage/img/' . $item->foto) }}">
                                            <img src="{{ asset('storage/img/' . $item->foto) }}" width="50px"
                                                alt="">
                                        </a>
                                    </td>

                                    <td>{{ cekLevelUsulanByMemberId($item->id_member) }}</td>


                                    <td class="d-inline">
                                        <form class="" action="/admin/laporan/hapus/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit"
                                                class="btn btn-sm btn-danger text-light"><span
                                                    class="mdi mdi-delete"></span> Hapus</button>
                                        </form>
                                        {{-- <a class="btn btn-warning btn-sm" href="/membar/laporan/edit?i={{ $item->id }}">
                                            <span class="mdi mdi-file"></span> Ubah
                                        </a> --}}

                                        <a href="/admin/laporan/word/{{ $item->id }}" class="btn btn-sm btn-info"><span class="mdi mdi-file-word"></span> Word</a>

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
            <h4 class="page-title">Laporan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
