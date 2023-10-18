@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
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
                                    src="{{ asset('storage/img/' . $galeriFoto->gambar) }}" alt="" width="420"
                                    height="350" />
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
                                    src="{{ asset('storage/img/' . $galeriVideo->gambar) }}" alt="" width="420"
                                    height="350" />
                            </div>
                            <div class="thumbnail-classic-caption">
                                <div class="thumbnail-classic-title-wrap"><a class="icon fl-bigmug-line-zoom60"
                                        href="images/grid-gallery-3-1200x800-original.jpg" data-lightgallery="item"><img
                                            src="{{ asset('storage/img/' . $galeriVideo->gambar) }}" alt=""
                                            width="420" height="350" /></a>
                                    <h5 class="thumbnail-classic-title"><a
                                            href="/galeri/video/detail/{{ $galeriVideo->id }}">{{ $galeriVideo->judul }}</a>
                                    </h5>
                                </div>
                                <p class="thumbnail-classic-text">{{ Str::substr($galeriVideo->judul, 0, 60) }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
