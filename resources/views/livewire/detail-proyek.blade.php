<div>
    <div class="row mt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <p>Penerima Manfaat : {{ $data->penerima_manfaat }}</p>
                    <p>Jumlah Penerima Manfaat : {{ $penerimaManfaat }} / {{ $data->jumlah_penerima_manfaat }}</p>

                    <p>
                        Bentuk Kegiatan :
                        <br>
                        {!! $data->bentuk_kegiatan !!}

                    </p>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5>Yang berpartisipasi dalam proyek ini</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Target Sasaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMemberPartisipasi as $item)
                                <tr>
                                    <td>{{ $item->member2->username }}</td>
                                    <td><span class="text-capitalize">{{ $kategori_manfaat }}</span> : {{ $item->target_sasaran }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($dataMemberPartisipasi) < 1)
                    <div style="width: 100%; display: flex; justify-content: center">

                        <img src="{{ asset('img/datakosong.png') }}" width="400px" alt="">
                    </div>
                        
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body" style="max-height: 400px; overflow: auto">
                    <h4 class="mb-3">Proposal kegiatan</h4>

                    {{-- <img src="{{ route('pdf.image', ['id' => $data->id]) }}" alt="None"> --}}
                    <div>

                        @foreach ($imageUrl as $imagePath)
                            <img src="{{ asset('storage/pdf-image/' . $imagePath) }}" alt="Page Image">
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
