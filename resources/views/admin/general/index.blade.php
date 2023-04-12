@extends('admin.layouts.app')
@section('title', 'General Setting')
@section('content')
@if (session('message'))
    <script>
        toastr.success('{{session('message')}}');
    </script>
@endif
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Setting </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"> Setting </a>
            </li>
            <li class="breadcrumb-item active">
                <a> General Setting </a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> General Setting Table </h5>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th> အမှတ်စဉ် </th>
            <th> အမည် </th>
            <th> လုပ်ဆောင်ချက် </th>
        </tr>
        </thead>
        <tbody>
            @php
                $id = 1;
            @endphp
            @foreach ($generals as $general)
                <tr class="gradeU">
                    <td> {{ $id++ }} </td>
                    <td> {{ $general->name }}</td>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">
                            @can('edit general setting')
                                <div>
                                    <a href="{{route('generalEdit', $general->id)}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit" aria-hidden="true"
                                    data-toggle="tooltip" data-placement="top" title="ပြင်ဆင်မည်"     
                                    ></i></a>
                                </div>
                            @endcan                     
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection