<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\LinksDownload;

class DownloadUrlController extends Controller
{
    public function index($id){
        $urls = LinksDownload::where("download_id", $id)->get();
        return view("admin.download-url.index", compact("urls", "id"));
    }

    public function create($id){
        return view("admin.download-url.create", compact("id"));
    }

    public function store(Request $request, $id){
      if($request['name'] == null OR $request['url'] == null){
        return back();
      }else{
        $data = [
          "download_id" => $id,
          "name" => $request['name'],
          "url" => $request['url'],
        ];
        LinksDownload::create($data);
        return redirect("/admin/download-url/" . $id);
      }
    }

    public function edit($id){
      $url = LinksDownload::find($id);
      return view("admin.download-url.edit", compact("url"));
    }
    
    public function update(Request $request, $id){
      if($request['name'] == null OR $request['url'] == null){
        return back();
      }else{
        $url = LinksDownload::find($id);
        $url->url = $request['url'];
        $url->name = $request['name'];
        $url->save();
        return redirect("/admin/download-url/" . $url->download_id);
      }
    }

    public function delete($id){
      LinksDownload::find($id)->delete();
      return back();
    }
}