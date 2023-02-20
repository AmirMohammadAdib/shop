<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function view()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        if(ip() == '78.157.42.115' OR ip() == '158.11.89.114'){
          $inputs = $request->all();
  
          $user = User::where("email", $request->email)->get();
  
          if (!empty($user->all())) {
              $user = $user[0];
              if (Hash::check($request->password, $user->password)) {
                  if ($user->rule == 1) {
                       auth()->attempt([
                           "email" => $inputs['email'],
                           "password" => $inputs['password'],
                       ]);
                      return redirect("/dashboard")->with("swal-success", "ورود به پنل با موفقیت انجام شد:)");
                  } else {
                      return back()->with("swal-warning", "حساب کاربری شما تایید نشده است");
                      exit;
                  }
              } else {
                  return back()->with("swal-error", "پسوورد وارد شده نامعتبر است");
              }
          } else {
              return back()->with("swal-warning", "ایمیل وارد شده در سایت وجود ندارد");
          }
      }else{
        return back()->with("swal-warning", "ای پی شما دسترسی ورود به سامانه را ندارد");
      }
    }
}
