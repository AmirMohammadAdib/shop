<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingContent;

class TrainingController extends Controller
{
    public function index(){
    header('Access-Control-Allow-Origin: *');
        $trainings = Training::all();
        foreach($trainings as $training){
            unset($training->created_at);
            unset($training->updated_at);
            unset($training->deleted_at);
            
            $contents = TrainingContent::where("training_id", $training->id)->get();

            $training->total = count(TrainingContent::where("training_id", $training->id)->get());
            foreach($contents as $content){
                unset($content->created_at);
                unset($content->updated_at);
                unset($content->deleted_at);
                if($content->picture[0] != "/"){
                    $content->picture = substr($content->picture, 6);   
                }
            }
            
            $training->icon = "/" . substr($training->icon, 7);   
            $training->total_dns_content = count(TrainingContent::where("training_id", $training->id)->where("type", "dns")->get());
            $training->total_ping_content = count(TrainingContent::where("training_id", $training->id)->where("type", "Ping reduction service")->get());
            $training['data'] = $contents;
        }
        echo json_encode($trainings);
    }
}
