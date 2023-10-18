<div>
    <div>
        <div class="row">
            <div class="col-md-5">
               
                <div class="mb-3">
                    <label for="">Nama</label>

                    <input type="text" wire:model.live="nama" class="form-control  @error('nama') is-invalid @enderror"
                        name="nama" id="">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button wire:click="TambahBidang" class="btn btn-secondary btn-sm">Tambah</button>
                </div>

            </div>

        </div>

        <script>
            window.addEventListener('TambahBerhasil', () => {
                toastr.success(`Tambah Bidang Berhasil`, 'success');

                setTimeout(function() {
                    window.location.href = "/admin/master/bidang";
                }, 1500);

            })
        </script>



    </div>

</div>
