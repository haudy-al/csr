@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a class="btn btn-primary btn-sm" href="/admin/calendar/tambah">Tambah</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $key=>$item)
                                
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{ $item->title }}
                                </td>
                                <td>
                                    {{ $item->description  }}
                                </td>
                                <td>
                                    {{ $item->date  }}
                                </td>
                                <td>
                                    <form class="" action="/admin/calendar/hapus/{{ $item->id }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit"
                                            class="btn badge btn-danger text-light"><span
                                                class="mdi mdi-delete"></span> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div id='calendar'></div>
            </div>
        </div>

    </div>

    @include('admin.layouts.alert')


    <script>
        $('#zero_config').DataTable();
    </script>
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Kalender Aktifitas</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kalender</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                aspectRatio: 1.1,
                events: [
                    @foreach ($activities as $activity)
                        {
                            title : '{{ $activity->title }}',
                            description : '{{ $activity->description }}',
                            start : '{{ $activity->date }}',
                        },
                    @endforeach
                ]
            });
        });
    </script>
@endsection
@section('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
@endsection
