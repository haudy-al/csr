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

                            <div class="col-lg-12 mt-5">
                                <div class="flot-chart">
                                    <div class="table-responsive">
                                        <div id="columnchart_values_minat"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="card">
                                    <h3 class="mb-3">Log Aktivitas</h3>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Ip</th>
                                                    <th>Agent</th>
                                                    <th>Subject</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($logAktivites as $key => $item)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ getUserBylevelAndId($item->level,$item->id_akun)->username }}</td>
                                                        <td>{{ $item->ip }}</td>
                                                        <td>{{ $item->agent }}</td>
                                                        <td>{{ $item->subject }}</td>
                                                        <td>{{ $item->created_at }}</td>


                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });

        google.charts.setOnLoadCallback(drawChartUsulan);
        google.charts.setOnLoadCallback(drawChart);

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

        function drawChart() {
            fetch('/admin/json/data-transaksi')
                .then(response => response.json())
                .then(data => {
                    var chartData = [
                        ['Bulan', 'Bantuan Proses', 'Diterima', 'Ditolak']
                    ];
                    data.forEach(item => {
                        chartData.push([item.month, parseInt(item.bantuan_proses), parseInt(item.diterima),
                            parseInt(item.ditolak)
                        ]);
                    });

                    var data = google.visualization.arrayToDataTable(chartData);

                    var currentYear = new Date().getFullYear();

                    var options = {
                        title: 'Data Usulan Peminatan ' + currentYear,
                        curveType: 'function',
                        legend: {
                            position: 'bottom'
                        },
                        colors: ['yellow', 'green', 'red'],
                        pointSize: 7
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('columnchart_values_minat'));

                    chart.draw(data, options);
                });
        }
    </script>
    <script>
        $('#zero_config').DataTable();
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
