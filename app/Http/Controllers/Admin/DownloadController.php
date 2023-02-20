<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    public function index(){
        $downloads = Download::all();
        return view("admin.download.index", compact("downloads"));
    }

    public function create(){
        return view("admin.download.create");
    }

    public function store(Request $request){
        if($request["name"] == null or $request["device"] == null){
          return back();
        }else{
          //upload image
          if($request->picture != null){
            $file_name = time() . "." . $request->picture->extension();
            $request->picture->move(public_path("pictures/download/", $file_name));
              $datas = [
                  "device" => $request['device'],
                  "name" => $request['name'],
                  "picture" => "/pictures/download/" . $file_name,
                  "color" => $request["color"],
              ];
            Download::create($datas);
            return redirect("/admin/download");
          }else{
            return back();
          }
        }
    }

    public function delete($id){
        Download::find($id)->delete();
        return back();
    }
}