<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

    use Illuminate\Foundation\Auth\EmailVerificationRequest;

    use Illuminate\Http\Request;
class VerifyEmailController extends Controller
{
   public function show(Request $request)
    {
        return view('auth.verify-email');
    }
    
    public function verify(EmailVerificationRequest $request)
    {
       $request->fulfill();
       return redirect('/home');   
    }
    

public function notify(Request $request)
{
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
}
}
