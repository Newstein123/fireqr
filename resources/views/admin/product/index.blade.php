@extends('admin.layouts.app')
@section('title', 'Product Page')
@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Product </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a>Product</a>
            </li>
        </ol>
    </div>
    @can('create products')
        <div class="col-md-2 mt-4">
            <a href="{{ route('productCreate') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-plus mr-2"></i> Add Product </a>
        </div>
    @endcan
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h5> Product Table </h5>
                    <div>
                        <form action="">
                            <div class="d-flex align-items-center">
                                <input type="search" name="search" id="" class="form-control mr-2" placeholder="search">
                                <button type="submit" class="btn btn-success" > <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
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
                            @if (count($products) > 0)
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
                                            <div class="d-flex align-items-center">
                                                @can('view products')                            
                                                <div class="mr-2">
                                                    <a href="{{ route('productView', $product->id)}}" class="btn btn-secondary btn-sm"> View Detail </a> 
                                                </div>
                                            @endcan
                                            <div class="mr-2">
                                                <form action="{{route('downloadQr', $product->id)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm download" type="submit">
                                                        <i class="fa fa-download" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="ဒေါင်းလုပ်ဆွဲမည်"    
                                                    ></i></button>
                                                </form>
                                            </div>
                                            @can('edit products')
                                                <div class="mr-2">
                                                    <a href="{{route('productEdit', $product->id)}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit" aria-hidden="true"
                                                    data-toggle="tooltip" data-placement="top" title="ပြင်ဆင်မည်"     
                                                    ></i></a>
                                                </div>
                                            @endcan
                                            @can('ban products')
                                                @if ($product->publish == 0)
                                                    <div class="mr-2">
                                                        <button class="btn btn-info btn-sm" onclick="changeState('{{route('changeProductState')}}', {{$product->id}})"> <i class="fa fa-ban" aria-hidden="true" 
                                                        data-toggle="tooltip" data-placement="top" title="Unpublish" 
                                                        ></i>
                                                        </button>
                                                    </div>
                                                @else 
                                                    <div class="mr-2">
                                                        <button class="btn btn-warning btn-sm" onclick="changeState('{{route('changeProductState')}}', {{$product->id}})"> <i class="fa fa-spinner" aria-hidden="true"
                                                        data-toggle="tooltip" data-placement="top" title="Publish"     
                                                        ></i> </i>
                                                        </button>
                                                    </div>
                                                @endif
                                            @endcan
                                            @can('delete products')
                                                <div>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteForm('{{route('productDelete')}}', {{$product->id}})" ><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="ဖျက်သိမ်းမည်" 
                                                        ></i></button>
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
                            <th> Product Name </th>
                            <th> Product Type </th>
                            <th> Date </th>
                            <th> Action </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
    </div>
</div>
@endsection