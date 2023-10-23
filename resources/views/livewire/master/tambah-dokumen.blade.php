<div>
    <div>
        <div class="row">
            <div class="col-md-5">

                <div class="mb-3">
                    <label for="">Judul</label>

                    <input type="text" wire:model="judul" class="form-control  @error('judul') is-invalid @enderror"
                        name="judul" id="">
                    @error('judul')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">File PDF</label>

                    <input type="file" wire:model="dokumen"
                        class="form-control  @error('dokumen') is-invalid @enderror" name="dokumen" id="">

                    @error('dokumen')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mt-3">
                    <button wire:click="TambahDokumen" class="btn btn-secondary btn-sm">Tambah</button>
                </div>

            </div>
           

        </div>

        <script>
            window.addEventListener('TambahBerhasil', () => {
                toastr.success(`Tambah Dokumen Berhasil`, 'success');

                setTimeout(function() {
                    window.location.href = "/admin/master/dokumen";
                }, 1500);

            })
        </script>

    </div>

</div>
