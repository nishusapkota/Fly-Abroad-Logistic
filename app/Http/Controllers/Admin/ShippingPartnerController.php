<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ShippingPartner;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingPartnerRequest;
use App\Http\Resources\ShippingPartnerResource;

class ShippingPartnerController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 200,
            'data' => ShippingPartnerResource::collection(ShippingPartner::all())
        ]);
    }

    public function store(ShippingPartnerRequest $request){
        ShippingPartner::create([
            'shipping_partner' => $request->shipping_partner,
            'shipping_tracking_id' => $request->shipping_tracking_id,
            'tracking_url' => $request->tracking_url,
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Shipping Partner created successfully..'
        ]);
    }

    public function update(ShippingPartnerRequest $request, $id){
        $shipping_partner=ShippingPartner::find($id);
        if($shipping_partner){
            $shipping_partner->update([
                'shipping_partner' => $request->shipping_partner,
                'shipping_tracking_id' => $request->shipping_tracking_id,
                'tracking_url' => $request->tracking_url,
            ]);
            return response()->json([
                'status' => 200,
                'message' =>" Record updated successfully..."
            ]);
        }
        else{
            return response()->json([
                'status' => 200,
                'message' =>" Record not found..."
            ]); 
        }
    }

    public function destroy($id){
        $shipping_partner=ShippingPartner::find($id);
        if($shipping_partner){
            $shipping_partner->delete();
            return response()->json([
                'status' => 200,
                'message' =>" Record deleted successfully..."
            ]);
        }
        else{
            return response()->json([
                'status' => 200,
                'message' =>" Record not found..."
            ]); 
        }
    }
}
