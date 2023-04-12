@extends('admin.layouts.app')
@section('title', 'User Roles')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Settings </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Settings </a>
            </li>
            <li class="breadcrumb-item">
                <a> Permissions </a> 
            </li>
            <li class="breadcrumb-item active">
                <a> Edit </a> 
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{route('permissionIndex')}}" class="btn btn-secondary btn-sm">
            <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">  
    <div class="row">
        @foreach ($permissions as $permission)
        <div class="col-md-3 my-3">
            <input type="checkbox" id="{{$role->id}}{{$permission->id}}" class="switchery" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} 
            onchange="grantPermission('{{$role->id}}', '{{$permission->name}}',{{$role->id}}{{$permission->id}})"
            /> <span> {{$permission->name}}</span>
        </div>
        @endforeach
    </div>
</div>
@endsection