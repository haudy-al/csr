<div>
    <div class="card mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Anggaran Yang dibutuhkan</th>
                    <th>Sasaran Yang Tersedia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rp. {{ $batasAnggaran }}</td>
                    <td>{{ $kategori_manfaat }} : {{ $jumlahPenerimaManfaat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
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
                <label for="">Anggaran</label>

                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" wire:model="anggaran"
                    class="form-control  @error('anggaran') is-invalid @enderror" name="anggaran" id="">
                </div>
                @error('anggaran')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Target Sasaran</label>

                <div class="input-group">
                    <input type="number" wire:model="target_sasaran"
                    class="form-control  @error('target_sasaran') is-invalid @enderror" name="target_sasaran" id="">
                </div>
                @error('target_sasaran')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('dokumen') is-invalid @enderror"></span>
                    Dokumen Laporan (PDF)</label>
                @error('dokumen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model="dokumen" class="form-control " name="dokumen" id="iniImage">
            </div>

            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('foto') is-invalid @enderror"></span>
                    Foto Kegiatan (Image)</label>
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
                    <textarea wire:model="keterangan" class="" name="keterangan" id="keterangan"></textarea>
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
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (file && file.size > maxSize) {
                alert('PDF tidak boleh lebih dari 2MB.');
                event.target.value = null; // Menghapus file yang dipilih
            }
        });
    </script>

</div>
