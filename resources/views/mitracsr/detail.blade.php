@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')

    <style nonce="{{ csp_nonce() }}">
    .h-map{
        height: 200px;
    }
    </style>

    <section class="section section-sm bg-default" style="text-align: left; margin-bottom: 100px">
        <div class="container-fluid">
            <div class="card border-0">
                <div class="card-header border-0" style="background-color: rgb(245, 245, 245)">
                    <a href="/mitra-csr" class="btn btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7 mb-3">
                        <p>
                            <strong>Nama Perusahaan :</strong> {{ $data->nama_perusahaan }}
                        </p>
                        <p>
                            <strong>Alamat Perusahaan : </strong><br> {{ $data->alamat_perusahaan }}
                        </p>
                    </div>

                    <div class="col-md-5">
                        <div id="map" class="h-map" style="height: 200px;"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script nonce="{{ csp_nonce() }}">
        document.addEventListener("DOMContentLoaded", function() {
            let mapOptions = {
                center: [-6.595018, 106.816635],
                zoom: 13
            }

            let map = new L.map('map', mapOptions);

            let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            map.addLayer(layer);


            marker = L.marker([`{{ $data->latitude }}`, `{{ $data->longitude }}`]).addTo(map);


            var customPopup = `<div class="card border-0" style="width: 200px;">
                                    <img src="{{ cekGambarMember($data->gambar_perusahaan) }}" class="card-img-top" alt="Gambar">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->nama_perusahaan }}</h5>
                                       
                                    </div>
                                </div>
                            `;

            marker.bindPopup(customPopup);

            map.setView([`{{ $data->latitude }}`, `{{ $data->longitude }}`], 15);

        });
    </script>
@endsection
