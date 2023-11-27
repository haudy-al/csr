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
                        <img src="https://kominfo.kotabogor.go.id/asset/images/web/konten/{{ $data->image }}" alt="">
                    </div>
                    <div class="mb-3">
                        <h3 style="text-align: left">{{ $data->title }}</h3>
                    </div>
                    <div class="mb-3">
                        <span style="text-align: left">
                            {!! $data->body !!}
                        </span>
                    </div>
                </div>
               <div class="col-md-4" style="text-align: left">

                    @foreach ($beritaLain as $item)
                        
                    <div class="card mb-3 border-0" >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://kominfo.kotabogor.go.id/asset/images/web/konten/{{ $item->image }}" style="min-width: 100%"  class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-0">
                                    <a href="/berita-kota-bogor/{{ $item->post_id }}/{{ str_replace(' ','-',$item->title) }}">

                                        <h6 class="card-title">{{ $item->title }}</h5>
                                    </a>
                                    
                                    <p class="card-text"><small class="text-body-secondary">{{ $item->date_publish }}</small>
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
