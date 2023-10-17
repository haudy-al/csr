@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.profile-admin')
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection


@section('breadcrumb')
<div class="row">
    <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Profile</h4>
        <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('cdn')
   
@endsection