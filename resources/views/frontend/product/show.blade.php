@extends('frontend.layouts.app')
@section('title', 'Product Detail')
@section('content')
    <div class="container mt-3">
        <div class="text-center">
            <img src="{{ asset('img/logo/'.generalSetting('logo')) }}" alt="logo" width="100px" height="100px">
            <p class="my-3">{{generalSetting('title') }}</p>
        </div>
        @if ($product->publish == 0)
        <div class="ibox-img d-flex justify-content-center align-items-center">  
            @if (count(json_decode($product->image)) > 1)
            <div id="carouselExampleIndicators" class="carousel slide w-50">
                <div class="carousel-indicators">
                    @foreach (json_decode($product->image) as $key => $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                  @foreach (json_decode($product->image) as $key=>$image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        @if (file_exists(public_path('img/original/' .$image)))
                            <img src="{{asset('img/original/'. $image) }}" class="d-block w-100" alt="...">
                        @else
                            <img src="{{asset('img/fire_vehicles/'. $image) }}" class="d-block w-100" alt="...">
                        @endif
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon bg-danger p-3 rounded-circle" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon bg-danger p-3 rounded-circle" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
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
        <div class="row">
            <div class="col-md-8">
                <h3 class="my-3"> {{ $product->name  }}</h3>
                <div class="row my-3">
                    <div class="col-5 col-md-4"> ပစ္စည်းအမျိုးအစား </div>
                    <div class="col-7 col-md-8"> - {{ $product->category->name }}</div>
                </div>
                @if ($product->company_name) 
                    <div class="row my-3">
                        <div class="col-5 col-md-4"> ကုမ္ပဏီအမည် </div>
                        <div class="col-7 col-md-8"> - {{ $product->company_name }} </div>
                    </div>
                @endif
                @if ($product->country)
                    <div class="row my-3">
                        <div class="col-5 col-md-4"> ထုတ်လုပ်သည့်နိုင်ငံ  </div>
                        <div class="col-7 col-md-8"> - {{ $product->country }} </div>
                    </div>
                @endif
                @if ($product->model_no)
                    <div class="row my-3">
                        <div class="col-5 col-md-4"> ပစ္စည်းမော်ဒယ်နံပါတ် </div>
                        <div class="col-7 col-md-8"> - {{ $product->model_no }}</div>
                    </div>
                @endif
                @if ($product->manufactured_year)
                    <div class="row my-3">
                        <div class="col-5 col-md-4"> ထုတ်လုပ်သည့်ခုနှစ် </div>
                        <div class="col-7 col-md-8"> 
                            @php
                                $year = date('Y', strtotime($product->manufactured_year));
                            @endphp
                            - {{$year}}
                        </div>
                    </div>
                @endif
                @if ($product->start_date)
                    @php
                        $formattedDate = \Carbon\Carbon::parse($product->start_date)->format('d/m/Y');
                    @endphp
                    <div class="row my-3">
                        <div class="col-5 col-md-4"> စတင်သုံးစွဲသည့်နေ့စွဲ  </div>
                        <div class="col-7 col-md-8"> - {{$formattedDate}}</div>
                    </div>
                @endif
                @if ($product->usage)
                    <div>
                        <p class="fw-bold"> အသုံးပြုပုံ </p>
                        <p>{{ $product->usage }}</p>
                    </div>
                @endif
                @if ($product->description)
                    <div>
                        <p class="fw-bold"> အသေးစိတ် </p>
                        <p>{{ $product->description }}</p>
                    </div>
                @endif
            </div>
                {{-- QR Code  --}}
            <div class="text-center my-3 col-md-4 mt-5">
                <img src="{{asset('storage/qr-img/'.$product->qr_img)}}" alt="" class="img-fluid w-50">
            </div>
        </div>
        @else 
            <div class="container d-flex justify-content-center align-items-center">
                <h3 class="text-danger"> This product is no longer available.</h3>
            </div>
        @endif
    </div>
@endsection