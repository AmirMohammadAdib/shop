<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CrossingSanctions;

class CrossingController extends Controller
{
    public function index(){
        $crossings = CrossingSanctions::all();
        return view("admin.crossing.index", compact("crossings"));
    }

    public function create(){
        return view("admin.crossing.create");
    }

    public function store(){
        if($_POST["name"] == null){
          return back();
        }else{
            $datas = [
                "name" => $_POST['name'],
            ];
            CrossingSanctions::create($datas);
            return redirect("/admin/crossing")->with("swal-success", "راه با موفقیت اضافه شد");
        }
    }

    public function edit($id){
        $crossing = CrossingSanctions::find($id);
        return view("admin.crossing.edit", compact("crossing"));
    }

    public function update($id){
        $service = CrossingSanctions::find($id);

        $service->name = $_POST['name'];
        $service->save();
        return redirect("/admin/crossing")->with("swal-success", "راه با موفقیت ویرایش شد");
    }

    public function delete($id){
        CrossingSanctions::find($id)->delete();
        return back();
    }
}