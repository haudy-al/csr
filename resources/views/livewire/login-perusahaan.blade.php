<div>

    <div class="row">

        <div class="col-md-7 d-md-block d-none"
            style="background-image: url('{{ asset('img/kotabogor.webp') }}'); background-size: cover; width: 100%; height: 100vh;">

        </div>

        <div class="col-md-5">
            <div class="d-flex align-items-center h-custom-2 mt-md-5 px-5 ms-xl-4 pt-5 pt-xl-0 mt-xl-n5">

                <form style="width: 23rem;" wire:submit="ProsesLogin">

                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in 

                    
                    </h3>

                    {{-- {{ $waktu_login }} --}}

                    <div class="form-outline mb-4" style="text-align: left">

                        <label class="" style="color: black" for="form2Example18">Username :</label>
                        <input type="text" id="loginName" wire:model.live="username"
                            class="form-control form-control-lg @error('username') is-invalid @enderror" />
                            @error('username')
                            <small style="color: red">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="form-outline mb-3" style="text-align: left">

                        <label class="" style="color: black" for="form2Example28">Password :</label>
                        <input type="password" wire:model.live="password" id="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" />
                        @error('password')
                            <small style="color: red">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="form-outline mb-4">
                        <input type="checkbox" id="showPassword" /> <label for="showPassword">Tampilkan
                            Password</label>
                    </div>

                    {{-- <div class="mb-3" wire:ignore>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display(['data-callback' => 'onCallback', 'data-theme' => 'light']) !!}
                        <button type="button" class="btn badge btn-outline-secondary text-dark"
                            id="refresh-captcha"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </div> --}}

                    <div class="pt-1 mb-3">
                        <button type="submit" class="button button-primary button-pipaluk w-100"
                            type="button">Login</button>
                    </div>

                    <div class=" mb-4">
                        <a class="btn w-100" href="/lupa-password">Lupa Password ?</a>
                    </div>


                </form>

            </div>
        </div>
    </div>


    <script>
        window.addEventListener('LoginBerhasil', () => {
            toastr.success(`Login Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/member";
            }, 2000);

        })
    </script>

    <script>
        window.addEventListener('LoginGagal', () => {

            toastr.error(`Username Atau Password Salah`, 'error');


        })
    </script>

    <script>
        const passwordInput = document.getElementById("password");
        const showPasswordCheckbox = document.getElementById("showPassword");


        showPasswordCheckbox.addEventListener("change", function() {

            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text";
            } else {

                passwordInput.type = "password";
            }
        });
    </script>
</div>
