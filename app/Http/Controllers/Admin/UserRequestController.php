<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestUser;

class UserRequestController extends Controller
{
  public function index(){
    $requests =  RequestUser::where("show_status", 0)->get();
    return view("admin.request.index", compact("requests"));
  }
  public function change($id){
    $request = RequestUser::find($id);
    $request->show_status = 1;
    $request->save();
    return back();
  }   
}
