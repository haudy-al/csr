@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="#" data-bs-toggle="modal" data-bs-target="#TambahLaporan" class="btn btn-primary btn-sm"><span
                        class="mdi mdi-plus"></span> Tambah</a>
                <div class="modal fade" id="TambahLaporan" tabindex="-1" aria-labelledby="TambahLaporanLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="TambahLaporanLabel">Pilih Usulan Kegiatan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/member/laporan/tambah">

                                    <select name="usulan" class="form-control"
                                        onchange="$(event.target).parents('form').submit()">
                                        <option value="">Pilih</option>

                                        @foreach ($dataUsulanKegiatan as $item)
                                            <option value="{{ $item->id }}" {!! _get('usulan') == '{{ $item->id }}' ? 'selected' : '' !!}>
                                                {{ $item->nama_kegiatan }}</option>
                                        @endforeach


                                    </select>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">

                {{-- <h3>Dalam Tahap pengembangan</h3> --}}

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                               
                                <th>Target Sasaran</th>
                                <th>Keterangan</th>
                                <th>Dokumen Laporan</th>
                                <th>Foto Kegiatan</th>


                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataLaporan as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->usulanKegiatan->nama_kegiatan ?? 'Kegiatan Telah Dihapus...' }}</td>
                                    <td><span class="text-capitalize">{{ $item->usulanKegiatan->kategori_manfaat }}</span> : {{ $item->transaksi->target_sasaran }}</td>
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

                                    <td>
                                        <form class="d-inline" action="/member/laporan/hapus/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit"
                                                class="btn badge btn-danger text-light"><span
                                                    class="mdi mdi-delete"></span> Hapus</button>
                                        </form>
                                        <a class="btn btn-warning badge"
                                            href="/membar/laporan/edit?i={{ $item->id }}">
                                            <span class="mdi mdi-file"></span> Ubah
                                        </a>
                                        <a class="btn btn-secondary badge mt-1"
                                            href="/membar/laporan/detail?i={{ $item->id }}">
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
                        <li class="breadcrumb-item active" aria-current="page">Perusahaan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
