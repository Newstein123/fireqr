@extends('frontend.layouts.app')
@section('title', 'Product Gallery View')
@section('content')
    <div class="container-fluid bg-info p-3 mt-3">
        <div class="row text-center">
            <div class="col-md-6">
                <h3> Products </h3>
            </div>
            <div class="col-md-6">
                <p><span class="text-danger"> ပင်မစာမျက်နှာ </span> All Products </p> 
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            @php
                $image = json_decode($product->image);
            @endphp
            <div class="col-md-3">
                <div class="card my-2">
                    @if (count($image) > 0)
                        <img class="card-img-top" src="{{asset('img/fire_vehicles/'.$image[0])}}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title"> {{$product->name}}</h5>
                      <p class="card-text"> {{$product->type}} </p>
                      <a href="{{route('productDetail', $product->id)}}" class="btn btn-secondary btn-sm"> More Detail </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$products->links()}}
    </div>
@endsection