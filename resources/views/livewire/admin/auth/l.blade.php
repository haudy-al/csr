<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <style>
        .btn-login {
            background-color: rgb(233, 38, 38) !important;
            width: 100%;
            color: #ffff;
        }
    </style>

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black" style="max-height: 100vh; overflow: auto">

                    <div class="px-5 ms-xl-4">
                        <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0">
                            <h1 class="logo me-auto"><img width="50px"
                                    src="{{ asset('Medilab') }}/assets/img/logokotabogor.gif" alt=""
                                    class="img-fluid"><a class="text-decoration-none text-dark"
                                    href="http://scu.web.id/"> e-SIR Bogor Sehat</a>
                            </h1>

                        </span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" action="{{ route('login.action') }}" method="POST">
                            @csrf


                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                            @if (session('loginLockoutStatus'))
                                <div class="alert alert-danger">
                                    Anda telah mencoba login sebanyak 5 kali. Silakan coba lagi dalam
                                    {{ session('loginLockoutStatus') }} menit.
                                </div>
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
                                <input type="text" name="username" id="form2Example18"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example18">Username</label>
                            </div>

                            <div class="form-outline mb-3">
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example28">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="checkbox" id="showPassword" /> <label for="showPassword">Tampilkan
                                    Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
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
                    <img src="{{ asset('img/gambar-dinkes.jpg') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
