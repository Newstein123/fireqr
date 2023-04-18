@extends('admin.layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Product  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Product</a>
            </li>
            <li class="breadcrumb-item active">
                <a>Edit </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{url()->previous()}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Add New Product </h5>
            </div>
        </div>
        <div class="ibox-content">
            <form action="{{route('productUpdate', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> ပစ္စည်းအမည် </label>
                        <input type="name" name="name" class="form-control mt-2" value="{{$product->name}}">
                        @error('name')
                            <p class="text-danger my-2"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="company_name" class="font-weight-bold"> ကုမ္ပဏီအမည်  </label>
                        <input type="text" name="company_name" class="form-control mt-2" value="{{$product->company_name}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> ပစ္စည်းမော်ဒယ်နံပါတ် </label>
                        <input type="text" name="model_no" class="form-control mt-2" value="{{$product->model_no}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> စတင်သုံးစွဲသည့်ရက်စွဲ </label>
                        <input type="date" name="start_date" class="form-control mt-2" value="{{$product->start_date}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> အသေးစိတ် </label>
                        <textarea type="date" name="detail" class="form-control mt-2"> {{$product->description}} </textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> ပစ္စည်းအမျိုးအစား </label>
                        <input type="name" name="type" class="form-control mt-2" value="{{$product->type}}">
                        @error('type')
                            <p class="text-danger my-2"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> ထုတ်လုပ်သည့်နိုင်ငံ </label>
                        <input type="text" name="country" id="" class="form-control" value="{{$product->country}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> ထုတ်လုပ်သည့်ခုနှစ် </label>
                        <input type="text" name="manufactured_year" class="form-control mt-2" value="{{$product->manufactured_year ? date('Y', strtotime($product->manufactured_year)) : ''}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> အသုံးဝင်ပုံ </label>
                        <input type="text" name="usage" class="form-control mt-2" value="{{$product->usage}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="name" class="font-weight-bold"> ဓာတ်ပုံ </label>
                        <div id="previewImages">
                            @foreach (json_decode($product->image) as $image)
                                <img src="{{ asset('img/fire_vehicles/'.$image) }}" alt="" class="w-25">
                            @endforeach
                        </div>
                        <input type="file" name="images[]" class="form-control mt-2" id="fileInput" accept="image/*" multiple>
                        @error('images')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 float-right">
                    <button type="submit" class="btn btn-secondary btn-sm"> သိမ်းမည်</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection