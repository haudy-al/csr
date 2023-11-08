@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">



            <div class="card-body">

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminat</th>
                                <th>Nama Kegiatan</th>
                                <th>Bidang</th>
                                <th>Penerima Manfaat</th>
                                <th>Bentuk Kegiatan</th>
                                <th>Lokasi</th>
                                <th>Kelurahan</th>
                                <th>Proposal</th>
                                <th>Target Sasaran</th>
                                <th>Status</th>
                                <th>Progres</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTransaksi as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->member2->nama_perusahaan }}</td>
                                    <td>{{ $item->usulanKegiatan->nama_kegiatan }}</td>
                                    <td>{{ $item->usulanKegiatan->bidang->nama }}</td>
                                    <td>{{ $item->usulanKegiatan->penerima_manfaat }}</td>
                                    <td>{!! $item->usulanKegiatan->bentuk_kegiatan !!}</td>
                                    <td>{{ $item->usulanKegiatan->lokasi_kegiatan }}</td>
                                    <td>{{ $item->usulanKegiatan->kelurahan->nama ?? '-' }}</td>
                                    <td>
                                        <form action="/admin/data-usulan/pdf/{{ $item->usulanKegiatan->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn"><span class="mdi mdi-eye"></span></button>
                                        </form>
                                    </td>
                                    <td><span
                                            style="text-transform: capitalize">{{ $item->usulanKegiatan->kategori_manfaat }}</span>
                                        : {{ getTaransaksiAdmin($item->id)->target_sasaran }}</td>
                                    <td><span
                                            class="status-{{ getTaransaksiAdmin($item->id)->status }}">{{ getTaransaksiAdmin($item->id)->status }}</span>
                                    </td>
                                    <td>
                                        @php
                                            $persen = hitungPersentase(getJumlahTransaksiTerkumpul($item->usulanKegiatan->id), getTargetSasaran($item->usulanKegiatan->id)->jumlah_penerima_manfaat);
                                        @endphp


                                        <div class="progress bg-secondary" role="progressbar" style="height: 25px; "
                                            aria-label="" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-info"
                                                style="height: 25px; width: {{ $persen }}%;">{{ $persen }}%
                                            </div>
                                        </div>


                                    </td>
                                    <td>
                                        <form action="/admin/data-usulan-peminatan/status/{{ $item->id }}" method="POST">
                                            @csrf
                                            <select name="status" onchange="$(event.target).parents('form').submit()"
                                                class="form-control-custom">

                                                <option {!! getTaransaksiAdmin($item->id)->status == 'proses' ? 'selected' : '' !!} value="proses">Proses</option>
                                                <option {!! getTaransaksiAdmin($item->id)->status == 'diterima' ? 'selected' : '' !!} value="diterima">Diterima</option>
                                                <option {!! getTaransaksiAdmin($item->id)->status == 'ditolak' ? 'selected' : '' !!} value="ditolak">Ditolak</option>

                                            </select>
                                        </form>
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
