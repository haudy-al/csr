@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <img src="{{ asset('/storage/img/' . $data->gambar) }}" alt="">
                    </div>
                    <div class="mb-3">
                        <h3 style="text-align: left">{{ $data->judul }}</h3>
                    </div>
                    <div class="mb-3">
                        <span style="text-align: left">
                            {!! $data->deskripsi !!}
                        </span>
                    </div>
                </div>
                <div class="col-md-4" style="text-align: left">
                    @php
                        $beritaLain = App\Models\BeritaModel::where('id', '!=', $data->id)
                            ->inRandomOrder()
                            ->take(5)
                            ->get();
                    @endphp

                    @foreach ($beritaLain as $item)
                        

                    <div class="card mb-3 border-0" >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/img/'.$item->gambar) }}" style="min-width: 100%"  class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-0">
                                    <a href="/berita/detail/{{ $item->id }}">

                                        <h6 class="card-title">{{ $item->judul }}</h5>
                                    </a>
                                    
                                    <p class="card-text"><small class="text-body-secondary">{{ $item->created_at->format('D d-m-Y') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
