<div>
    <div class="row mt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <p>Penerima Manfaat : {{ $data->penerima_manfaat }}</p>

                    <p>Anggaran : Rp.{{ $data->anggaran }}</p>

                    <p>
                        Bentuk Kegiatan : 
                        <br>
                        {!! $data->bentuk_kegiatan  !!}

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h4 class="mb-3">Proposal kegiatan</h4>

            <embed src="/proyek-csr/kegiatan/proposal/{{ $data->id }}" type="application/pdf" width="100%" height="600px">

        </div>
    </div>
</div>
