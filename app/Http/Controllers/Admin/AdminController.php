<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
        if(session("user") != Null){
            $user = User::find(session("user"));
            return redirect("/dashboard");
            exit;
        }else{
            return redirect("/login")->with("swal-info", "ابتدا وارد حساب خود شوید");
            exit;
        }
    }
}
