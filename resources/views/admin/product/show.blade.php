@extends('admin.layouts.app')
@section('title', 'View Product')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Product  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('productIndex') }}">Product</a>
            </li>
            <li class="breadcrumb-item active">
                <a> Detail </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{ route('productIndex') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Product Detail </h5>
            </div>
        </div>
        <div class="ibox-content">
            <div class="ibox-img d-flex justify-content-center align-items-center">  
                @if (count(json_decode($product->image)) > 1)
                <div id="carouselExampleControls" class="carousel slide  w-75">
                    <div class="carousel-inner">
                        @foreach (json_decode($product->image) as $key=>$image)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}} ">
                            @if (file_exists(public_path('img/original/'.$image)))
                                <img src="{{asset('img/original/'.$image)}}" class="d-block w-100" alt="...">
                            @else
                                <img src="{{asset('img/fire_vehicles/'.$image)}}" class="d-block w-100" alt="...">
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-danger p-2 rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only" class="bg-danger">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-danger p-2 rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                @else
                    @foreach (json_decode($product->image) as $image)
                        @if (file_exists(public_path('img/original/'.$image)))
                            <img src="{{asset('img/original/'.$image)}}" class="d-block w-75" alt="...">
                        @else
                            <img src="{{asset('img/fire_vehicles/'.$image)}}" class="d-block w-75" alt="...">
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="table-responsive my-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td> ပစ္စည်းအမျိုးအမည် </td>
                            <td> {{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td> ပစ္စည်းအမျိုးအစား </td>
                            <td> {{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <td> ကုမ္ပဏီအမည် </td>
                            <td>
                                {{ $product->company_name ?? '-'}}
                            </td>
                        </tr>
                        <tr>
                            <td> ထုတ်လုပ်သည့်နိုင်ငံ </td>
                            <td>
                                {{ $product->country ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td> ပစ္စည်းမော်ဒယ်နံပါတ် </td>
                            <td > {{ $product->model_no ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td> ထုတ်လုပ်သည့်ခုနှစ် </td>
                            <td >
                                @if ($product->manufactured_year)
                                    @php
                                        $year = date('Y', strtotime($product->manufactured_year));
                                    @endphp
                                    {{$year}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td> စတင်သုံးစွဲသည့်နေ့စွဲ  </td>
                            <td> {{ $product->start_date ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td> အသုံးဝင်ပုံ </td>
                            <td> {{ $product->usage ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td> အသေးစိတ်  </td>
                            <td> {{ $product->description ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <img src="{{asset('storage/qr-img/'.$product->qr_img)}}" alt="" class="img-fluid w-25">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection