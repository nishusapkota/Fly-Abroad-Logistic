<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        return response()->json([
            'status' => 200,
            'data' => ServiceResource::collection(Service::all())
        ]);
    }

    public function changeStatus($id) {
            $service =Service::findOrFail($id);
            if($service->visibility == 1){
                $service->update([
                    'visibility' => 0
                ]);
            }else{
                $service->update([
                    'visibility' => 1
                ]);
            }     
    }
   

    public function store(StoreServiceRequest $request)
    {
        $img_name = time()."_".$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('service'),$img_name);
        Service::create([
            'heading' => $request->heading,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => 'service/' .$img_name,
            // 'visibility' => $request->visibility ? '1' : '0'
        ]);
        return response()->json([
            'status' => 200,
            'message' =>'Service created successfully'
        ]);
        
        
    }

   


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request,$id)
    {
        $service = Service::find($id);
        if($service){

            if(isset($request->image)){
                unlink(public_path($service->image));
                $img_name = time()."_".$request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('service'),$img_name);
                $service['image'] = 'service/'. $img_name;
            }

            $service->update([
                'heading' => $request->heading,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                // 'visibility' => $request->visibility ? '1' : '0'
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'record updated successfully'
            ]);   

        }
        else{
            return response()->json([
                'status' => 200,
                'message' => 'record not available'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if($service){
            unlink(public_path($service->image));
            $service->delete();
            return response()->json([
                'status' => 200,
                'message' => 'record deleted successfully'
            ]);
    
        }
        else{
            return response()->json([
                'status' => 200,
                'message' => 'record not available'
            ]);
        }
        
    
    }
}
