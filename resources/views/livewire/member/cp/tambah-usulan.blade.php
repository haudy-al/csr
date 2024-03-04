<div>
    <div>
        @if ($noStap == 1)
            <div class="row">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="">Nama Kegiatan<span class="text-danger">*</span> </label>

                        <input type="text" wire:model="nama_kegiatan"
                            class="form-control  @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan"
                            id="">
                        @error('nama_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Bidang<span class="text-danger">*</span> </label>

                        <select name="" wire:model="bidang"
                            class="form-control @error('bidang') is-invalid @enderror" id="">
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
                        <label for="iniImage"><span
                                class="mdi mdi-upload @error('proposal') is-invalid @enderror"></span>
                            Upload Proposal PDF<span class="text-danger">*</span> <span class="text-danger">Max
                                2mb</span></label>
                        @error('proposal')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="file" wire:model="proposal" class="form-control " name="proposal"
                            id="iniImage">
                    </div>

                    <div class="mb-3">
                        <label for="">Penerima Manfaat<span class="text-danger">*</span> </label>

                        <input type="text" wire:model="penerima_manfaat"
                            class="form-control  @error('penerima_manfaat') is-invalid @enderror"
                            name="penerima_manfaat" id="">
                        @error('penerima_manfaat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Bentuk Bantuan <span class="text-danger">*</span> </label>

                        <select class="form-control" wire:model.live="jesnis_kategori_manfaat"
                            name="jesnis_kategori_manfaat" id="">
                            <option value="barang">Barang</option>
                            <option value="uang">Uang</option>
                        </select>

                        @error('kategori_manfaat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Nilai <span class="text-danger">*</span> </label>

                        <div class="input-group">
                            @if ($jesnis_kategori_manfaat == 'uang')
                                <span class="input-group-text">Rp.</span>
                            @endif
                            <input type="currency" wire:model="jumlah_penerima_manfaat"
                                class="form-control  @error('jumlah_penerima_manfaat') is-invalid @enderror"
                                name="jumlah_penerima_manfaat" id="currency-field" data-type="currency">

                            @if ($jesnis_kategori_manfaat)
                                @if ($jesnis_kategori_manfaat != 'uang')
                                    <select class="form-control" wire:model.live="kategori_manfaat"
                                        name="kategori_manfaat" id="">
                                        <option disabled>Berat</option>
                                        <option value="kg">Kilogram (kg)</option>
                                        <option value="g">Gram (g)</option>
                                        <option value="t">Ton (t)</option>
                                        <option disabled>Jumlah</option>
                                        <option value="buah">Buah</option>
                                        <option value="paket">Paket</option>
                                    </select>
                                @endif
                            @endif


                            @error('jumlah_penerima_manfaat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">

                        <label for="">Waktu Pelaksanaan<span class="text-danger">*</span> </label>

                        <input type="date" wire:model="waktu_pelaksanaan"
                            class="form-control  @error('waktu_pelaksanaan') is-invalid @enderror"
                            name="waktu_pelaksanaan" id="">
                        @error('waktu_pelaksanaan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>



                </div>
                <div class="col-md-7">
                    <div class="mb-3">

                        <label for="">Deskripsi<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <textarea wire:model="bentuk_kegiatan" class="w-100" name="bentuk_kegiatan" id="bentuk_kegiatan"></textarea>
                        </div>

                        @error('bentuk_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="">Lokasi Kegiatan<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <textarea wire:model="lokasi_kegiatan" class="form-control" name="lokasi_kegiatan"></textarea>
                        </div>

                        @error('lokasi_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Kecamatan<span class="text-danger">*</span> </label>

                        <select name="" wire:model.live="kecamatan"
                            class="form-control @error('kecamatan') is-invalid @enderror" id="">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($dataKecamatan as $item)
                                <option value="{{ $item->id_kecamatan }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        @error('kecamatan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Kelurahan<span class="text-danger">*</span> </label>

                        <select name="" wire:model="kelurahan"
                            class="form-control @error('kelurahan') is-invalid @enderror" id="">
                            <option value="">Pilih kelurahan</option>
                            @foreach ($datakelurahan as $item)
                                <option value="{{ $item->id_kelurahan }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        @error('kelurahan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- <div class="mb-3">
                    <button wire:click="TambahUsulanKegiatan" class="btn btn-secondary btn-sm">Tambah</button>
                </div> --}}

                <div class="mb-3">
                    <button wire:click="StepSelanjutnya" class="btn btn-secondary btn-sm">Selanjutnya</button>
                </div>

            </div>
        @elseif($noStap == 2)
            <div class="alert alert-info mb-3">
                <h4>Input Data Laporan</h4>
            </div>
            <div class="row">
                <div class="col-md-5">


                    <div class="mb-3">
                        <label for="iniImage"><span class="mdi mdi-upload "></span>
                            Dokumen Laporan (PDF)<span class="text-danger">*</span> <span class="text-danger">Max
                                2mb</span> </label>
                        <input type="file" wire:model="dokumen"
                            class="form-control @error('dokumen') is-invalid @enderror" name="dokumen"
                            id="iniImage">
                        @error('dokumen')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <span>Template Download <a href="{{ asset('templatelaporan.doc') }}">disini</a></span>
                    </div>

                    <div class="mb-3">
                        <label for="iniImage"><span class="mdi mdi-upload "></span>
                            Foto Kegiatan (Image)<span class="text-danger">*</span> <span class="text-danger">Max
                                2mb</span> </label>
                        <input type="file" wire:model="foto"
                            class="form-control @error('foto') is-invalid @enderror" name="foto" id="iniImage">
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>




                </div>
                <div class="col-md-7">
                    <div class="mb-3">

                        <label for="">Keterangan<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <textarea wire:model="keterangan" class="w-100" name="keterangan" id="keterangan"></textarea>
                        </div>

                        @error('keterangan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                </div>

                <div class="mb-3">
                    <button wire:click="StepSebelumnya" class="btn btn-secondary btn-sm">Sebelumnya</button>
                    <button wire:click="Tambah" class="btn btn-success btn-sm text-light">Tambah</button>

                </div>

                 


            </div>
        @endif

        <script>
            window.addEventListener('TambahBerhasil', () => {
                toastr.success(`Tambah Usulan Berhasil`, 'success');

                setTimeout(function() {
                    window.location.href = "/member/data-usulan";
                }, 2000);

            })

            // Jquery Dependency

            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });


            function formatNumber(n) {
                return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }


            function formatCurrency(input, blur) {
                var input_val = input.val();
                if (input_val === "") {
                    return;
                }
                var original_len = input_val.length;
                var caret_pos = input.prop("selectionStart");
                if (input_val.indexOf(".") >= 0) {
                    var decimal_pos = input_val.indexOf(".");
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos);

                    left_side = formatNumber(left_side);

                    right_side = formatNumber(right_side);

                    if (blur === "blur") {
                        right_side += "00";
                    }

                    right_side = right_side.substring(0, 2);

                    // input_val = "$" + left_side + "." + right_side;
                    input_val = left_side + "." + right_side;

                } else {
                    input_val = formatNumber(input_val);
                    // input_val = "$" + input_val;
                    input_val = input_val;

                    // if (blur === "blur") {
                    //     input_val += ".00";
                    // }
                }
                input.val(input_val);

                var updated_len = input_val.length;
                caret_pos = updated_len - original_len + caret_pos;
                input[0].setSelectionRange(caret_pos, caret_pos);
            }
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

</div>
