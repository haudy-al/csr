@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <div id="columnchart_values_usulan"></div>
                </div>

            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <div id="curve_chart"></div>
                </div>
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <div id="chart_laporan"></div>
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

        google.charts.setOnLoadCallback(drawChartLaporan);
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

        function drawChartLaporan() {
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Year");
            data.addColumn("number", "Jumlah Laporan");

            // Add data rows from PHP array
            @foreach ($dataLaporan as $year => $count)
                data.addRow(["{{ $year }}", {{ $count }}]);
            @endforeach

            var options = {
                title: "Laporan Tahun Ini dan 5 Tahun Sebelumnya",
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
                },
                colors: ['#ff0000']
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById("chart_laporan")
            );
            chart.draw(data, options);
        }

        function drawChart() {
            fetch('/member/json/data-transaksi')
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

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                });
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
