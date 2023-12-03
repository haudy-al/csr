<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>TJSLP KOTA BOGOR</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">

    <link nonce="{{ csp_nonce() }}" rel="icon" href="https://fileshaudy.000webhostapp.com/files/logokotabogor.gif" type="image/x-icon">
    <!-- Stylesheets-->
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Poppins:400,500,600%7CTeko:300,400,500%7CMaven+Pro:500">
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="{{ asset('site') }}/css/bootstrap.css">
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="{{ asset('site') }}/css/fonts.css">
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="{{ asset('site') }}/css/style.css">
    <style nonce="{{ csp_nonce() }}">
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
   
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="{{ asset('dist/fontawesome/css/all.main.css') }}">


    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geosearch/3.8.0/geosearch.css"
        integrity="sha512-ai0NxYSxeh+RZ1GBMDY503sdYPVuMEx0sg3vKuFHN5DclEv0QMkHqJuYyogAHK/Eb4SWHlRWKmogCsm3ajgIUQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script nonce="{{ csp_nonce() }}" src="{{ asset('TemplateAdmin') }}/dist/js/jquery-3.7.1.min.js"></script>




    @yield('custom_cdn')
    <script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script nonce="{{ csp_nonce() }}" src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geosearch/3.8.0/bundle.min.js"
        integrity="sha512-x8n5sU+7HmKzbIlFYoPgy40I80YSLf95TLUK1OxYuhtBKZOkD+oh0Y4UtLy6UyFE3XBEb40/O/tyJA3HaVa5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" integrity="sha512-ifx27fvbS52NmHNCt7sffYPtKIvIzYo38dILIVHQ9am5XGDQ2QjSXGfUZ54Bs3AXdVi7HaItdhAtdhKz8fOFrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    @livewireStyles(['nonce' => csp_nonce() ])


</head>

<body>

    </div>
    {{-- <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container"><span></span><span></span><span></span><span></span>
            </div>
        </div>
    </div> --}}
    <div class="page">
        <div id="home">

            @yield('home')


        </div>

        @yield('content')


        <!-- Page Footer-->
        <footer class="section section-fluid footer-minimal context-dark">
            <div class="bg-gray-15">
                <div class="container-fluid">
                    {{-- <div class="footer-minimal-inset oh">
                        <ul class="footer-list-category-2">
                            <li><a href="http://bappeda.jabarprov.go.id/">Bappeda Jawa Barat</a></li>
                            <li><a href="http://bappeda.kotabogor.go.id/">Bappeda Kota Bogor</a></li>

                        </ul>
                    </div> --}}
                    <div class="footer-minimal-bottom-panel text-sm-left">
                        <div class="row row-10 align-items-md-center">
                            <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                                <div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 order-sm-first">
                                <!-- Rights-->
                                <p class="rights"><span>&copy;&nbsp;2023 Pemerintah Kota Bogor.
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-4 text-md-right"><span> All Rights Reserved. </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="modal fade" id="modalCta" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Contact Us</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="rd-form rd-form-variant-2 rd-mailform" data-form-output="form-output-global"
                            data-form-type="contact-modal" method="post" action="bat/rd-mailform.php">
                            <div class="row row-14 gutters-14">
                                <div class="col-12">
                                    <div class="form-wrap">
                                        <input class="form-input" id="contact-modal-name" type="text" name="name"
                                            data-constraints="">
                                        <label class="form-label" for="contact-modal-name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-wrap">
                                        <input class="form-input" id="contact-modal-email" type="email" name="email"
                                            data-constraints=" ">
                                        <label class="form-label" for="contact-modal-email">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-wrap">
                                        <input class="form-input" id="contact-modal-phone" type="text"
                                            name="phone" data-constraints="">
                                        <label class="form-label" for="contact-modal-phone">Phone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-wrap">
                                        <label class="form-label" for="contact-modal-message">Message</label>
                                        <textarea class="form-input textarea-lg" id="contact-modal-message" name="message" data-constraints=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="button button-primary button-pipaluk" type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts(['nonce' => csp_nonce() ])
   
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script nonce="{{ csp_nonce() }}" src="{{ asset('site') }}/js/core.min.js"></script>
    <script nonce="{{ csp_nonce() }}" src="{{ asset('site') }}/js/script.js"></script>
    <!-- coded by Himic-->
</body>

</html>
