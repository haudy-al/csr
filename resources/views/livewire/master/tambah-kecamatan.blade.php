<div>
    <div>
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="">id Kecamatan</label>

                    <input type="text" wire:model="id_kecamatan" class="form-control  @error('id_kecamatan') is-invalid @enderror"
                        name="id_kecamatan" id="">
                    @error('id_kecamatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Nama Kecamatan</label>

                    <input type="text" wire:model="nama" class="form-control  @error('nama') is-invalid @enderror"
                        name="nama" id="">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button wire:click="TambahKecamatan" class="btn btn-secondary btn-sm">Tambah</button>
                </div>

            </div>

        </div>

        <script>
            window.addEventListener('TambahBerhasil', () => {
                toastr.success(`Tambah Kecamatan Berhasil`, 'success');

                setTimeout(function() {
                    window.location.href = "/admin/master/kecamatan";
                }, 1500);

            })
        </script>



    </div>

</div>
