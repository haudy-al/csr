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

            

        </div>
        <div class="col-md-7">
            <h4>Deskripsi</h4>

            <div wire:ignore>
                <textarea wire:model="deskripsi" class="" name="deskripsi" id="deskripsi">{{ $deskripsi }}</textarea>
            </div>

            @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="mt-3">
                <button wire:click="SimpanFaq" class="btn btn-warning btn-sm"><span class="mdi mdi-content-save"></span> Simpan</button>
            </div>

        </div>
    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Ubah Faq Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/admin/faq";
            }, 1000);

        })
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    console.log(editor.getData());
                    @this.set('deskripsi', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>

   
</div>
