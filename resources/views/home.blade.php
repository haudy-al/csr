@extends('layouts.app')

@section('home')
    @include('layouts.header')

    @include('layouts.swiper_home')
@endsection

@section('content')
    <!-- See all services-->
    <section class="section section-sm section-first bg-default text-center" id="Publikasi">
        <div class="container">
            <div class="row row-30 justify-content-center">
                <div class="col-md-7 col-lg-5 col-xl-6 text-lg-left wow fadeInUp"><img src="{{ asset('img') }}/v2.png"
                        alt="" width="415" height="592" />
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="row row-30">
                        <div class="col-sm-6 wow fadeInRight">
                            <article class="box-icon-modern box-icon-modern-custom">
                                <div>
                                    <h3 class="box-icon-modern-big-title">DOKUMEN TJSLP</h3>
                                    <div class="box-icon-modern-decor"></div><a class="button button-primary button-ujarak"
                                        href="/dokumen">Dokumen</a>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 wow fadeInRight" data-wow-delay=".1s">
                            <article class="box-icon-modern box-icon-modern-2">
                                <div class="box-icon-modern-icon linearicons-phone-in-out"></div>
                                <h5 class="box-icon-modern-title"><a href="/berita">Berita CSR</a>
                                </h5>
                                <div class="box-icon-modern-decor"></div>
                                <p class="box-icon-modern-text">Dapatkan Berita Terbaru Mengenai CSR.</p>
                            </article>
                        </div>
                        <div class="col-sm-6 wow fadeInRight" data-wow-delay=".2s">
                            <article class="box-icon-modern box-icon-modern-2">
                                <div class="box-icon-modern-icon linearicons-headset"></div>
                                <h5 class="box-icon-modern-title"><a href="/statistik">Statistik</a>
                                </h5>
                                <div class="box-icon-modern-decor"></div>
                                <p class="box-icon-modern-text">Dapatkan Data Statistik Realisasi CSR Dengan Akurat.</p>
                            </article>
                        </div>
                        <div class="col-sm-6 wow fadeInRight" data-wow-delay=".3s">
                            <article class="box-icon-modern box-icon-modern-2">
                                <div class="box-icon-modern-icon linearicons-outbox"></div>
                                <h5 class="box-icon-modern-title"><a href="/mitra-csr">MITRA CSR</a></h5>
                                <div class="box-icon-modern-decor"></div>
                                <p class="box-icon-modern-text">Dapatkan Data Mitra CSR.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-fluid bg-default">
        <div class="parallax-container" data-parallax-img="{{ asset('img') }}/paralax.png">
            <div class="parallax-content section-xl context-dark bg-overlay-68 bg-mobile-overlay">
                <div class="container">
                    <div class="row row-30 justify-content-end text-right">
                        <div class="col-sm-7">
                            <h3 class="wow fadeInLeft">TJSLP KOTA BOGOR</h3>
                            <p>Segera Daftarkkan Perusahaan Anda !</p>
                            <div class="group-sm group-middle group justify-content-end"><a href="/register"
                                    class="button button-primary button-ujarak">Daftar Sekarang</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-sm bg-default">
        <div class="container">
            <div class="row row-30 row-xl-24 justify-content-center align-items-center align-items-lg-start text-left">
                <div class="col-lg-6 col-xl-12 align-self-center">
                    <div class="row row-30 justify-content-center">
                        <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft"><a class="clients-classic"
                                href="#"><img src="{{ asset('img/SiBadra.jpg') }}" alt="" width="270"
                                    height="117" /></a></div>
                        <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft" data-wow-delay=".1s"><a
                                class="clients-classic" href="https://kotabogor.go.id/"><img
                                    src="{{ asset('img/pemkot.jpg') }}" alt="" width="270" height="117" /></a>
                        </div>
                        <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft" data-wow-delay=".2s"><a
                                class="clients-classic" href="#"><img src="{{ asset('img/LPPD.jpg') }}" alt=""
                                    width="270" height="117" /></a></div>
                        <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft" data-wow-delay=".3s"><a
                                class="clients-classic" href="https://jabarprov.go.id/"><img
                                    src="{{ asset('img/jabar.jpg') }}" alt="" width="270" height="117" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-sm bg-default" id="berita">
        <div class="container">
            <h2>BERITA MITRA CSR</h2>
            <div class="row row-45">
                @foreach ($dataBerita as $item)
                    <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                        <!-- Post Modern-->
                        <article class="post post-modern"><a class="post-modern-figure"
                                href="/berita/detail/{{ $item->id }}"><img
                                    src="{{ asset('storage/img/' . $item->gambar) }}" alt="" width="370"
                                    height="307" />
                                <div class="post-modern-time">
                                    <time datetime="2019-07-22"><span
                                            class="post-modern-time-month">{{ $item->created_at->format('m') }}</span><span
                                            class="post-modern-time-number">{{ $item->created_at->format('d') }}</span></time>
                                </div>
                            </a>
                            <h4 class="post-modern-title"><a
                                    href="/berita/detail/{{ $item->id }}">{{ $item->judul }}</a></h4>
                            <p class="post-modern-text">{!! Str::substr($item->deskripsi, 0, 120) !!}...</p>
                        </article>
                    </div>
                @endforeach

            </div>

            <a href="/berita" class="button button-primary button-pipaluk">Selengkapnya</a>

        </div>
    </section>

   
    <section class="section section-sm section-fluid bg-default text-center" id="galeri">
        <div class="container-fluid">
            <h2 class="wow fadeInLeft">Galeri</h2>

            <div class="isotope-filters isotope-filters-horizontal">
                <button
                    class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha"
                    data-custom-toggle="#isotope-3" data-custom-toggle-hide-on-blur="true"
                    data-custom-toggle-disable-on-blur="true"><span class="icon fa fa-caret-down"></span>Filter</button>
                <ul class="isotope-filters-list" id="isotope-3">
                    <li>
                        <a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">Semua</a>
                    </li>
                    <li>
                        <a href="#" data-isotope-filter="Galeri_foto" data-isotope-group="gallery">Galeri Foto</a>
                    </li>
                    <li><a href="#" data-isotope-filter="Galeri_Video" data-isotope-group="gallery">Galeri
                            Video</a></li>

                </ul>
            </div>
            <div class="row row-30 isotope" data-isotope-layout="fitRows" data-isotope-group="gallery"
                data-lightgallery="group">

                @foreach ($dataGaleriFoto as $galeriFoto)
                    <div class="col-sm-6 col-lg-4 col-xxl-3 isotope-item wow fadeInRight" data-filter="Galeri_foto"
                        data-wow-delay=".1s">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-figure"><img
                                    src="{{ asset('storage/img/' . $galeriFoto->gambar) }}" alt=""
                                    width="420" height="350" />
                            </div>
                            <div class="thumbnail-classic-caption">
                                <div class="thumbnail-classic-title-wrap"><a class="icon fl-bigmug-line-zoom60"
                                        href="images/grid-gallery-2-1200x800-original.jpg" data-lightgallery="item"><img
                                            src="{{ asset('storage/img/' . $galeriFoto->gambar) }}" alt=""
                                            width="420" height="350" /></a>
                                    <h5 class="thumbnail-classic-title"><a
                                            href="/galeri/foto/detail/{{ $galeriFoto->id }}">{{ $galeriFoto->judul }}</a>
                                    </h5>
                                </div>
                                <p class="thumbnail-classic-text">{{ Str::substr($galeriFoto->judul, 0, 60) }}...</p>
                            </div>
                        </article>
                    </div>
                @endforeach

                @foreach ($dataGaleriVideo as $galeriVideo)
                    <div class="col-sm-6 col-lg-4 col-xxl-3 isotope-item wow fadeInRight" data-filter="Galeri_Video"
                        data-wow-delay=".2s">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-figure"><img
                                    src="{{ asset('storage/img/' . $galeriVideo->gambar) }}" alt=""
                                    width="420" height="350" />
                            </div>
                            <div class="thumbnail-classic-caption">
                                <div class="thumbnail-classic-title-wrap"><a class="icon fl-bigmug-line-zoom60"
                                        href="images/grid-gallery-3-1200x800-original.jpg" data-lightgallery="item"><img
                                            src="{{ asset('storage/img/' . $galeriVideo->gambar) }}" alt=""
                                            width="420" height="350" /></a>
                                    <h5 class="thumbnail-classic-title"><a href="/galeri/video/detail/{{ $galeriVideo->id }}">{{ $galeriVideo->judul }}</a>
                                    </h5>
                                </div>
                                <p class="thumbnail-classic-text">{{ Str::substr($galeriVideo->judul, 0, 60) }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div>
            <a href="/galeri" class="button button-primary button-pipaluk">Selengkapnya</a>
        </div>
    </section>


    <section class="section section-sm section-fluid bg-default text-center">
        <div class="container">
            <h2 class="wow fadeInLeft">F<span style="color: red">A</span>Q</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" style="text-align: left">
                        @foreach ($Faq as $item)
                            <div class="accordion-item">
                                <div class="accordion-header">{{ $item->judul }}</div>
                                <div class="accordion-content">{!! $item->deskripsi !!}</div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- Contact information-->
    <section class="section section-sm bg-default" id="contacts">
        <div class="container">
            <div class="row row-30 justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <article class="box-contacts">
                        <div class="box-contacts-body">
                            <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                            <div class="box-contacts-decor"></div>
                            <p class="box-contacts-link"><a href="tel:622518338052">+62-251-8338052</a></p>

                        </div>
                    </article>
                </div>

                <div class="col-sm-8 col-md-6 col-lg-4">
                    <article class="box-contacts">
                        <div class="box-contacts-body">
                            <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                            <div class="box-contacts-decor"></div>
                            <p class="box-contacts-link"><a href="#" style="font-size: 14px">Jl. Kapten Muslihat
                                    No.21, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16122</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <article class="box-contacts">
                        <div class="box-contacts-body">
                            <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
                            <div class="box-contacts-decor"></div>
                            <p class="box-contacts-link" style=""><a
                                    href="mailto:bappedalitbang.kotabogor@gmail.com"
                                    style="font-size: 14px">bappedalitbang.kotabogor@gmail.com</a></p>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form-->
    <section class="section section-sm section-last bg-default text-left">
        <div class="container">
            <article class="title-classic">
                <div class="title-classic-title">
                    <h3>Hubungi Kami</h3>
                </div>
                <div class="title-classic-text">
                    <p>Jika Anda memiliki pertanyaan, isi saja formulir kontak, dan kami akan segera menjawab Anda.</p>
                </div>
            </article>
            <form class="rd-form rd-form-variant-2 rd-mailform" data-form-output="form-output-global"
                data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="row row-14 gutters-14">
                    <div class="col-md-4">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-your-name-2" type="text" name="name"
                                data-constraints="">
                            <label class="form-label" for="contact-your-name-2">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-email-2" type="email" name="email"
                                data-constraints=" ">
                            <label class="form-label" for="contact-email-2">E-mail</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-phone-2" type="text" name="phone"
                                data-constraints="">
                            <label class="form-label" for="contact-phone-2">Phone</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-message-2">Message</label>
                            <textarea class="form-input textarea-lg" id="contact-message-2" name="message" data-constraints=""></textarea>
                        </div>
                    </div>
                </div>
                <button class="button button-primary button-pipaluk" type="submit">Send Message</button>
            </form>
        </div>
    </section>



    <!-- RD Google Map-->
    <section class="section section-fluid">
        <!-- Google Map-->
        <section class="section">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7926.815152875911!2d106.793113!3d-6.596161!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5b7191348cb%3A0xa9a193fe3cb7234d!2sPemerintahan%20Kota%20Bogor%20Bappeda!5e0!3m2!1sid!2sid!4v1695984938132!5m2!1sid!2sid"
                width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </section>


    <script>
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const item = header.parentElement;
                const content = item.querySelector('.accordion-content');
                const isOpen = item.classList.contains('open');


                accordionHeaders.forEach(otherHeader => {
                    const otherItem = otherHeader.parentElement;
                    if (otherItem !== item) {
                        otherItem.classList.remove('open');
                        otherItem.querySelector('.accordion-content').style.display = 'none';
                    }
                });


                if (isOpen) {
                    item.classList.remove('open');
                    content.style.display = 'none';
                } else {
                    item.classList.add('open');
                    content.style.display = 'block';
                }
            });
        });
    </script>
@endsection
