<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class loginController extends Controller
{
    public function login(Request $request){
      $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        
    ]);
              $user = User::where('email',$request->email)->first();//get the admin info
    
            if (!Hash::check($request->password , $user->password)) { //compare insert pass and databse pass if not 
                
              return response(['message'=>"you Cannot Login ,please check your email and password!"],401);

              }


            $token = $user->CreateToken($user->name);
            return response()->json(["token"=>$token->plainTextToken,"user"=>$user]);

     }

     public function logout(Request $request){

       auth()->user()->tokens()->delete();
      return [
          'message' => 'user logged out'
      ];
     }
}
