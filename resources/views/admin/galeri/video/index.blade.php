@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <a href="/admin/galeri/video/tambah" class="btn btn-primary btn-sm"><span class="mdi mdi-plus"></span> Tambah</a>
        </div>
        <div class="row el-element-overlay">

            @foreach ($dataVideo as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('storage/img/' . $item->gambar) }}"
                                    alt="user" />
                                <div class="el-overlay">
                                    <ul class="list-style-none el-info">
                                        <li class="el-item"><a
                                                class="btn default btn-outline image-popup-vertical-fit el-link"
                                                href="https://www.youtube.com/watch?v={{ $item->embed }}" target="_blank"><i
                                                    class="mdi mdi-eye"></i></a>
                                        </li>
                                        <li class="el-item"><a
                                                class="btn default btn-outline image-popup-vertical-fit el-link"
                                                href=""><i class="mdi mdi-magnify"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <form class="d-inline" action="/admin/galeri/video/hapus/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Yakin Ingin Mengapus ?')" type="submit"
                                        class="btn btn-sm btn-danger text-light"><span class="mdi mdi-delete"></span>
                                        Hapus</button>
                                </form>
                                <a class="btn btn-warning btn-sm" href="/admin/galeri/video/edit?i={{ $item->id }}">
                                    <span class="mdi mdi-file"></span> Ubah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            


        </div>
        {{ $dataVideo->links() }}

    </div>

    @include('admin.layouts.alert')

   
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Galeri</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                        <li class="breadcrumb-item active" aria-current="page">Video</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('cdn')
    <link href="{{ asset('TemplateAdmin') }}/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">

    <script src="{{ asset('TemplateAdmin') }}/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('TemplateAdmin') }}/assets/libs/magnific-popup/meg.init.js"></script>
@endsection
