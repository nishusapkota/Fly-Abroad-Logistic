<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStat;
use App\Http\Controllers\Controller;
use App\Http\Resources\StatResource;

class StatController extends Controller
{
    public function index(){
        return StatResource::collection(Stat::all());
    }

    public function store(StoreStat $request){
    $stat=Stat::first();
    if($stat){
        $stat->update($request->all());
        return response()->json([
            'status'=>200,
            'message'=>'Record updated successfully...'
        ]);
    }
    else{
        Stat::create($request->all());
        return response()->json([
            'status'=>200,
            'message'=>'Record created successfully...'
        ]);
    }
    }
}
