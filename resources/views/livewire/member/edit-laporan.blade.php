<div>
    
    <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="">Nama Kegiatan</label>

                <input type="text" disabled wire:model="nama_kegiatan"
                    class="form-control  @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="">
                @error('nama_kegiatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>        


            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('dokumen') is-invalid @enderror"></span>
                    Dokumen Laporan (PDF) <small style="color: red">Masukan Dokumen Baru Jika Ingin Merubah</small></label>
                @error('dokumen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model="dokumen" class="form-control " name="dokumen" id="iniImage">
            </div>

            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('foto') is-invalid @enderror"></span>
                    Foto Kegiatan (Image) <small style="color: red">Masukan Foto Baru Jika Ingin Merubah</small></label>
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model="foto" class="form-control " name="foto" id="iniImage">
            </div>

                   


        </div>
        <div class="col-md-7">
            <div class="mb-3">

                <label for="">Keterangan</label>
                <div wire:ignore>
                    <textarea wire:model="keterangan" class="" name="keterangan" id="keterangan">{{ $keterangan }}</textarea>
                </div>

                @error('keterangan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>         

            
        </div>
        
        <div class="mb-3">
            <button wire:click="SimpanLaporan" class="btn btn-warning btn-sm">Simpan</button>
        </div>

    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Edit Laporan Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/member/laporan";
            }, 2000);

        })
        window.addEventListener('jumlahLebihBesar', (message) => {
            toastr.error(message.detail[0], 'Warning !');
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
            const maxSize = 2 * 1024 * 1024; d

            if (file && file.size > maxSize) {
                alert('PDF tidak boleh lebih dari 2MB.');
                event.target.value = null; 
            }
        });
    </script>

</div>
