@extends('admin.layouts.app')
@section('title', 'Category Page')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Category </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href=""> Setting </a>
            </li>
            <li class="breadcrumb-item active">
                <a> Category </a>
            </li>
        </ol>
    </div>
    @can('create categories')
        <div class="col-md-2 mt-4">
            <a href="{{ route('categoryCreate') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-plus mr-2"></i> Add Category </a>
        </div>
    @endcan
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h5> Category Table </h5>                  
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th> Id </th>
                            <th> Category Name </th>
                            <th> Date </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (count($categories) > 0)
                                @php
                                $id = 1;
                                @endphp
                                @foreach ($categories as $category)
                                    <tr class="gradeU">
                                        <td> {{ $id++ }} </td>
                                        <td> {{ $category->name }}</td>
                                        <td> {{$category->created_at->toFormattedDateString() }} </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            @can('edit categories')
                                                <div class="mr-2">
                                                    <a href="{{route('categoryEdit', $category->id)}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit" aria-hidden="true"
                                                    data-toggle="tooltip" data-placement="top" title="ပြင်ဆင်မည်"     
                                                    ></i></a>
                                                </div>
                                            @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else 
                                <tr class="text-center">
                                    <td colspan="100%"> <span class="text-danger"> There is no data  </span></td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th> Id </th>
                            <th> Category Name </th>
                            <th> Date </th>
                            <th> Action </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection