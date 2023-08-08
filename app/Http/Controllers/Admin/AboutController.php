<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;

class AboutController extends Controller
{
    public function index(){
     return AboutResource::collection(About::first()->get());
    }
    
    public function store(Request $request){
        $request->validate([
            'mission'=>'required|max:400',
            'vision'=>'required|max:400',
            'goal'=>'required|max:400',
            
        ]);
        $about=About::first();
        if($about)
        { 
            $about->update([
            'mission' => $request->mission,
            'vision' => $request->vision,
            'goal' => $request->goal
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'about record updated successfully'
        ]);
        }
        else{
            About::create([
                'mission' => $request->mission,
                'vision' => $request->vision,
                'goal' => $request->goal
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'about record created successfully'
            ]);

        }
       
           
    }
}
