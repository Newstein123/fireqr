@extends('admin.layouts.app')
@section('title', 'Product Page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Products </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a>Products</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Product Table </h5>
                <a href="{{ route('productCreate') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-plus mr-2"></i> Add Product </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th> Id </th>
            <th> Product Name </th>
            <th> Product Type </th>
            <th> Date </th>
            <th> Action </th>
        </tr>
        </thead>
        <tbody>
            @php
                $id = 1;
            @endphp
            @foreach ($products as $product)
                <tr class="gradeU">
                    <td> {{ $id++ }} </td>
                    <td> {{ $product->name }}</td>
                    <td> {{ $product->type }}</td>
                    <td> {{$product->created_at->toFormattedDateString() }} </td>
                    <td>
                        @can('view products')                            
                                <a href="{{ route('productView', $product->id)}}" class="btn btn-secondary btn-sm"> View Detail </a> 
                        @endcan
                        <a href="" class="btn btn-danger btn-sm" ><i class="fa fa-download" aria-hidden="true"
                        data-toggle="tooltip" data-placement="top" title="ဒေါင်းလုပ်ဆွဲမည်"    
                        ></i></a>
                        @can('edit products')
                            <a href="" class="btn btn-primary btn-sm" ><i class="fa fa-edit" aria-hidden="true"
                            data-toggle="tooltip" data-placement="top" title="ပြင်ဆင်မည်"     
                            ></i></a>
                        @endcan
                        @can('ban products')
                            @if ($product->publish == 0)
                                <a href="" class="btn btn-info btn-sm"> <i class="fa fa-ban" aria-hidden="true"
                                data-toggle="tooltip" data-placement="top" title="Unpublish" 
                                ></i>
                                </a>
                            @else 
                                <a href="" class="btn btn-info btn-sm"> <i class="fa fa-spinner" aria-hidden="true"
                                data-toggle="tooltip" data-placement="top" title="Publish"     
                                ></i> </i>
                                </a>
                            @endif
                        @endcan
                        @can('delete products')
                            <a href="" class="btn btn-danger btn-sm" ><i class="fa fa-trash" aria-hidden="true"
                            data-toggle="tooltip" data-placement="top" title="ဖျက်သိမ်းမည်" 
                            ></i></a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th> Id </th>
            <th> Product Name </th>
            <th> Product Type </th>
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