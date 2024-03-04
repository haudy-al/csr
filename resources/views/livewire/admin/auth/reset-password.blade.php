<div>


    <style nonce="{{ csp_nonce() }}">
        .btn-login {
            background-color: rgb(82, 52, 250) !important;
            width: 100%;
            color: #ffff;
        }

        .line {
            max-height: 100vh;
            overflow: auto
        }
    </style>




    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black line" style="">

                    <div class="px-5 ms-xl-4">
                        <i class="fas fa-crowa fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0">
                            <h1 class="logo me-auto"><img width="200px" src="{{ asset('img') }}/logo.png"
                                    alt="" class="img-fluid">
                            </h1>

                        </span>
                    </div>

                    <div class="">

                        <section>
                            <div class="container mt-5">
                                <div wire:loading>
                    
                                    <h3 class="text-center">Mohon Tunggu...</h3>
                    
                                </div>
                                <div class="row ">
                                    <div class="col-md-12">
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


                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('img/l1.jpg') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
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
