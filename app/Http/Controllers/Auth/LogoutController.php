<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;

class LogoutController extends Controller
{
    public function view(Request $request){
      
      Auth::logout();
      return redirect("/login");
    }
}
