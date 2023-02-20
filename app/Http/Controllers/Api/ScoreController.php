<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;


class ScoreController extends Controller
{
    public function create($service_id){
        if(empty($_POST)){
            echo "['Please enter the requested items']";
            exit;
        }
          
        $now_score = Score::where("user_ip", ip())->where("service_id", $service_id)->get();
        
        if(count($now_score) == 0){    
            $data = [
                "service_id" => $service_id,
                "value" => $_POST['value'],
                "user_ip" => ip(),
            ];
            Score::create($data);
            echo "['Data added']";
        }else{
            echo "['You cannot rate']";
            exit;
        }
    }
}
