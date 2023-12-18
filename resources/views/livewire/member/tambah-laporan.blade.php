<div>
    <div class="card mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Sasaran Peminatan</th>
                    <th>Sasaran Yang Tersedia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="text-capitalize">{{ $kategori_manfaat }}</span> : {!! $transaksi[0]->target_sasaran ?? '0' !!} /
                        {{ $total_sasaran }}</td>
                    <td><span class="text-capitalize">{{ $kategori_manfaat }}</span> : {{ $jumlahPenerimaManfaat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="">Nama Kegiatan</label>

                <input type="text" disabled wire:model="nama_kegiatan"
                    class="form-control  @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan"
                    id="">
                @error('nama_kegiatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload "></span>
                    Dokumen Laporan (PDF)<span class="text-danger">*</span> <span class="text-danger">Max 2mb</span> </label>
                <input type="file" wire:model="dokumen" class="form-control @error('dokumen') is-invalid @enderror"
                    name="dokumen" id="iniImage">
                @error('dokumen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <span>Template Download <a href="{{ asset('templatelaporan.doc') }}">disini</a></span>
            </div>

            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload "></span>
                    Foto Kegiatan (Image)<span class="text-danger">*</span> <span class="text-danger">Max 2mb</span> </label>
                <input type="file" wire:model="foto" class="form-control @error('foto') is-invalid @enderror"
                    name="foto" id="iniImage">
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>




        </div>
        <div class="col-md-7">
            <div class="mb-3">

                <label for="">Keterangan<span class="text-danger">*</span> </label>
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
