<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Myanmar Daily Time | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Extra,Natural,blog,Food,Drink,Culture,Technology" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<!-- Bootstrap --> 
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/all.min.css')}}">
</head>
<body>
	<div class="container-fluid mx-auto my-auto">
		<div class="row login-heading mt-3">
			<div class="col-md-12">
				<a href="{{('/')}}"><img src="frontend\images\website-logo.png" class="img-fluid w-50 d-lg-none d-xl-none d-md-block d-sm-block d-xs-block mx-auto"></a>
				<a href="{{('/')}}"><img src="frontend\images\website-logo.png" class="img-fluid  w-25 d-none d-lg-block d-xs-block mx-auto"></a>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12">
				<h5 class="text-center">ADMIN-Register</h5>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12">
				<form method="POST" action="{{ route('register') }}" class="user">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user-profile" class="col-md-4 col-form-label text-md-right">{{ __('User Profile') }}</label>

                            <div class="col-md-4">
                                <input id="user-profile" type="file" class="form-control" name="user-profile" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-7">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
			</div>
		</div>
	</div>
<!-- Bootstrap -->
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<!--Custom Style JS-->
<script type="text/javascript" src="{{asset('frontend/js/style.js')}}"></script>
</body>
</html>