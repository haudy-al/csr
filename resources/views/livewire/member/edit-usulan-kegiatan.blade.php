<div>
    <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="">Nama Kegiatan</label>

                <input type="text" wire:model="nama_kegiatan"
                    class="form-control  @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="">
                @error('nama_kegiatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Bidang</label>

                <select name="" wire:model="bidang" class="form-control @error('bidang') is-invalid @enderror"
                    id="">
                    <option value="">Pilih Bidang Kegiatan</option>
                    @foreach ($dataBidang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>

                @error('bidang')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="iniImage"><span class="mdi mdi-upload @error('proposal') is-invalid @enderror"></span>
                    Upload Proposal PDF</label>
                @error('proposal')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" wire:model="proposal" class="form-control " name="proposal" id="iniImage">
            </div>

            <div class="mb-3">
                <label for="">Penerima Manfaat</label>

                <input type="text" wire:model="penerima_manfaat"
                    class="form-control  @error('penerima_manfaat') is-invalid @enderror" name="penerima_manfaat" id="">
                @error('penerima_manfaat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">

                <label for="">Waktu Pelaksanaan</label>

                <input type="date" wire:model="waktu_pelaksanaan"
                    class="form-control  @error('waktu_pelaksanaan') is-invalid @enderror" name="waktu_pelaksanaan" id="">
                @error('waktu_pelaksanaan')
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


        </div>
        <div class="col-md-7">
            <div class="mb-3">

                <label for="">Deskripsi</label>
                <div wire:ignore>
                    <textarea wire:model="bentuk_kegiatan" class="" name="bentuk_kegiatan" id="bentuk_kegiatan">{{ $bentuk_kegiatan }}</textarea>
                </div>

                @error('bentuk_kegiatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-3">
                <label for="">Lokasi Kegiatan</label>
                <div wire:ignore>
                    <textarea wire:model="lokasi_kegiatan" class="form-control" name="lokasi_kegiatan"></textarea>
                </div>

                @error('lokasi_kegiatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Kelurahan</label>

                <select name="" wire:model="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror"
                    id="">
                    <option value="">Pilih kelurahan</option>
                    @foreach ($datakelurahan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>

                @error('kelurahan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            
        </div>
        
        <div class="mb-3">
            <button wire:click="SimpanUsulan" class="btn btn-warning btn-sm"><span class="mdi mdi-content-save"></span> Simpan</button>
        </div>

    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Edit Usulan Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/member/data-usulan";
            }, 2000);

        })
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#bentuk_kegiatan'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('bentuk_kegiatan', editor.getData());
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
