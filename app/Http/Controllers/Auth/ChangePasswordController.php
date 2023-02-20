<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController
{
  public function change(){
    $data = request()->validate([
        "email" => "email|required",
        "password" => "required",
        "new_password" => "required|min:6",
        "confirm_password" => "required|min:6",
    ]);
    if(Auth::attempt(['email' => $data['email'], "password" => $data['password']])){
    
      if($data['new_password'] == $data['confirm_password']){
        $user = User::where("email", $data['email'])->first();
        $user->password = Hash::make($data['new_password']);
        $user->save();
        CallAPI("get", "185.11.89.102:5555/changePw/" . $user->name . "/" . $data['new_password']);
        return response()->json([
          'isSuccess' => true,
          "message" => "Password changed",
          "result" => ["email" => $data['email'], "new_password" => $data["new_password"]],
          "statusCode" => 200,
        ]);
      }else{
        return response()->json([
          'isSuccess' => false,
          "statusCode" => 401,
          "message" => "Email is not the same as confirmation",
          'result' => ["email" => $data['new_password'], "password" => $data['confirm_password']],
        ]);      
      }
    
    }else{
      return response()->json([
        'isSuccess' => false,
        "statusCode" => 401,
        "message" => "email or password is mistake",
        'result' => ["email" => $data['email'], "password" => $data['password']],
      ]);
    }
  }
}
