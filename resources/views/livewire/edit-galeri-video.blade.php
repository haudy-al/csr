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
                <label class="btn border-1" for="iniImage"><span
                        class="mdi mdi-upload @error('gambar') is-invalid @enderror"></span> Upload Thumbnail</label>
                @error('gambar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model="gambar" class="form-control d-none" name="gambar" id="iniImage">
            </div>
            @if ($gambar)
                <div class="mb-3">
                    <img src="{{ $gambar->temporaryUrl() }}" width="200px">
                    <button class="btn btn-sm" wire:click="clearGambar">Batal</button>
                </div>
            @else
                <div class="mb-3">
                    <img src="{{ asset('storage/img/' . $gambarLama) }}" width="200px">
                </div>
            @endif

        </div>
        <div class="col-md-7">

            <div class="mb-3">
                <label for="">Embed</label>

                <input type="text" wire:model="embed" class="form-control  @error('embed') is-invalid @enderror"
                    name="embed" id="">
                @error('embed')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Cara Mendapatkan Embed</label>
                <img src="{{ asset('img/embed.jpg') }}" class="w-100" alt="">
            </div>

            <div class="mb-3">
                <div wire:ignore>
                    <textarea wire:model="deskripsi" class="" name="deskripsi" id="deskripsi">{{ $deskripsi }}</textarea>
                </div>

                @error('deskripsi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-3">
                <button wire:click="SimpanGaleri" class="btn btn-warning btn-sm"><span
                        class="mdi mdi-content-save"></span> Simpan</button>
            </div>

        </div>
    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Ubah Galeri Video Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/admin/galeri/video";
            }, 1500);

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

    <script>
        document.getElementById('iniImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const maxSize = 2 * 1024 * 1024;

            if (file && file.size > maxSize) {
                event.target.value = null;
                alert('Gambar tidak boleh lebih dari 2MB.');
            }
        });
    </script>

</div>
