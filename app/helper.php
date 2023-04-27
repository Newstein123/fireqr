<?php

use App\Models\GeneralSetting;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

    function generalSetting($name) {
        $setting = GeneralSetting::where('name', $name)->first();
        return $setting->value;
    }

    // getImageUrl 
    function getImageURL($directory,String $image){
      if(isset($image) && ($image != '') && file_exists($directory.$image)){
        return url($directory.$image);
      }elseif(isset($image) && ($image != '') && file_exists('public/'.$directory.$image)){
        return url('public/'.$directory.$image);
      }else{
        return url('frontend/images/default-300x200.png');
      }
    }

    // uploadImage 
    function uploadImage($image, $directory) {
      $filename = time() .'_'.$image->getClientOriginalName();
      $path = public_path($directory);
      $img = Image::make($image->path());
      $img->fit(400,300, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$filename);
      // Storing Original Imgae 
      $image->move(public_path('img/original'), $filename);
      return $filename;
    }

    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$@#&!';
      $randomString = '';
  
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
  
      return $randomString;
    } 

    function storeQrImage($directory, $product_id)
    {
        $qr_img = QrCode::format('png')->size(400)->merge('/public/img/logo/'.generalSetting('qr-logo'))->generate(env('APP_URL').'/product/'.$product_id);
        $qr_filename = time(). '_'.$product_id.'.png';
        Storage::disk('public')->put($directory.$qr_filename, $qr_img);
        return $qr_filename;
    }

  
