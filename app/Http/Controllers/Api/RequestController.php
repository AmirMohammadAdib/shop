<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestUser;

class RequestController extends Controller
{
    public function view(){
      return view("test");
    }
    public function create(){
      $body = $_POST['request'];

      if($body != null){
        $data = [
          "request" => $body,
          "service_name" => $_POST["service_name"],
          "user_ip" => ip(),
        ];
        
        RequestUser::create($data);
        echo "['Data added']";
      }else{
        echo "['Please Writer Your Request']";
      }
    }
}