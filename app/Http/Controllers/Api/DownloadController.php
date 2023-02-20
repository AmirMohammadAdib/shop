<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\LinksDownload;

class DownloadController extends Controller
{
    public function index(){
      $downloads = Download::all();
      foreach($downloads as $download){
        unset($download->created_at);
        unset($download->updated_at);
        unset($download->deleted_at);
        $links = LinksDownload::where("download_id", $download->id)->get();
        $links_array = [];
        foreach($links as $link){
          unset($link->created_at);
          unset($link->updated_at);
          unset($link->deleted_at);
          array_push($links_array, ["id" => $link->id, "name" => $link->name, "url" => $link->url]);
        }
        $download->link = $links_array;
      }
      
      echo json_encode($downloads);
    }
}
