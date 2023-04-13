@extends('frontend.layouts.app')
@section('title', 'Login Page')
@section('content')
<div class="row justify-content-center vh-100">
    <div class="col-sm-12 col-md-8 col-lg-4 w-50">
      {{-- Login Header  --}}
     <div class="mt-3 text-center ">
            <img src="{{ asset('img/logo/'.generalSetting('logo')) }}" alt="" class="img-fluid rounded-circle w-25">
             <h5 class="font-weight-bold"> QR Code System </h5>
     </div>
     <div class="col-md-12">
         <form method="POST" action="{{ route('login') }}">
           @csrf
           @if(session('error'))
               <div class="alert alert-danger">
                   {{session('error')}}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
               </div>
           @endif
           <div class="form-group row my-3">
               <div class="">
                   @if (session('message'))
                       <div class="alert alert-danger">
                           <p class="p-2 my-2"> {{ session('message') }}</p>
                       </div>
                   @endif
               </div>
           </div>
           <div class="form-group my-3">
               <div class="">
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" placeholder="E-mail Address" required >
                       @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
               </div>
           </div>
           <div class="form-group my-3">
               <div class="">
                   <input id="login_password" type="password" class="form-control 
                   @error('password') is-invalid @enderror" name="password" placeholder="Password" required >
                       @error('password')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
               </div>
           </div>
           <div class="form-group my-3">                   
                <button type="submit" class="btn btn-dark btn-sm w-100" >
                    Login
                </button>
           </div> 
       </form>
     </div>
    </div>
 </div>
 <script>
    $('#login_pwd').on('click', function() {
        var type = $('#login_password').attr('type');
        if (type === 'password') {
            $('#login_password').attr('type', 'text');
        } else {
            $('#login_password').attr('type', 'password');
        }
    })
</script>
@endsection
