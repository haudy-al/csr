@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default">
        <div class="container">
            <h2>DOKUMEN TJSLP</h2>
            <div class="row row-45">
                @foreach ($dataDokumen as $item)
                    <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                        <!-- Post Modern-->
                        <article class="post post-modern " ><a class="post-modern-figure"
                                href="/dokumen/detail/{{ $item->id }}"><img
                                    src="{{ cekGambarDokumenPage1($item->id) }}" alt="" width="370"
                                    height="307" style="border: 1px #b4b4b4 solid" />
                                <div class="post-modern-time">
                                    <time datetime="2019-07-22"><span
                                            class="post-modern-time-month">{{ $item->created_at->format('m') }}</span><span
                                            class="post-modern-time-number">{{ $item->created_at->format('d') }}</span></time>
                                </div>
                            </a>
                            <h4 class="post-modern-title"><a
                                    href="/dokumen/detail/{{ $item->id }}">{{ $item->judul }}</a></h4>
                           
                        </article>
                    </div>
                @endforeach

            </div>

            
            <div class="d-flex justify-content-center">
                {{ $dataDokumen->links() }}
            </div>
        </div>
    </section>
@endsection
