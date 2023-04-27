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
            <div class="ibox-img">
                <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
                    <div class="splide__track">
                        <ul class="splide__list">
                        @foreach (json_decode($product->image) as $image)
                        <li class="splide__slide" style="height: {{getimagesize(public_path('img/original/'.$image))[1]}}px;">
                            @if (file_exists(public_path('img/original/'.$image)))
                                <img src="{{asset('img/original/'.$image)}}"/>
                            @else 
                                <img src="{{asset('img/fire_vehicles/'.$image)}}"/>
                            @endif
                        </li>
                        @endforeach
                        </ul>
                    </div>
                </section>
                <ul id="thumbnails" class="thumbnails">                
                    @foreach (json_decode($product->image) as $image)
                    <li class="thumbnail">
                        @if (file_exists(public_path('img/original/'.$image)))
                            <img src="{{asset('img/original/'.$image)}}"/>
                        @else 
                            <img src="{{asset('img/fire_vehicles/'.$image)}}"/>
                        @endif
                    </li>
                    @endforeach
                </ul>   
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