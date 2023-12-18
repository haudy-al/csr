<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Kegiatan</h4>
                        <hr>

                        <p class="card-text">
                            <strong>Nama Kegiatan:</strong> {{ $data->nama_kegiatan }}
                        </p>

                        <p class="card-text">
                            <strong>Kategori Manfaat:</strong> {{ $data->bidang->nama }}
                        </p>

                        <p class="card-text">
                            <strong>Penerima Manfaat:</strong> {{ $data->penerima_manfaat }}
                        </p>

                        <p class="card-text">
                            <strong>Bentuk Manfaat:</strong> ({{ convertSatuanTargetSasaran2($data->kategori_manfaat) }})
                        </p>

                        <p class="card-text">
                            <strong>Lokasi Kegiatan:</strong> {{ $data->lokasi_kegiatan }}
                        </p>

                        <p class="card-text">
                            <strong>Jumlah Penerima Manfaat:</strong> {{ $penerimaManfaat }} /
                            {{ $data->jumlah_penerima_manfaat }}
                        </p>

                        <div class="card mt-3"
                            style="background: rgb(133, 182, 255); border: 2px solid #0741ff; color: #ffffff">

                            <div class="card-body">
                                <p class="card-text ">
                                    <strong>Bentuk Kegiatan:</strong>
                                    <br>
                                    {!! $data->bentuk_kegiatan !!}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Partisipan Proyek</h4>
                    </div>
                    <div class="card-body">
                        @if (count($dataMemberPartisipasi) > 0)
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Target Sasaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataMemberPartisipasi as $item)
                                        <tr>
                                            <td>{{ $item->member2->nama_perusahaan }}</td>
                                            <td>
                                                {{ convertSatuanTargetSasaran($kategori_manfaat,$item->target_sasaran) }}
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <img src="{{ asset('img/datakosong.png') }}" class="img-fluid" alt="Data Kosong">
                                <p class="mt-3">Tidak ada data yang tersedia.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
