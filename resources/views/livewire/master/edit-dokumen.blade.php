<div>
    <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="">Judul</label>

                <input type="text" wire:model="judul"
                    class="form-control  @error('judul') is-invalid @enderror" name="judul" id="">
                @error('judul')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

           
            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('dokumen') is-invalid @enderror"></span>
                    Upload Dokumen <small style="color: red">Upload Dokumen Untuk Merubah Dokumen Lama</small></label>
                @error('dokumen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model="dokumen" class="form-control " name="dokumen" id="iniImage">
            </div>

       

        </div>
      
        
        <div class="mb-3">
            <button wire:click="SimpanDokumen" class="btn btn-warning btn-sm"><span class="mdi mdi-content-save"></span> Simpan</button>
        </div>

    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Edit Dokuman Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/admin/master/dokumen";
            }, 2000);

        })
    </script>

    

</div>
