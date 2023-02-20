<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CrossingSanctions;
use App\Models\CrossingSanctionsService;
use App\Models\Score;
use App\Models\View;
use App\Models\UrlService;

class ServiceController extends Controller
{
    public function index()
    { 
        $view = View::find(1);
        $view->visit_site = $view->visit_site + 1;
        $view->save();
        
        if(isset($_GET["q"])){
          $services = Service::where("name", "LIKE", "%" . $_GET['q'] . "%")->orderBy("sort", "desc")->paginate(16);
          if(count($services) == 0){
            $link = UrlService::where("url", toUrl($_GET['q']))->get();
            if(count($link) != 0){
              $link = $link[0];
              $services = Service::where("id", $link->service_id)->paginate(16);
            }
            
          }
        }else{
          $services = Service::orderBy("sort", "desc")->paginate(16);
        } 
        
        foreach($services as $service){
            if($service->special_level == 0){
                $service->special_level = false;
            }else{
                $service->special_level = true;
            }

            $crossing_name = []; 
            $crossings = CrossingSanctionsService::where("service_id", $service->id)->get();
            foreach($crossings as $crossing){
                $crossing_array = CrossingSanctions::find($crossing->crossing_id);
                unset($crossing_array->id);
                unset($crossing_array->created_at); 
                unset($crossing_array->updated_at);
                unset($crossing_array->deleted_at);

                array_push($crossing_name, $crossing_array);
            }

            $service->crossing = $crossing_name;
            unset($service->created_at);
            unset($service->updated_at);
            unset($service->deleted_at);
            
            //score
            $scores = Score::where("service_id", $service->id)->get();
            $values = 0;
            foreach($scores as $score){
              $values += intval($score->value);
            }
            if(count($scores) != 0){
                $service->score = $values / count($scores);
            }
            
            //score status
            $current_score = Score::where("user_ip", ip())->where("service_id", $service->id)->get();
            if(count($current_score) == 0){
               $service->score_status = false;     
            }else{
              $service->score_status = true;     
            }
        }
        echo json_encode($services);
    }

    public function search(){
        $query = $_GET['q'];
        $services = Service::where("name", "LIKE", "%" . $query . "%")->paginate(16);
        foreach($services as $service){
            if($service->special_level == 0){
                $service->special_level = false;
            }else{
                $service->special_level = true;
            }

            $crossing_name = [];
            $crossings = CrossingSanctionsService::where("service_id", $service->id)->get();
            foreach($crossings as $crossing){
                $crossing_array = CrossingSanctions::find($crossing->crossing_id);
                unset($crossing_array->id);
                unset($crossing_array->created_at);
                unset($crossing_array->updated_at);
                unset($crossing_array->deleted_at);

                array_push($crossing_name, $crossing_array);
            }

            $service->crossing = $crossing_name;
            unset($service->created_at);
            unset($service->updated_at);
            unset($service->deleted_at);
            
            //score
            $scores = Score::where("service_id", $service->id)->get();
            $values = 0;
            foreach($scores as $score){
              $values += intval($score->value);
            }
            if(count($scores) != 0){
                $service->score = $values / count($scores);
            }
        }
        echo json_encode($services);
    }
    
    public function all(){
        $services = Service::orderBy("special_level", "desc")->get();
        foreach($services as $service){
            if($service->special_level == 0){
                $service->special_level = false;
            }else{
                $service->special_level = true;
            }

            $crossing_name = [];
            $crossings = CrossingSanctionsService::where("service_id", $service->id)->get();
            foreach($crossings as $crossing){
                $crossing_array = CrossingSanctions::find($crossing->crossing_id);
                unset($crossing_array->id);
                unset($crossing_array->created_at);
                unset($crossing_array->updated_at);
                unset($crossing_array->deleted_at);

                array_push($crossing_name, $crossing_array);
            }

            $service->crossing = $crossing_name;
            unset($service->created_at);
            unset($service->updated_at);
            unset($service->deleted_at);
            
            //score
            $scores = Score::where("service_id", $service->id)->get();
            $values = 0;
            foreach($scores as $score){
              $values += intval($score->value);
            }
            if(count($scores) != 0){
                $service->score = $values / count($scores);
            }
        }
        echo json_encode($services);
    }
}
