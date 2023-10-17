<div>
    <div>
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="">id kelurahan</label>

                    <input type="text" wire:model="id_kelurahan"
                        class="form-control  @error('id_kelurahan') is-invalid @enderror" name="id_kelurahan"
                        id="">
                    @error('id_kelurahan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Nama Kelurahan</label>

                    <input type="text" wire:model="nama" class="form-control  @error('nama') is-invalid @enderror"
                        name="nama" id="">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Kecamatan</label>
                    <select class="form-control @error('id_kecamatan') is-invalid @enderror" wire:model="id_kecamatan" id="">
                        <option value="">Pilih</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
    
                </div>
                <div class="mt-3">
                    <button wire:click="TambahKelurahan" class="btn btn-secondary btn-sm">Tambah</button>
                </div>

            </div>

        </div>

        <script>
            window.addEventListener('TambahBerhasil', () => {
                toastr.success(`Tambah Kelurahan Berhasil`, 'success');

                setTimeout(function() {
                    window.location.href = "/admin/master/kelurahan";
                }, 1500);

            })
        </script>



    </div>

</div>
