<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FreightRequest;
use App\Http\Resources\FreightResource;
use App\Models\Freight;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class FreightController extends Controller
{
    public function store(FreightRequest $request){
        Freight::create([
            'freight_name' => $request->freight_name,
            'dim_factor' => $request->dim_factor,
            'weight_wise_rate' => $request->weight_wise_rate,
            'dimension_wise_rate' => $request->dimension_wise_rate
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'freight created successfully'
        ]);
    }

    public function index(){
        return response()->json([
            'status' => 200,
            'data' => FreightResource::collection(Freight::all())
        ]);
    }

    public function update(FreightRequest $request,$id){
       
        try{
            $freight = Freight::findOrFail($id);
            $freight->update([
                'freight_name' => $request->freight_name,
                'dim_factor' => $request->dim_factor,
                'weight_wise_rate' => $request->weight_wise_rate,
                'dimension_wise_rate' => $request->dimension_wise_rate,
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Freight updated successfully'
            ]);
        }catch(ModelNotFoundException $exception){
            return response()->json([
                'status' => 200,
                'message' => 'Freight Record Not Available..'
            ]);
        }
    }

    public function destroy($id){
       
        try{
            $freight = Freight::findOrFail($id);
            $freight->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Freight deleted successfully'
            ]);
        }catch(ModelNotFoundException $exception){
            return response()->json([
                'status' => 200,
                'message' => 'Freight Record Not Available..'
            ]);
        }
    }
}
