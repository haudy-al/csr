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

                    @if ($waktu_login)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div wire:ignore id="countdown"></div>
                        </div>
                        <br>

                        <script>
                            var targetTime = new Date("{{ $waktu_login }}").getTime();

                            function updateCountdown() {
                                var currentTime = new Date().getTime();
                                var timeRemaining = targetTime - currentTime;

                                if (timeRemaining <= 0) {
                                    document.getElementById('countdown').innerHTML = 'Silahkan Login Lagi';
                                    clearInterval(countdownInterval);

                                    ClearJmlLogin("{{ $ipAddress }}")

                                } else {
                                    var hours = Math.floor(timeRemaining / (1000 * 60 * 60));
                                    var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                                    document.getElementById('countdown').innerHTML = minutes + ' menit ' + seconds + ' detik';
                                }
                            }

                            var countdownInterval = setInterval(updateCountdown, 1000);
                        </script>
                    @endif

                    <div class="form-outline mb-4" style="text-align: left">

                        <label class="" style="color: black" for="form2Example18">Username :</label>
                        <input type="text" id="loginName" wire:model="username"
                            class="form-control form-control-lg @error('username') is-invalid @enderror" />
                        @error('username')
                            <small style="color: red">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="form-outline mb-3" style="text-align: left">

                        <label class="" style="color: black" for="form2Example28">Password :</label>
                        <input type="password" wire:model="password" id="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" />
                        @error('password')
                            <small style="color: red">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <i class="fas fa-eye" id="showPasswordIcon"></i> Lihat Password
                    </div>


                    <div class="input-group mb-3 ">
                        <img class="" src="{{ captcha_src('math') }}" alt="CAPTCHA">
                        <input class="w-25 form-control h-50" type="text" id="captcha" wire:model='captcha'
                            name="captcha">

                        @error('captcha')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>





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


    <script nonce="{{ csp_nonce() }}">
        window.addEventListener('LoginGagal', () => {

            toastr.error(`Username Atau Password Salah`, 'error');
            // refreshCaptcha();

        })

        window.addEventListener('LoginTunggu', () => {

            toastr.error(`Silahkan Login Kembali Setelah Beberapa Menit`, 'error');
            // refreshCaptcha();

            setTimeout(function() {
                window.location.href = "/login";
            }, 1000);


        })

        window.addEventListener('LoginBerhasil', () => {
            toastr.success(`Login Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/member";
            }, 2000);

        })

        window.addEventListener('LoginDeviceLain', () => {
            toastr.warning(`Akun Telah Login di Perangkat Lain`, 'Warning');
        })


        function refreshCaptcha() {
            grecaptcha.reset(); // Memuat ulang reCAPTCHA
        }

        // Panggil fungsi refreshCaptcha saat tombol ditekan
        document.getElementById('refresh-captcha').addEventListener('click', function() {
            // refreshCaptcha();
        });
    </script>

    <script nonce="{{ csp_nonce() }}">
        const passwordInput = document.getElementById("password");
        const showPasswordIcon = document.getElementById("showPasswordIcon");

        showPasswordIcon.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.classList.remove("fa-eye");
                showPasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                showPasswordIcon.classList.remove("fa-eye-slash");
                showPasswordIcon.classList.add("fa-eye");
            }
        });
    </script>



    <script nonce="{{ csp_nonce() }}">
        function ClearJmlLogin(ip) {
            var formData = new FormData();
            formData.append('_methode', 'POST');
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('ip', ip);
            $.ajax({
                type: "POST",
                url: "/member/login/reset",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    document.location = '/login';
                },
                error: function(xhr) {

                    console.log(xhr);

                }
            });
        }

        // ClearJmlLogin('1212')
    </script>

    <script nonce="{{ csp_nonce() }}">
        // Ambil elemen countdown-timer dan pesan dari respons JSON
        const countdownTimer = document.getElementById('countdown-timer');

        function startCountdown(retryAfter) {
            let seconds = retryAfter;

            countdownTimer.style.display = 'block';

            const countdownInterval = setInterval(() => {
                countdownTimer.innerHTML = `Retry in ${seconds} seconds`;
                seconds--;

                if (seconds < 0) {
                    countdownTimer.style.display = 'none';
                    clearInterval(countdownInterval);
                }
            }, 1000);
        }

        // Fungsi untuk menangani respons JSON
        function handleResponse(response) {
            if (response.status === 429 && response.data.retryAfter) {
                const retryAfter = response.data.retryAfter;
                startCountdown(retryAfter);
            }
        }
    </script>
</div>
