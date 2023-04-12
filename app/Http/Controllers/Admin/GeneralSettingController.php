<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $generals = GeneralSetting::all();
        return view('admin.general.index', compact('generals'));
    }

    public function edit($id)
    {   
        $data = GeneralSetting::findOrFail($id);
        return view('admin.general.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = GeneralSetting::where('id',$id)->first();
        if($data->type == 'file'){
            if(!empty($request->generalSetting)){
                if(!empty($data->value)){
                    if($request->hasFile('generalSetting')) {
                        unlink(public_path('/img/logo/'.$data->value));
                    }

                    // Upload Image 
                    $file = $request->generalSetting;
                    $value = time().'_'.$file->getClientOriginalName();
                    $path = public_path('img/logo');
                    $file->move($path, $value);
                }

            }else{
                $value = $data->value;
            }
        }elseif($data->type == 'integer' || $data->type == 'string' || $data->type == 'date' || $data->type == 'lang'){
            $value = $request->generalSetting;
        }elseif($data->type == 'array' || $data->type == 'array_checkbox'){
            $value = json_encode($request->generalSetting);
        }else{
            return redirect()->route('GeneralSettingList')->with('error','Something Wrong');
        }
        if($data->name == 'Share Facebook' || $data->name == 'Share Viber' || $data->name == 'Share Telegram'){
            $data->status = $request->status;
            
        }
        $data->update(['value'=>$value]);
        return redirect()->route('generalIndex')->with('success','Upload Successfully');
    }
}
