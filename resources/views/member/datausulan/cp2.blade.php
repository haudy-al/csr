@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/member/data-usulan/tambah" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span>
                    Tambah</a>
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

        <div class="card">

            <div class="card-header">
                <h5>Usulan Kegiatan Perusahaan Lain</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="zero_config2" class="table table-striped table-bordered">
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
                                <th>Progres</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataUsulanCp as $key => $item)
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
                                    <td>
                                        @php
                                            $persen = hitungPersentase(getJumlahTransaksiTerkumpul($item->id), getTargetSasaran($item->id)->jumlah_penerima_manfaat);
                                        @endphp


                                        @if ($persen != '0')
                                            <div class="progress bg-secondary" role="progressbar" style="height: 25px; "
                                                aria-label="" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-info"
                                                    style="height: 25px; width: {{ $persen }}%;">
                                                    {{ $persen }}%
                                                </div>
                                            </div>
                                        @else
                                            0%
                                        @endif


                                    </td>

                                    <td>

                                        @if (getTaransaksi($item->id) == null || (getTaransaksi($item->id)->status ?? '') == 'ditolak')
                                            @if (getTransaksiTersedia($item->id) < 1)
                                                <span class=" badge m-1 bg-success text-light">Full</span>
                                            @else
                                                <button type="submit" class="btn badge m-1 btn-primary text-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalBantu{{ $item->id }}">Bantu</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modalBantu{{ $item->id }}" tabindex="-1"
                                                    aria-labelledby="modalBantuLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form
                                                                action="/member/data-usulan/pemerintah/bantu/{{ $item->id }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-header border-0">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body border-0">
                                                                    <div class="mb-3">
                                                                        <strong>
                                                                            <span style="text-transform: capitalize">
                                                                                {{ $item->kategori_manfaat }} Tersedia :
                                                                                {{ getTransaksiTersedia($item->id) }}
                                                                            </span>
                                                                        </strong>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="">Target Sasaran</label>

                                                                        <div class="input-group">
                                                                            <span class="input-group-text"
                                                                                style="text-transform: capitalize">
                                                                                {{ $item->kategori_manfaat }}
                                                                            </span>
                                                                            <input type="number" name="target_sasaran"
                                                                                class="form-control">
                                                                        </div>
                                                                        @error('target_sasaran')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="submit"
                                                                        class="btn btn-success">Bantu</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <span style="text-transform: capitalize"
                                                class="badge m-1 rounded-pill status-{{ getTaransaksi($item->id)->status ?? ' ' }}">
                                                {{ getTaransaksi($item->id)->status ?? ' ' }}
                                            </span>
                                        @endif




                                        <a class="btn btn-secondary badge m-1 "
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
