<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SocialMediaResource;

class SocialMediaController extends Controller
{
    public function index(){
        return SocialMediaResource::collection(SocialMedia::all());
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'link'=>'required',
            'status'=>'nullable'
        ]);
        $social_media=SocialMedia::find($id);
        if($social_media){
            $social_media->update([
                'name'=>$request->name,
                'link'=>$request->link,
                'status'=>$request->status
            ]);
            return response()->json([
                'status' => 200,
                'message'=>'succesfully updated ..'
            ]);
        }
        return response()->json([
            'status' => 200,
            'message'=>'Record not available...'
        ]);
        

    }
}
