<div>
    <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="">Nama Kegiatan</label>

                <input type="text" disabled wire:model.live="nama_kegiatan"
                    class="form-control  @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="">
                @error('nama_kegiatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Anggaran</label>

                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" wire:model.live="anggaran"
                    class="form-control  @error('anggaran') is-invalid @enderror" name="anggaran" id="">
                </div>
                @error('anggaran')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('dokumen') is-invalid @enderror"></span>
                    Dokumen Laporan (PDF)</label>
                @error('dokumen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model.live="dokumen" class="form-control " name="dokumen" id="iniImage">
            </div>

            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('foto') is-invalid @enderror"></span>
                    Foto Kegiatan (Image)</label>
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model.live="foto" class="form-control " name="foto" id="iniImage">
            </div>

                   


        </div>
        <div class="col-md-7">
            <div class="mb-3">

                <label for="">Keterangan</label>
                <div wire:ignore>
                    <textarea wire:model.live="keterangan" class="" name="keterangan" id="keterangan"></textarea>
                </div>

                @error('keterangan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>         

            
        </div>
        
        <div class="mb-3">
            <button wire:click="TambahLaporan" class="btn btn-secondary btn-sm">Tambah</button>
        </div>

    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Tambah Laporan Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/member/laporan";
            }, 2000);

        })
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#keterangan'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('keterangan', editor.getData());
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
                alert('PDF tidak boleh lebih dari 2MB.');
                event.target.value = null; // Menghapus file yang dipilih
            }
        });
    </script>

</div>
