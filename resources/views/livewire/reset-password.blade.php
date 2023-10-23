<div>
    <section style="margin-bottom: 100px; text-align: left">
        <div class="container mt-5">
            <div wire:loading>

                <h3 class="text-center">Mohon Tunggu...</h3>

            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    @if ($status == true)
                        <div class="card">
                            <div class="card-header border-0" style="background-color: green; color: #fff">
                                <h5 style="color: #fff">Berhasil</h5>
                            </div>
                            <div class="card-body">
                                <p>Silahkan Cek Email Anda Password Berhasil Terkirim !</p>
                            </div>
                           
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header border-0" style="background-color: red; color: #fff">
                                <h5 style="color: #fff">Masukan Email Anda</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="">Email :</label>
                                    <input type="email" class="form-control-custom" wire:model="email">
                                    @error('email')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer border-0" style="background-color: #fff">
                                <button wire:click="KirimPassword" class="btn btn-sm btn-secondary">Kirim</button>
                            </div>
                           
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script>
        window.addEventListener('MemberTidakDitemukan', () => {
            toastr.error(`Member Tidak Ditemukan`, 'Warning');
        })

        window.addEventListener('Berhasil', () => {
            toastr.success(`Password Berhasil di Kirim.`, 'Success');
        })
    </script>
</div>
