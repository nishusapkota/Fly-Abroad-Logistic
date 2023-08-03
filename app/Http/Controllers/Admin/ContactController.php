<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::all();
        return response()->json([
            'status' => 200,
            'data' => ContactResource::collection($contact)
        ]);
        
    }
    public function store(StoreContactRequest $request){
        $contact=Contact::first();
        $contact->update([
            'phone' => json_encode($request->phone),
            'email' => json_encode($request->email),
            'location' => $request->location,
            'link' => $request->link  
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Contact updated successfully'
        ]);
    }
}
