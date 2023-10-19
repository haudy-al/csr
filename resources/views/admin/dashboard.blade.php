@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            {{-- <div>
                                <h4 class="card-title">Test</h4>
                                <h5 class="card-subtitle">Test</h5>
                            </div> --}}
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="table-responsive">
                                        <div id="columnchart_values_usulan"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-user mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{ $jumlahPengunjung }}</h5>
                                            <small class="font-light">Total Pengunjung</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-plus mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{ $jumlahMember }}</h5>
                                            <small class="font-light">Total Member</small>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-table mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{ $jumlahBerita }}</h5>
                                            <small class="font-light">Total berita</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });

        google.charts.setOnLoadCallback(drawChartUsulan);

        function drawChartUsulan() {
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Year");
            data.addColumn("number", "Usulan Kegiatan");

            // Add data rows from PHP array
            @foreach ($usulanKegiatan as $year => $count)
                data.addRow(["{{ $year }}", {{ $count }}]);
            @endforeach

            var options = {
                title: "Usulan Kegiatan Tahun Ini dan 5 Tahun Sebelumnya",
                width: "100%",
                height: "100%",
                bar: {
                    groupWidth: "50%"
                },
                hAxis: {
                    title: "Tahun"
                },
                vAxis: {
                    title: "Jumlah"
                }
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById("columnchart_values_usulan")
            );
            chart.draw(data, options);
        }
    </script>
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
