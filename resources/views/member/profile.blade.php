@extends('member.layouts.app')


@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/member" class="btn btn-sm"><span class="mdi mdi-keyboard-backspace"></span> Home</a>
            </div>

            <div class="card-body">

                @livewire('member.profile')

            </div>
        </div>
    </div>
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Member</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                 
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('cdn')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geosearch/3.8.0/geosearch.css"
        integrity="sha512-ai0NxYSxeh+RZ1GBMDY503sdYPVuMEx0sg3vKuFHN5DclEv0QMkHqJuYyogAHK/Eb4SWHlRWKmogCsm3ajgIUQ==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geosearch/3.8.0/bundle.min.js"
        integrity="sha512-x8n5sU+7HmKzbIlFYoPgy40I80YSLf95TLUK1OxYuhtBKZOkD+oh0Y4UtLy6UyFE3XBEb40/O/tyJA3HaVa5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
