<?php

namespace App\Http\Controllers\Admin;

use COM;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 200,
            'data' => CustomerResource::collection(Customer::all())
        ]);
    }


    public function store(CustomerRequest $request){
        Customer::create([
        'sender_name' => $request->sender_name,
        'sender_contact' => $request->sender_contact,
        'sender_country' => $request->sender_country,
        'sender_state' => $request->sender_state,
        'sender_city' => $request->sender_city,
        'sender_zip' => $request->sender_zip,
        'sender_address' => $request->sender_address,

        'receiver_name' => $request->receiver_name,
        'receiver_contact' => $request->receiver_contact,
        'receiver_country' => $request->receiver_country,
        'receiver_state' => $request->receiver_state,
        'receiver_city' => $request->receiver_city,
        'receiver_zip' => $request->receiver_zip,
        'receiver_address' => $request->receiver_address,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Customer created..'
        ]);
    }

    public function destroy($id) {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Customer deleted successfully.'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return response()->json([
                'status' => 404,
                'message' => 'Customer not found.'
            ], 404);
        } catch (\Exception $exception) {
            // Handle other unexpected exceptions
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while deleting the customer.'
            ], 500);
        }
    }
    

    public function update(CustomerRequest $request,$id){
        try{
        $customer = Customer::findOrFail($id);
         $customer->update([
        'sender_name' => $request->sender_name,
        'sender_contact' => $request->sender_contact,
        'sender_country' => $request->sender_country,
        'sender_state' => $request->sender_state,
        'sender_city' => $request->sender_city,
        'sender_zip' => $request->sender_zip,
        'sender_address' => $request->sender_address,
        'receiver_name' => $request->receiver_name,
        'receiver_contact' => $request->receiver_contact,
        'receiver_country' => $request->receiver_country,
        'receiver_state' => $request->receiver_state,
        'receiver_city' => $request->receiver_city,
        'receiver_zip' => $request->receiver_zip,
        'receiver_address' => $request->receiver_address,
            ]);
        return response()->json([
            'status' => 200,
            'message' => 'Customer updated successfully..'
        ]);
    }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return response()->json([
            'status' => 404,
            'message' => 'Customer not found..'
        ]);
    }
    
    }
}
