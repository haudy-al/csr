<div>
    

    <style>
        .btn-login {
            background-color: rgb(82, 52, 250) !important;
            width: 100%;
            color: #ffff;
        }
    </style>




    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black" style="max-height: 100vh; overflow: auto">

                    <div class="px-5 ms-xl-4">
                        <i class="fas fa-crowa fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0">
                            <h1 class="logo me-auto"><img width="200px" src="{{ asset('img') }}/logo.png"
                                    alt="" class="img-fluid">
                            </h1>

                        </span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" wire:submit="ProsesLogin">


                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                            {{-- {{ $waktu_login }} --}}

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
                                            document.getElementById('countdown').innerHTML = hours + ' jam ' + minutes + ' menit ' + seconds + ' detik';
                                        }
                                    }

                                    var countdownInterval = setInterval(updateCountdown, 1000);
                                    
                                </script>
                            @endif



                            @if ($errors->any())
                                @foreach ($errors->all() as $err)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $err }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif

                            <div class="form-outline mb-4">

                                <input type="text" id="loginName" wire:model.live="username"
                                    class="form-control form-control-lg" />

                                <label class="form-label" for="form2Example18">Username</label>
                            </div>

                            <div class="form-outline mb-3">

                                <input type="password" wire:model.live="password" id="password"
                                    class="form-control form-control-lg" />

                                <label class="form-label" for="form2Example28">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="checkbox" id="showPassword" /> <label for="showPassword">Tampilkan
                                    Password</label>
                            </div>

                            <div class="mb-3" wire:ignore>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display(['data-callback' => 'onCallback', 'data-theme' => 'light']) !!}
                                <button type="button" class="btn badge btn-outline-secondary text-dark"
                                    id="refresh-captcha"><i class="fa-solid fa-arrows-rotate"></i></button>
                            </div>

                            <div class="pt-1 mb-3">
                                <button type="submit" class="btn btn-login rounded-0 btn-lg btn-block"
                                    type="button">Login</button>
                            </div>

                            <div class=" mb-4">
                                <a class="btn w-100" href="/">Kembali</a>
                            </div>


                        </form>

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
        
        var onCallback = function() {
            @this.set('recaptcha', grecaptcha.getResponse());
        }

        window.addEventListener('LoginGagal', () => {

            toastr.error(`Username Atau Password Salah`, 'error');
            refreshCaptcha();

        })

        window.addEventListener('LoginTunggu', () => {

            toastr.error(`Silahkan Login Kembali Setelah Beberapa Menit`, 'error');
            refreshCaptcha();

            setTimeout(function() {
                window.location.href = "/admin/login";
            }, 1000);
          

        })

        window.addEventListener('LoginBerhasil', () => {
            toastr.success(`Login Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/admin";
            }, 2000);

        })

        function refreshCaptcha() {
            grecaptcha.reset(); // Memuat ulang reCAPTCHA
        }

        // Panggil fungsi refreshCaptcha saat tombol ditekan
        document.getElementById('refresh-captcha').addEventListener('click', function() {
            refreshCaptcha();
        });
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

    <script>
        function ClearJmlLogin(ip) {
            var formData = new FormData();
            formData.append('_methode', 'POST');
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('ip', ip);
            $.ajax({
                type: "POST",
                url: "/admin/login/reset",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    document.location = '/admin/login';
                },
                error: function(xhr) {
                    console.log('gagal');
                }
            });
        }

        // ClearJmlLogin('1212')
    </script>

    <script>
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
