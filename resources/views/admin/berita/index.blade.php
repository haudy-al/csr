@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/admin/berita/tambah" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span> Tambah</a>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Waktu</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataBerita as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->created_at->format('D m Y H:i:s') }}</td>

                                    <td>
                                        <img src="{{ asset('storage/img/' . $item->gambar) }}" width="60px" alt="">
                                    </td>

                                    <td>
                                        <form class="d-inline" action="/admin/berita/hapus/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit" class="btn btn-sm btn-danger text-light"><span
                                                    class="mdi mdi-delete"></span> Hapus</button>
                                        </form>
                                        <a class="btn btn-warning btn-sm" href="/admin/berita/edit?user={{ $item->id }}">
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
            <h4 class="page-title">Berita</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita CSR</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
