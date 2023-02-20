<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\UrlService;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view("admin.service.index", compact("services"));
    }

    public function create(){
        return view("admin.service.create");
    }

    public function store(ServiceRequest $request){
        $inputs = $request->all();
        if($inputs["name"] == null){
          return back();
        }else{
          //upload image
          if($request->file('picture'))
          {
              $file_name = "banner." . $request->picture->extension();
              $request->picture->move(public_path("pictures/" . slug($inputs['name'])), $file_name);
                $datas = [
                    "name" => $_POST['name'],
                    "picture" => "/pictures/" . slug($inputs['name']) . "/" . $file_name,
                    "special_level" => $_POST["special_level"],
                    "url" => $_POST['url'],
                ];
              Service::create($datas);
              return redirect("/admin/service/create")->with("swal-success", "سرویس با موفقیت اضافه شد");
           }else{
             return back();
           }
        }
    }

    public function edit($id){
        $service = Service::find($id);
        return view("admin.service.edit", compact("service"));
    }

    public function update(ServiceRequest $request, $id){
        $service = Service::find($id);
        $inputs = $request->all();
        
        if($request->file('picture'))
        {
            $file_name = "banner." . $request->picture->extension();
            $request->picture->move(public_path("pictures/" . slug($inputs['name'])), $file_name);
            $service->picture = "/pictures/" . slug($inputs['name']) . "/" . $file_name;
        }
        $service->name = $_POST['name'];
        $service->special_level = $_POST['special_level'];
        $service->url = $_POST['url'];
        $service->save();
        return redirect("/admin/service")->with("swal-success", "سرویس با موفقیت ویرایش شد");
    }

    public function delete($id){
        Service::find($id)->delete();
        return back();
    }
    
    
    public function urlService($id){
        return view("admin.service.name", compact("id"));
    }
    
    
    public function urlServiceStore($id){
        $data = ["url" => "https://www." . $_POST['url'], "service_id" => $id];
        UrlService::create($data);
        return redirect("/admin/service");
    }
    
    public function urlServiceDelete($id){
        UrlService::find($id)->delete();
        return back();
    }
}