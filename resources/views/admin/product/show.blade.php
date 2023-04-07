@extends('admin.layouts.app')
@section('title', 'View Product')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Products  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a>Products</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Product Detail </h5>
                <a href="{{ route('productIndex') }}" class="btn btn-secondary"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="ibox-img">
                <img src="{{asset($product->image)}}" alt="" class="img-fluid w-25">
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
                            <td> {{ $product->manufactured_year }}</td>
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
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->merge('\public\img\logo\logo.jpg')->generate('/product/'.$product->id)) !!} ">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection