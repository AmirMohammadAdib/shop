<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function view()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $inputs = $request->all();
        if ($inputs["name"]  == Null or $inputs['email'] == Null) {
            return back()->with("swal-error", "پر کردن تمامی فیلد ها الزامیست");
            exit;
        } else {
            if (empty($user)) {
                if(strlen($inputs['password']) < 6 OR strlen($inputs['password']) > 12){
                    return back()->with("swal-info", "پسوورد وارد شده باید بین 6 الی 12 کارکتر باشد");
                    exit;
                }else{
                    $inputs['password'] = Hash::make($inputs['password']);
                    $inputs['confrim_code'] = rand(1000, 9999);
                    User::create($inputs);
                    return redirect("/login")->with("swal-confrim-success", "حساب کاربری شما ساخته شد@درانتظار تایید مدیریت");
                    exit;
                }
            } else {
                return back()->with("swal-warning", "ایمیل وارد شده در سایت موجود است");
                exit;
            }
        }
    }
}
