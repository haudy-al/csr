@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default">
        <div class="container">
            <h2>BERITA KOTA BOGOR</h2>
            <div class="row row-45">
                @foreach ($dataBerita as $key => $item)
                    <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                        <!-- Post Modern-->
                        <article class="post post-modern"><a class="post-modern-figure"
                                href="/berita-kota-bogor/{{ $item->postid }}/{{ str_replace(' ','-',$item->judul) }}"><img
                                    src="{{ $item->gambar }}" alt="" width="370"
                                    height="307" />
                                    <div class="post-modern-time">
                                        <time datetime="2019-07-22"><span
                                                class="post-modern-time-month">{{ customFormatDateString('M',$item->tanggal) ?? '' }}</span><span
                                                class="post-modern-time-number">{{ customFormatDateString('d',$item->tanggal) ?? '' }}</span></time>
                                    </div>
                            </a>
                            <h4 class="post-modern-title"><a
                                    href="/berita-kota-bogor/{{ $item->postid }}/{{ str_replace(' ','-',$item->judul) }}">{{ $item->judul }}</a></h4>
                           
                        </article>
                    </div>
                @endforeach

            </div>

            
            <div class="d-flex justify-content-center">
               
            </div>
        </div>
    </section>
@endsection
