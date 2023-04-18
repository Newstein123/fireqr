@extends('admin.layouts.app')
@section('title', 'Edit User')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> User  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a> User </a>
            </li>
            <li class="breadcrumb-item active">
                <a> Edit </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{route('userIndex')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Edit User </h5>
            </div>
        </div>
        <div class="ibox-content">
            <form action="{{route('userUpdate', $user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> အမည် </label>
                        <input type="text" name="name" class="form-control mt-2" value="{{$user->name}}">
                        @error('name')
                            <p class="text-danger my-2"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="email" class="font-weight-bold"> Email </label>
                        <input type="email" name="email" class="form-control mt-2" value="{{$user->email}}">
                        @error('email')
                            <p class="text-danger my-2"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="role" class="font-weight-bold"> Assign Role  </label>
                        <select name="role" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" class="text-uppercase" {{$user->hasAnyRole($role->name) ? 'selected' : ''}} > 
                                    <span > {{$role->name}} </span> 
                                </option>
                            @endforeach
                        </select>
                        @error('role')
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