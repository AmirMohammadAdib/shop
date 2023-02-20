<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CrossingSanctions;
use App\Models\CrossingSanctionsService;

class CrossingServiceController extends Controller
{
    public function index($id){
        $crossings_services = CrossingSanctionsService::where("service_id", $id)->get();
        return view("admin.crossing-service.index", compact("crossings_services", "id"));
    }

    public function create($id){
        $crossings = CrossingSanctions::all();
        return view("admin.crossing-service.create", compact("crossings", "id"));
    }

    public function store($id){
        $now_crossing = CrossingSanctionsService::where("crossing_id", $_POST['crossing_id'])->where("service_id", $id)->get();
        if(count($now_crossing) == 0){
            $datas = [
                "crossing_id" => $_POST['crossing_id'],
                "service_id" => $id,
            ];
            CrossingSanctionsService::create($datas);
            return redirect("/admin/crossing-service/" . $id)->with("swal-success", "راه با موفقیت اضافه شد");
        }else{
            return back()->with("swal-warning", "راه وارد شده در این سرویس موجود است");
        }
    }

    public function edit($id){
        $crossings = CrossingSanctions::all();
        $my_crossing = CrossingSanctionsService::find($id);

        return view("admin.crossing-service.edit", compact("crossings", "my_crossing"));
    }

    public function update($id){
        $service = CrossingSanctionsService::find($id);

        $service->crossing_id = $_POST['crossing_id'];
        $service->save();
        return redirect("/admin/service/")->with("swal-success", "راه با موفقیت ویرایش شد");
    }

    public function delete($id){
        CrossingSanctionsService::find($id)->delete();
        return back();
    }
}
