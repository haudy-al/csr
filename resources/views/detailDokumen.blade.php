@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default">
        <div class="container">
            <h3>{{ $dataDokumen->judul }}</h3>
            <div class="row mt-3">
                @foreach ($imageUrl as $imagePath)
                    <div class="col-md-4">
                        <a href="{{ asset('storage/pdf-image/' . $imagePath) }}" data-lightbox="roadtrip">
                            <img style="border: 1px #bdbbbb solid" src="{{ asset('storage/pdf-image/' . $imagePath) }}" width="100%" alt="Page Image">
                        </a>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>
@endsection

@section('custom_cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"
        integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
        integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
