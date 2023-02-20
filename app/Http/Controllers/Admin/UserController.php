<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
      $users = User::orderBy("id", "desc")->get();
      return view("admin.users.index", compact("users"));
    }
    
    public function changeStatus($user_id){
      $user = User::find($user_id);
      if($user->status == "enable"){
        $user->status = "disable";
      }else{
        $user->status = "enable";
      }
      $user->save();
      return back();
    }
}
