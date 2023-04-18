@extends('admin.layouts.app')
@section('title', 'User Details')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Account Setting  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"> Setting </a>
            </li>
            <li class="breadcrumb-item">
                <a> Account </a>
            </li>
            <li class="breadcrumb-item active">
                <a> Detail </a>
            </li>
        </ol>
    </div>
    @can('edit account setting')
        <div class="col-md-2 mt-4">
            <a href="{{ route('accountEdit', auth()->id()) }}" class="btn btn-secondary btn-sm"><i class="fa fa-edit mr-2" aria-hidden="true"></i> Edit Profile </a>
        </div>
    @endcan
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> User Detail </h5>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive my-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td> အမည် </td>
                            <td> {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td> Email </td>
                            <td> {{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td> Role </td>
                            <td> 
                                @foreach ($user->getRoleNames() as $role)
                                    {{$role}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td> Status  </td>
                            <td> {{$user->status == 0 ? 'Active' : 'Banned'}} </td>
                        </tr>
                        <tr>
                            <td> စတင်အသုံးပြုသည့်ရက်စွဲ  </td>
                            <td> {{ $user->created_at->toFormattedDateString() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection