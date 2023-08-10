<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSettingRequest;
use App\Http\Resources\GeneralSettingResource;

class GeneralSettingController extends Controller
{
    public function index(){
        // dd(GeneralSetting::first());
        return GeneralSettingResource::collection(GeneralSetting::first());
    }

    public function store(GeneralSettingRequest $request){
        // dd($request->all());
        $general_setting = GeneralSetting::first();
        // dd($general_setting);
        if($general_setting){
            if(isset($request->login_image)){
                unlink(public_path($general_setting->login_image));
                $img_name=time()."_".$request->file('login_image')->getClientOriginalName();
                $request->login_image->move(public_path('login_image'),$img_name);
                $general_setting['login_image'] = 'login_image/'.$img_name;
            }
            $general_setting->update([
                'about_descs' => $request->about_descs ?: null,
                 'terms_and_condition' => $request->terms_and_condition ?: null,
                 'privacy_policy' =>  $request->privacy_policy ?: null
            ]);
            return response()->json([
                'status' => 200,
                'message' =>' General Setting Updated Successfully...'
            ]);

        }

        else{
            if(isset($request->login_image)){
                $img_name=time()."_".$request->file('login_image')->getClientOriginalName();
                $request->login_image->move(public_path('login_image'),$img_name);
            }
            GeneralSetting::create([
                'about_descs' => $request->about_descs ?: null,
                 'login_image' => $request->login_image ? 'login_image/'.$img_name : null,
                 'terms_and_condition' => $request->terms_and_condition ?: null,
                 'privacy_policy' =>  $request->privacy_policy ?: null
            ]);
            return response()->json([
                'status' => 200,
                'message' =>' General Setting Created Successfully...'
            ]);
        }
    }
}


