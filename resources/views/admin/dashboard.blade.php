@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right"> Today </span>
                </div>
                <h5>Scan </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">40 886,200</h1>
                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                <small>Total scans</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> Monthly </span>
                </div>
                <h5> Products </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">275,800</h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small> Total Products </small>
            </div>
        </div>
    </div>
</div>
</div>
@endsection