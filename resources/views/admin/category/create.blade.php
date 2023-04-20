@extends('admin.layouts.app')
@section('title', 'Category Create')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Category  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href=""> Setting </a>
            </li>
            <li class="breadcrumb-item">
                <a class="{{route('categoryIndex')}}"> Category </a>
            </li>
            <li class="breadcrumb-item active">
                <a> Create </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{ route('categoryIndex') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Add New Category </h5>
            </div>
        </div>
        <div class="ibox-content">
            <form action="{{route('categoryStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> ပစ္စည်းအမျိုးအမည် <span class="text-danger">*</span>  </label>
                        <input type="name" name="name" class="form-control mt-2" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger my-2"> {{$message}} </p>
                        @enderror
                    </div>                
                </div>
                <div class="col-md-12 float-right">
                    <button type="submit" class="btn btn-secondary btn-sm"> သိမ်းမည်</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection