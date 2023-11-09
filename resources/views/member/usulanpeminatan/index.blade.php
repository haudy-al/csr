@extends('member.layouts.app')

@section('content_member')
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
                                <th>Proposal</th>
                                <th>Target Sasaran</th>
                                <th>Status</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataUsulanKegiatan as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td>{{ $item->bidang->nama }}</td>
                                    <td>{{ $item->penerima_manfaat }}</td>
                                    <td>{!! $item->bentuk_kegiatan !!}</td>
                                    <td>{{ $item->lokasi_kegiatan }}</td>
                                    <td>{{ $item->kelurahan->nama ?? '-' }}</td>
                                    <td>
                                        <form action="/member/data-usulan/pdf/{{ $item->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn"><span class="mdi mdi-eye"></span></button>
                                        </form>
                                    </td>
                                    <td>{{ getTaransaksi($item->id)->target_sasaran }}</td>
                                    <td><span
                                            class="status-{{ getTaransaksi($item->id)->status }}">{{ getTaransaksi($item->id)->status }}</span>
                                    </td>
                                    <td>
                                        <form class="d-inline "
                                            action="/member/data-usulan-peminatan/surat-minat/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary badge mb-1"><span
                                                    class="mdi mdi-file-pdf-box"></span> Surat Minat</button>
                                        </form>
                                        @if (getTaransaksi($item->id)->status == 'proses')
                                            <form class="d-inline"
                                                action="/member/data-usulan-peminatan/delete/{{ getTaransaksi($item->id)->id }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger badge mb-1"
                                                    onclick="return confirm('Yakin Ingin Menghapus ?');"><span
                                                        class="mdi mdi-delete"></span> Hapus</button>
                                            </form>
                                        @endif

                                        @if (getTaransaksi($item->id)->status == 'diterima')
                                            <a href="/member/laporan/tambah/{{ getTaransaksi($item->id)->id }}?usulan={{ $item->id }}" class="btn btn-success badge mb-1" ><span
                                                    class="mdi mdi-plus"></span> Buat Laporan</a>
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
    </script>
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Usulan Peminatan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usulan Peminatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
