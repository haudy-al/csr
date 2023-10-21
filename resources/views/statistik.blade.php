@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default" style="text-align: left; margin-bottom: 100px">
        <div class="container">
            <h3>Statistik CSR</h3>
            <div>
                <div class="card mt-4 border-0 p-0 m-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                                        
                                <form action="">
                                    <select name="t" onchange="$(event.target).parents('form').submit()" class="form-control-custom" >

                                        <option value="">Pilih Tahun</option>
                                        @foreach ($tahunData as $tahun)
                                            <option value="{{ $tahun }}" {!! _get('t') == $tahun ? 'selected' : '' !!}>{{ $tahun }}</option>
                                        @endforeach
    
                                    </select>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="chartUsulanKegiatan"></div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </section>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        function chartG() {
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

        }
        chartG();
        window.addEventListener('turbolinks:load', () => {
            chartG();

        })

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Month");
            data.addColumn("number", "Jumlah");

            // Add data rows from PHP array
            <?php foreach($UsulanKegiatan as $month => $count) { ?>
            data.addRow(["<?php echo $month; ?>", <?php echo $count; ?>]);
            <?php } ?>


            var options = {
                title: "Usulan Kegiatan",
                width: "100%",
                height: "100%",
                bar: {
                    groupWidth: "50%"
                },
                legend: {
                    position: "none"
                },
                hAxis: {
                    ticks: <?php echo json_encode(array_keys($UsulanKegiatan)); ?>
                },
                colors: ['#b87333', 'silver', 'gold', '#e5e4e2', 'blue', 'green', 'purple', 'red', 'orange', 'pink',
                    'brown', 'teal'
                ]

            };


            var chart = new google.visualization.ColumnChart(
                document.getElementById("chartUsulanKegiatan")
            );
            chart.draw(data, options);
        }
    </script>
@endsection
