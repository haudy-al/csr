<div>
    <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="">Judul</label>
                    
                <input type="text" wire:model.live="judul" class="form-control  @error('judul') is-invalid @enderror"
                    name="judul" id="">
                @error('judul')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

           

        </div>
        <div class="col-md-7">

            <div wire:ignore>
                <textarea wire:model.live="deskripsi" class="" name="deskripsi" id="deskripsi"></textarea>
            </div>
            
            @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="mt-3">
                <button wire:click="TambahFaq" class="btn btn-secondary btn-sm">Tambah</button>
            </div>

        </div>
    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Tambah Faq Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/admin/faq";
            }, 2000);

        })
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('deskripsi', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>

   

</div>
