@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Scan </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{$scan_count}} </h1>
                <small>Total scans</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Products </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{$product_count}} </h1>
                <small> Total Products </small>
            </div>
        </div>
    </div>
</div>
</div>
@endsection