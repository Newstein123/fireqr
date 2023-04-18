@extends('frontend.layouts.app')
@section('title', 'Product Detail')
@section('content')
    {{-- <div class="container-fluid bg-info p-3 mt-3">
        <div class="row text-center">
            <div class="col-md-6">
                <h3> {{$product->type}} </h3>
            </div>
            <div class="col-md-6">
                <p><span class="text-danger"> ပင်မစာမျက်နှာ </span> All Products </p> 
            </div>
        </div>
    </div> --}}
    <div class="container mt-3">
        <div class="ibox-img">
            @php
                $images = json_decode($product->image)
            @endphp   
            @if (count($images) > 1)
                <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
                    <div class="splide__rowack">
                        <ul class="splide__list">
                        @foreach (json_decode($product->image) as $image)
                        <li class="splide__slide">
                            <img
                            src="{{asset('img/fire_vehicles/'.$image)}}"
                            alt=""
                            class="w-100"
                            />
                        </li>
                        @endforeach
                        </ul>
                    </div>
                </section>
                <ul id="thumbnails" class="thumbnails">                
                    @foreach (json_decode($product->image) as $image)
                    <li class="thumbnail">
                        <img src="{{asset('img/fire_vehicles/'.$image)}}" alt="" />
                    </li>
                    @endforeach
                </ul> 
            @else 
                <div class="text-center">
                    <img src="{{asset('/img/fire_vehicles/'.$images[0])}}" alt="" class="img-fluid w-50">
                </div>
            @endif
        </div>
            <div class="row">
                <div class="col-md-8">
                    <h3 class="my-3"> {{ $product->type  }}</h3>
                    <div class="row my-3">
                        <div class="col-md-4"> ပစ္စည်းအမျိုးအမည် </div>
                        <div class="col-md-8"> - {{ $product->name }}</div>
                    </div>
                    @if ($product->company_name) 
                        <div class="row my-3">
                            <div class="col-md-4"> ကုမ္ပဏီအမည် </div>
                            <div class="col-md-8"> - {{ $product->company_name }} </div>
                        </div>
                    @endif
                    @if ($product->country)
                        <div class="row my-3">
                            <div class="col-md-4"> ထုတ်လုပ်သည့်နိုင်ငံ  </div>
                            <div class="col-md-8"> - {{ $product->country }} </div>
                        </div>
                    @endif
                    @if ($product->model_no)
                        <div class="row my-3">
                            <div class="col-md-4"> ပစ္စည်းမော်ဒယ်နံပါတ် </div>
                            <div class="col-md-8"> - {{ $product->model_no }}</div>
                        </div>
                    @endif
                    @if ($product->manufactured_year)
                        <div class="row my-3">
                            <div class="col-md-4"> ထုတ်လုပ်သည့်ခုနှစ် </div>
                            <div class="col-md-8"> 
                                @php
                                    $year = date('Y', strtotime($product->manufactured_year));
                                @endphp
                                - {{$year}}
                            </div>
                        </div>
                    @endif
                    @if ($product->start_date)
                        <div class="row my-3">
                            <div class="col-md-4"> စတင်သုံးစွဲသည့်နေ့စွဲ  </div>
                            <div class="col-md-8"> - {{ $product->start_date }}</div>
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
    </div>
@endsection