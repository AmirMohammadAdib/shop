<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\View;
use App\Models\LinksDownload;
use App\Models\Download;
use App\Models\DNS;
use App\Models\CkeckManagment;


class StatisticsController extends Controller
{
    public function index()
    {
      $count_total_download_windows = 0;
      foreach(LinksDownload::where("download_id", 1)->get() as $link){
        $count_total_download_windows += intval($link->count);
      }
          
      $count_total_download_android = 0;
      foreach(LinksDownload::where("download_id", 2)->get() as $link){
        $count_total_download_android += intval($link->count);
      }
      
      $links = [];
      foreach(LinksDownload::all() as $link){
        array_push($links, ["name" => $link->name, "count" => $link->count]);
      }
      $download_statistic = [
        "count_total_download_android" => $count_total_download_android,
        "count_total_download_windows" => $count_total_download_windows,
        "links" => $links,
      ];
      
      $total_dns = 0;
      foreach(DNS::all() as $d){
        $total_dns += $d->count;
      }
     
     
     $total_login = CkeckManagment::where("status", "login")->get();
     
      
      $datas = [
        ["name" => "Total Visit", "value" => View::find(1)->visit_site, "icon" => "https://api.anti403.ir/pictures/statistic/5.svg"],
        ["name" => "Total Check", "value" => View::find(1)->total_check, "icon" => "https://api.anti403.ir/pictures/statistic/3.svg"],
        ["name" => "Count total download android", "value" => $count_total_download_android, "icon" => "https://api.anti403.ir/pictures/statistic/1.svg"],
        ["name" => "Count total download windows", "value" => $count_total_download_windows, "icon" => "https://api.anti403.ir/pictures/statistic/2.svg"],
        ["name" => "Download total application", "value" => $count_total_download_android + $count_total_download_windows, "icon" => "https://api.anti403.ir/pictures/statistic/8.svg"],
        ["name" => "Total DNS copied", "value" => $total_dns, "icon" => "https://api.anti403.ir/pictures/statistic/7.svg"],
        ["name" => "Total login", "value" => count($total_login) * 4, "icon" => "https://api.anti403.ir/pictures/statistic/8.svg"],
      ];
      
      echo json_encode($datas);
    }
}
 
