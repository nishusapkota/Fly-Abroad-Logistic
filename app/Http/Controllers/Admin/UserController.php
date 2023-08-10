<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user();
            // dd($user); 
            $token =  $user->createToken('MyApp')->accessToken; 
            // dd($success['token']->token);
            return response()->json(['token' => $token]); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function logout(){
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => "You are logged out.."
        ]);

    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return response()->json([
            'status' => 200,
            'message' => 'User Created Successfully..'
        ]);    
    }

    public function destroy($id){
        try{
            $user=User::findOrFail($id);
            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'User Record Not Found...'
            ]);
        }catch(ModelNotFoundException $exception){
            return response()->json([
                'status' => 200,
                'message' => 'User Record Not Found...'
            ]);
        }
       
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable'
        ]);

        try{
            $user=User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'User Record Updated Successfully'
            ]);
        }
        catch(ModelNotFoundException $exception){
            return response()->json([
                'status' => 200,
                'message' => 'User Record Not Found...'
            ]); 
        }
    }


   public function index(){
        return response()->json([
            'status' => 200,
            'data' => UserResource::collection(User::all())
        ]);
    }

}
