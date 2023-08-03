<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;

class AboutController extends Controller
{
    public function index(){
     return About::first();
    }
    public function store(Request $request){
        $request->validate([
            'description'=>'required|max:255',
            'image' =>'nullable|mimes:png,jpg,jpeg',
        ]);
        $about=About::first();
         if($request->hasfile('image')){
                if ($about->image && file_exists(public_path($about->image))) {
                    unlink(public_path($about->image));
                }
                $img_name=time()."_".$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('about'),$img_name);      
            }
            $about->update([
                'description' => $request->description,
                'image' => $request->file('image') ? 'about/'.$img_name : $about->image,
            ]);
    }
}
