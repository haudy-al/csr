@extends('member.layouts.app')

@section('content_member')
    <div class="container-fluid">

        <div class="table-responsive">
            <div id="columnchart_values_usulan"></div>
        </div>



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
