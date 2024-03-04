@extends('member.layouts.app')


@section('content_member')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <a href="/member" class="btn btn-sm"><span class="mdi mdi-keyboard-backspace"></span> Home</a>
            </div>

            <div class="card-body">

                @livewire('member.reset-password')

            </div>
        </div>
    </div>
    @include('member.layouts.alert')
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Atur Ulang Password</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rubah Password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('cdn')
   
@endsection
