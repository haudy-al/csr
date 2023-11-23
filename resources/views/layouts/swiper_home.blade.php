<style nonce="{{ csp_nonce() }}">
    .hj{
        color: #fff !important
    }
</style>
<section class="section swiper-container swiper-slider swiper-slider-classic" data-loop="true" data-autoplay="4859"
    data-simulate-touch="true" data-direction="vertical" data-nav="false">
    <div class="swiper-wrapper text-center">
        @php
            $BeritaRand = App\Models\BeritaModel::inRandomOrder()
                ->take(3)
                ->get();
        @endphp

        @foreach ($BeritaRand as $item)
            <div class="swiper-slide" data-slide-bg="{{ asset('storage/img/' . $item->gambar) }}">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <h1 class="hj" data-caption-animate="fadeInLeft" data-caption-delay="0">
                            {{ Str::substr($item->judul, 0, 26) }}...
                        </h1>
                        <p class="text-width-large" data-caption-animate="fadeInRight" data-caption-delay="100">Dapatkan
                            Berita Terbaru mengenai TJSLP Kota Bogor Dengan Cepat Dan Akurat.</p>
                        {{-- <a class="button button-primary button-ujarak" href="#modalCta"
                        data-toggle="modal" data-caption-animate="fadeInUp" data-caption-delay="200">Lihat</a> --}}
                        <a class="button button-primary button-ujarak" href="/berita/detail/{{ $item->id }}" >Lihat</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- Swiper Pagination-->
    <div class="swiper-pagination__module">
        <div class="swiper-pagination__fraction"><span class="swiper-pagination__fraction-index">00</span><span
                class="swiper-pagination__fraction-divider">/</span><span
                class="swiper-pagination__fraction-count">00</span></div>
        <div class="swiper-pagination__divider"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
