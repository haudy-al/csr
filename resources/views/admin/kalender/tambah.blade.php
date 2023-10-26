@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a class="btn btn-sm" href="/admin/calendar">Kembali</a>
            </div>

            <div class="card-body">
                <form action="{{ route('calendar.store') }}" method="POST" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Activity</button>
                </form>
                
            </div>
            {{-- <div class="card-footer">
                <div id='calendar'></div>
            </div> --}}
        </div>

    </div>

    @include('admin.layouts.alert')
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
                        <li class="breadcrumb-item active" aria-current="page">Tambah>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
