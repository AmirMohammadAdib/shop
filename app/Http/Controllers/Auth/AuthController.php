<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Mail\ActiveMail;
use App\Mail\ForgotMail;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\NormalUser;
use App\Models\UserPgSql;
use App\Models\CkeckManagment;


class AuthController
{
    public function register()
    {
        $code = rand(1000, 9999);
        $data = request()->validate([
            "email" => "email|required",
            "name" => "required",
            "password" => "required|min:6",
        ]);



        $past_user = User::where("name", $data['name'])->get();
        if (count($past_user) != 0) {
            $past_user = $past_user[0];
            return response()->json([
                'isSuccess' => false,
                "message" => "Username exists",
                "result" => ["token" => "", "username" => $past_user->name, "status" => $past_user->status],
                "statusCode" => 422,
            ]);
            exit;
        } else {
            $past_user = User::where("email", $data['email'])->get();

            if (count($past_user) != 0) {
                $past_user = $past_user[0];


                if ($past_user->status == "disable") {
                    $data['confrim_code'] = $code;
                    Mail::to($past_user->email)->queue(new ActiveMail($code));
                    $past_user->confrim_code = $code;
                    $past_user->password = Hash::make($data['password']);
                    $past_user->name = $data['name'];
                    $past_user->save();
                    return response()->json([
                        'isSuccess' => true,
                        "message" => "Email confirmation code has been sent",
                        "result" => ["token" => $past_user->createToken("API Token")->plainTextToken],
                        "statusCode" => 200,
                    ]);
                } else {
                    return response()->json([
                        'isSuccess' => false,
                        "message" => "Email exists",
                        "result" => ["token" => "", "username" => $past_user->name, "status" => $past_user->status],
                        "statusCode" => 422,
                    ]);
                }
                exit;
            }
        }


        $data['confrim_code'] = $code;

        Mail::to($data['email'])->queue(new ActiveMail($code));

        //CallAPI("get", "185.11.89.102:5555/addUser/" . $data['name'] . "/" . $data["password"]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return response()->json([
            'isSuccess' => true,
            "message" => "Email confirmation code has been sent",
            "result" => ["token" => $user->createToken("API Token")->plainTextToken],
            "statusCode" => 200,
        ]);
    }

    public function active()
    {
        $data = request()->validate([
            "email" => "email|required",
            "code" => "required",
        ]);

        $user = User::where("email", $data["email"])->where("confrim_code", $data['code'])->get();
        if (count($user) == 0) {
            return response()->json([
                "isSuccess" => false,
                "message" => "Foribidn",
                "result" => ["token" => ""],
                "statusCode" => 403,
            ], 403);
        }

        $user = $user[0];
        CallAPI("get", "185.11.89.102:5555/addUser/" . $user->name . "/" . $user->password);
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->status = "enable";
        $user->save();

        return response()->json([
            'isSuccess' => true,
            "message" => "Welcome",
            "result" => ["token" => $user->createToken("API Token")->plainTextToken, "username" => $user->name, "email" => $user->email],
            "statusCode" => 200,
        ]);
    }

    public function login()
    {
        $data = request()->validate([
            "email" => "required",
            "password" => "required|min:6",
            "name" => "",
        ]);

        $data['name'] = $data['email'];

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            unset($data['name']);
        } else {
            unset($data['email']);
        }

        if (!Auth::attempt($data)) {
            return response()->json([
                "isSuccess" => false,
                "message" => "Email or password is mistake",
                "result" => ["token" => "", "username" => ""],
                "statusCode" => 401,
            ], 401);
        }


        if (Auth::user()->status == "disable") {
            return response()->json([
                "isSuccess" => false,
                "message" => "Please active your account",
                "result" => ["token" => "", "username" => ""],
                "statusCode" => 403,
            ], 403);
        }

        $data = request()->validate([
            "device" => "",
        ]);

        if (empty($data)) {
            $data['device'] = 0;
        }


        $token = Auth::user()->createToken("API Token")->plainTextToken;
        CkeckManagment::create(["token" => $token, "user_ip" => ip(), "status" => "login", "device" => $data['device'], 'user_id' => Auth::user()->id]);

        return response()->json([
            'isSuccess' => true,
            "statusCode" => 200,
            "message" => "you was logined",
            'result' => ["token" => $token, "username" => Auth::user()->name, "email" => Auth::user()->email],
        ]);
    }

    public function forgot()
    {
        //date_default_timezone_set("Asia/Tehran");
        $data = request()->validate([
            "email" => "email|required",
        ]);


        $user = User::where("email", $data['email'])->get();
        if (count($user) == 0) {
            return response()->json([
                'isSuccess' => false,
                "statusCode" => 401,
                "message" => "User not found",
                'result' => ["token" => ""],
            ]);
            exit;
        }
        $user = $user[0];
        $token = $user->createToken("API Token")->plainTextToken;

        $user->forgot_token = $token;
        $user->forgot_token_expire = date("Y-m-d H:i:s", strtotime("+15 minute"));
        $user->save();
        //chamge password side ibsng
        //CallAPI("get", "185.11.89.102:5555/changePw/" . $user->name . "/" . $password);


        //send main
        Mail::to($data['email'])->queue(new ForgotMail($token));

        return response()->json([
            'isSuccess' => true,
            "statusCode" => 200,
            "message" => "Email Forgot Was send",
            'result' => ["token" => $token],
        ]);
    }

    public function reset($token)
    {
        $user = User::where("forgot_token", $token)->get();
        if (count($user) == 0) {
            return response()->json([
                'isSuccess' => false,
                "statusCode" => 401,
                "message" => "Token is mistake",
                'result' => ["token" => $token],
            ]);
            exit;
        }
        $user = $user[0];
        if (date("Y-m-d H:i:s") > $user->forgot_token_expire) {
            return response()->json([
                'isSuccess' => false,
                "statusCode" => 401,
                "message" => "The token has expired",
                'result' => ["token" => $token],
            ]);
            exit;
        } else {
            $new_password = randomPassword();
            $user->password = Hash::make($new_password);
            $user->save();
            //Mail::to($user->email)->queue(new ResetPasswordMail($new_password));
            echo "<h1>Anti 403</h1><br><h5>Your new password: " . $new_password . "</h5>";
        }
    }

    public function logout()
    {
        $data = request()->validate([
            "token" => "required",
        ]);

        $login = CkeckManagment::where("token", $data['token'])->get();
        if (count($login) == 0) {
            return response()->json([
                "isSuccess" => false,
                "message" => "User not found",
                "result" => ["token" => ""],
                "statusCode" => 401,
            ], 401);
        }


        CkeckManagment::create(["token" => $data['token'], "user_ip" => ip(), "status" => "logout", "device" => $login[0]->device, "user_id" => $login[0]->user_id]);
        return response()->json([
            'isSuccess' => true,
            "message" => "you was logout",
            'result' => ["token" => $data['token']],
            "statusCode" => 200,
        ]);
    }
}