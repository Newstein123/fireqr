@extends('admin.layouts.app')
@section('title', 'Edit General Setting')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Setting </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href=""> Setting </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('generalIndex') }}"> General Setting </a>
            </li>
            <li class="breadcrumb-item active">
                <a> Edit  </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{ route('generalIndex') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <form action="{{route('generalUpdate', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
               {{-- name / value --}}
                <div class="ibox ">
                   <div class="ibox-title">
                       <h5>{{ $data->name }}</h5>
                   </div>
                   <div class="ibox-content">
                       <div class="form-group  row">
                           <div class="col-sm-12">
                               <?php if($data->type == 'integer'){ ?>
                                   <input type="number" name="generalSetting"  class="form-control" value="{{ $data->value }}" placeholder="eg:1,2,3,..." min="1">
    
                               <?php } elseif($data->type == 'date'){ ?>
                                   <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                       <input class="form-check-input" type="radio" id="inlineRadio1" value="d/m/Y" name="generalSetting" {{ ($data->value == 'd/m/Y')? 'checked' : '' }}>
                                   <label class="form-check-label" for="inlineRadio1">{{ date('d/m/Y') }}</label>
                                   </div>
                                   <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                       <input class="form-check-input" type="radio" id="inlineRadio2" value="d-m-Y" name="generalSetting" {{ ($data->value == 'd-m-Y')? 'checked' : '' }}>
                                       <label class="form-check-label" for="inlineRadio2">{{ date('d-m-Y') }}</label>
                                   </div>
                                   <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                       <input class="form-check-input" type="radio" id="inlineRadio3" value="d-m-Y h:i a" name="generalSetting" {{ ($data->value == 'd-m-Y h:i a')? 'checked' : '' }}>
                                       <label class="form-check-label" for="inlineRadio3">{{ date('d-m-Y h:i a') }}</label>
                                   </div>
                                   <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                       <input class="form-check-input" type="radio" id="inlineRadio4" value="d/m/Y h:i a" name="generalSetting" {{ ($data->value == 'd/m/Y h:i a')? 'checked' : '' }}>
                                       <label class="form-check-label" for="inlineRadio4">{{ date('d/m/Y h:i a') }}</label>
                                   </div>
                                   <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                       <input class="form-check-input" type="radio" id="inlineRadio5" value="d M Y" name="generalSetting" {{ ($data->value == 'd M Y')? 'checked' : '' }}>
                                       <label class="form-check-label" for="inlineRadio5">{{ date('d M Y') }}</label>
                                   </div>
                                   <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                       <input class="form-check-input" type="radio" id="inlineRadio6" value="l jS F Y" name="generalSetting" {{ ($data->value == 'l jS F Y')? 'checked' : '' }}>
                                       <label class="form-check-label" for="inlineRadio6">{{ date('l jS F Y') }}</label>
                                   </div>
    
                               <?php }elseif($data->type == 'string'){ ?>
                                   <input type="text" name="generalSetting"  class="form-control" value="{{ $data->value }}">
                               <!--start Share enable or disable-->
                                   @if($data->name == 'Share Viber' || $data->name == 'Share Telegram' || $data->name == 'Share Facebook')
                                       <div class="ibox ">
                                           <div class="ibox-title">
                                               <h5>Status</h5>
                                           </div>
                                           <div class="ibox-content">
                                               <div class="form-group  row">
                                                   <div class="col-sm-12">
                                                       <select name="status" id="" class="form-check">
                                                           <option value="1" {{$data->status == 1 ? "selected" :''}}>Enabled</option>
                                                           <option value="0" {{$data->status == 0 ?"selected" : ''}}>Disabled</option>
                   
                                                       </select>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   @endif
                               <!--end Share enable or disable-->
                               <?php }elseif($data->type == 'lang'){  ?>
                               <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                   <input class="form-check-input" type="radio" id="inlineRadio4" value="mm" name="generalSetting" {{ ($data->value == 'mm')? 'checked' : '' }}>
                                   <label class="form-check-label" for="inlineRadio4">Myanmar</label>
                               </div>
                               <div class="form-check abc-radio abc-radio-primary form-check-inline">
                                   <input class="form-check-input" type="radio" id="inlineRadio5" value="en" name="generalSetting" {{ ($data->value == 'en')? 'checked' : '' }}>
                                   <label class="form-check-label" for="inlineRadio5">English</label>
                               </div>
    
                               <?php }elseif($data->type == 'file'){ ?>
                                   @if ($data->name == 'qr-logo')
                                   <img src="{{asset(asset('img/logo/'.generalSetting('qr-logo')))}}" 
                                   class="img-fluid w-25 mb-2" id="preview_image_before_upload">  
                                   @else 
                                    <img src="{{asset('img/logo/'.generalSetting('logo'))}}" 
                                    class="img-fluid w-25 mb-2" id="preview_image_before_upload">
                                   @endif
                                   <input type="file" name="generalSetting" class="form-control @error('cover') is-invalid @enderror"  upload="cover" id="fileInput">
                               <?php }elseif($data->type == 'array'){ ?>
                                   <?php $socail_icon_list = json_decode($data->value,true);?>
                                       <?php foreach ($socail_icon_list as $key => $val){ ?>
                                               <div class="form-check">    
                                                   <input class="form-check-input social_checkbox" type="checkbox" id="{{ $key }}" value="{{ $key }} "
                                                   <?php echo($val != '')?'checked':'' ?>>
                                                   <label class="form-checkey-label" for="{{ $key }}">
                                                   <?php echo(str_replace('social_',' ',$key)) ?>
                                                   </label>
                                                   <input type="text" class="form-control input-sm m-2 <?php echo ($val == '')?'d-none':'' ?>" 
                                                   name="generalSetting[{{ $key }}]" placeholder="Enter social link" value="{{ $val }}">
                                               </div><hr>                                                   
                                       <?php } ?>
                              <?php }elseif($data->type == 'array_checkbox') {?>
                                   <?php $share_icon_list = json_decode($data->value,true);?>
                                   <div class="form-check  form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="facebook" value="facebook" name="generalSetting[]"
                                       <?php echo(in_array('facebook',$share_icon_list)?'checked':''); ?>>
                                       <label class="form-check-label" for="facebook"> facebook </label>
                                   </div>
                                   <div class="form-check  form-check-inline" >
                                       <input class="form-check-input" type="checkbox" id="twitter" value="twitter" name="generalSetting[]"
                                       <?php echo(in_array('twitter',$share_icon_list)?'checked':''); ?>>
                                       <label class="form-check-label" for="twitter"> twitter </label>
                                   </div>
                                   <div class="form-check  form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="telegarm" value="telegarm" name="generalSetting[]"
                                       <?php echo(in_array('telegarm',$share_icon_list)?'checked':''); ?>>
                                       <label class="form-check-label" for="telegarm"> telegarm </label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="viber" value="viber" name="generalSetting[]"
                                       <?php echo(in_array('mail',$share_icon_list)?'checked':''); ?>>
                                       <label class="form-check-label" for="viber"> viber </label>
                                   </div>
                              <?php } ?>
                           </div>
                       </div>     
                    </div>
                </div>
            </div> 
            <div class="col-md-12">
                <button type="submit" class="btn btn-secondary btn-sm"> သိမ်းမည် </button>
            </div>
        </div> 
    </form>
</div>
@endsection