<div>
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

                <div class="mb-3">
                    <label class="btn border-1" for="iniImage"><span
                            class="mdi mdi-upload @error('gambar') is-invalid @enderror"></span> Upload
                        Thumbnail</label>
                    @error('gambar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="file" wire:model.live="gambar" class="form-control d-none" name="gambar" id="iniImage">
                </div>
                @if ($gambar)
                    <div class="mb-3">
                        <img src="{{ $gambar->temporaryUrl() }}" width="200px">
                    </div>
                @endif

            </div>
            <div class="col-md-7">

                <div class="mb-3">
                    <label for="">Embed</label>

                    <input type="text" wire:model.live="embed" class="form-control  @error('embed') is-invalid @enderror"
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
                        <textarea wire:model.live="deskripsi" class="" name="deskripsi" id="deskripsi"></textarea>
                    </div>

                    @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-3">
                    <button wire:click="TambahVideo" class="btn btn-secondary btn-sm">Tambah</button>
                </div>

            </div>
        </div>

        <script>
            window.addEventListener('TambahBerhasil', () => {
                toastr.success(`Tambah Video Berhasil`, 'success');

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
                const maxSize = 2 * 1024 * 1024; // 2MB

                if (file && file.size > maxSize) {
                    alert('Gambar tidak boleh lebih dari 2MB.');
                    event.target.value = null; // Menghapus file yang dipilih
                }
            });
        </script>

    </div>

</div>
