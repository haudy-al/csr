<div>
    <div class="row mt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <p>Penerima Manfaat : {{ $data->penerima_manfaat }}</p>
                    <p>Jumlah Penerima Manfaat : {{ $data->jumlah_penerima_manfaat }}</p>

                    <p>Anggaran : Rp.{{ $data->anggaran }}</p>

                    <p>
                        Bentuk Kegiatan :
                        <br>
                        {!! $data->bentuk_kegiatan !!}

                    </p>
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
