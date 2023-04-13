<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ generalSetting('title') }}  | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{asset('img/logo/'.generalSetting('logo'))}}" type="image/jpg">
    <link rel="stylesheet" href="{{asset('/css/plugins/splide/splide.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
</head>
<body>
@include('frontend.layouts.parts.header')
<div class="container">
    @yield('content')
</div>
@include('frontend.layouts.parts.footer')
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('/js/plugins/splide/splide.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>