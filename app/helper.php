<?php

use App\Models\GeneralSetting;
use Intervention\Image\Facades\Image;

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

      return $filename;
    }
