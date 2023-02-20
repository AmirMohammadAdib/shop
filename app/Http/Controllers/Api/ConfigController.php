<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CkeckManagment;
use App\Models\ConfigManagment;

class ConfigController extends Controller
{
    public function index(){
      if(!isset($_GET['token'])){
        return response()->json([
            'isSuccess' => false,
            "message" => "Token not exist",
            "result" => [],
            "statusCode" => 401,
        ]);
        exit;
      }
      
      $token = $_GET['token'];
      $allow = CkeckManagment::where("token", $token)->get();
      
      if(count($allow) != 1){
        return response()->json([
            'isSuccess' => false,
            "message" => "Foribiden",
            "result" => ["username" => "", "password" => "", "result" => ""],
            "statusCode" => 403,
        ]);
        exit;
      }
      
      if($allow[0]->device == 0){
        return response()->json([
            'isSuccess' => false,
            "message" => "Foribiden",
            "result" => ["username" => "", "password" => "", "result" => ""],
            "statusCode" => 403,
        ]);
        exit;
      }
      
      $user = \App\Models\User::find($allow[0]->user_id);
      //ConfigManagment::create(["token" => $token]);
      $config_data = 'https://data.anti403.ir/app/pc/win/pr/Encrypted.txt';

      $password = json_decode(CallAPI("get", "http://185.11.89.102:1258/getPlainPassword/" . $user->name))->result;
      echo json_encode(["username" => $user->name, "password" => $password, "result" => $config_data]);
    }
}