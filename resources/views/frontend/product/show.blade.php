@extends('frontend.layouts.app')
@section('title', 'Product Detail')
@section('content')
    <div class="container-fluid bg-info p-3 mt-3">
        <div class="row text-center">
            <div class="col-md-6">
                <h3> {{$product->type}} </h3>
            </div>
            <div class="col-md-6">
                <p><span class="text-danger"> ပင်မစာမျက်နှာ </span> All Products </p> 
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="ibox-img">
            <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
                <div class="splide__track">
                    <ul class="splide__list">
                    @foreach (json_decode($product->image) as $image)
                    <li class="splide__slide">
                        <img
                        src="{{asset('img/qr-image/'.$image)}}"
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
                    <img src="{{asset('img/qr-image/'.$image)}}" alt="" />
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
                        <td> {{ $product->type }}</td>
                    </tr>
                    <tr>
                        <td> ပစ္စည်းမော်ဒယ်နံပါတ် </td>
                        <td> {{ $product->model_no }}</td>
                    </tr>
                    <tr>
                        <td> ထုတ်လုပ်သည့်ခုနှစ် </td>
                        <td> 
                            @php
                                $year = date('Y', strtotime($product->manufactured_year));
                            @endphp
                            {{$year}}
                        </td>
                    </tr>
                    <tr>
                        <td> စတင်သုံးစွဲသည့်နေ့စွဲ  </td>
                        <td> {{ $product->start_date }}</td>
                    </tr>
                    <tr>
                        <td> အသေးစိတ်  </td>
                        <td> {{ $product->description }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="print-visible text-center">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->merge('\public\img\logo\logo.png')->generate('/product/'.$product->id)) !!} ">
            </div>
        </div>
    </div>
@endsection