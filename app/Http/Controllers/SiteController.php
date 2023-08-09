<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQueryRequest;
use App\Http\Resources\QueryResource;
use App\Models\Query;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function store(StoreQueryRequest $request){
        Query::create([
            'full_name' => $request->full_name,
            'contact' => $request->contact,
            'email' => $request->email,
             'message' => $request->message
        ]);
        return response()->json([
            'status' => 200,
            'message' =>"Your query has been submitted successfully.."
        ]);
    }

    public function index() {
        return response()->json([
            'status' => 200,
            'data' => QueryResource::collection(Query::all())
        ]);
    }

}
