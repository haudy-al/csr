<style nonce="{{ csp_nonce() }}">
    .btn-left {
        font-size: 14px !important
    }
</style>
<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
            data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
            data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
            data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
            data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
            data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle"
                            data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand ">
                            <a class="brand" href="/">
                                <img src="{{ asset('img') }}/logoPutih2.png" alt="" width="223"
                                    height="50" />
                                {{-- <h3>TJSLP KOTA BOGOR</h3> --}}
                            </a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">

                            <!-- RD Navbar Share-->
                            <div class="rd-navbar-share fl-bigmug-line-user144"
                                data-rd-navbar-toggle=".rd-navbar-share-list">
                                <ul class="list-inline rd-navbar-share-list">
                                    @if (getDataMember() != null)
                                        <li class="rd-navbar-share-list-item"><a id="brn-to-member" class="btn-left"
                                                href="#">Member Area</a></li>
                                    @else
                                        <li class="rd-navbar-share-list-item"><a class="btn-left" href="#"
                                                id="loginButton">Login</a></li>
                                        <li class="rd-navbar-share-list-item"><a class="btn-left" id="registerButton"
                                                href="#">Daftar</a></li>
                                    @endif



                                </ul>
                            </div>
                            <script nonce="{{ csp_nonce() }}">
                                document.getElementById('brn-to-member').addEventListener('click', function() {
                                    window.location.href = "/member";
                                });
                            </script>
                            <script nonce="{{ csp_nonce() }}">
                                document.getElementById('loginButton').addEventListener('click', function() {
                                    window.location.href = "/login";
                                });

                                document.getElementById('registerButton').addEventListener('click', function() {
                                    window.location.href = "/register";
                                });
                            </script>
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item active"><a class="rd-nav-link" href="#home">Beranda</a></li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="/proyek-csr">Proyek CSR</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="/agenda-kegiatan">Kegiatan CSR</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="#Publikasi">Publikasi</a>
                                </li>

                                <li class="rd-nav-item"><a class="rd-nav-link" href="#berita">Berita</a></li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="#galeri">Galeri</a>
                                </li>
                                {{-- <li class="rd-nav-item"><a class="rd-nav-link" href="#news">News</a></li> --}}
                                <li class="rd-nav-item"><a class="rd-nav-link" href="#contacts">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
