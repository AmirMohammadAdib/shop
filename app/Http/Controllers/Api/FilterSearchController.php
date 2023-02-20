<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CrossingSanctions;
use App\Models\CrossingSanctionsService;
use App\Models\NameService;
use App\Models\UserSideServices;
use App\Models\View;
use App\Models\UrlService;
use Illuminate\Support\Facades\Cache;

class FilterSearchController extends Controller 
{
    public function index(){
        $view = View::find(1);
        $view->total_check = $view->total_check + 4;
        $view->save();

        $url = $_GET['url'];
	
        if (count(explode(".", toUrl($url))) == 2) {
          return response()->json([
              'isSuccess' => false,
              "message" => "Please enter the correct url",
              "result" => ["support" => "", "sanction_status" => "", "crossings" => ""],
              "statusCode" => 401,
            ]);
            exit;
        }
        $check_curl = false;
        //get cache
        $cache = Cache::get("search");
        if(empty($cache)){
          $cache = ["https://www.google.com" => 200];
        }
        if(!empty($cache)){
          foreach($cache as $key => $val){
            if($key == $url){
              $http_code = $val;
              break;
            }else{
              $check_curl = true;
            }
          }
        }else{
          $check_curl = true;
        }
        
        if($check_curl){
          $http_code = is403($url);
          if(!in_array(toUrl($url), $cache)){
              $cache = $cache + [$url => $http_code];
              Cache::put("search", $cache, 21600000);
          }
        }

        if($http_code == 0 || $http_code == 301 || $http_code == 200 || $http_code == 400 || $http_code == 503 || $http_code == 445){
            $sanction_status = false;
        }else{
            $sanction_status = true;
        }

        //check support
        $support = false;
        $crossings_name = null;
        $service = Service::where("url", toUrl($url))->get();
        if(count($service) != 0){
            $support = true;
            $sanction_status = true;
            $crossings_name = getCrossing($service[0]->id);
        }else{
          $links = UrlService::where("url", toUrl($url))->get(); 
          if(count($links) != 0){
            $service = Service::find($links[0]->service_id);
            $support = true;
            $sanction_status = true;
            $crossings_name = getCrossing($service->id);
          }else{
            exec("nslookup $url 10.202.10.202", $output); 
            $output = implode(" ", $output);
            $name = explode("Name", $output);
            if(count($name) == 6){
                $name = $name[0];
                $name = explode(" = ", $name)[1];
                $name = explode(". ", $name)[0]; 
                if($name == "google.403" OR $name == "develop.403"){
                  $support = true;
                  $sanction_status = true;
                  $crossings_name = [["name" => "DNS", "link" => "/downloads"]];
                }
            }
          }
        }
        
        return json_encode(["isSuccess" => true, "message" => "result success", "result" => ["support" => $support, "sanction_status" => $sanction_status, "crossings" => $crossings_name], "statusCode" => 200]);
    }
}
