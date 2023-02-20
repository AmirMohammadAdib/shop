<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Http\Requests\TrainingRequest;


class TrainingController extends Controller
{
    public function index(){
      $trainings = Training::all();
      foreach($trainings as $training){
        $training->icon = substr($training->icon, 7);
      }
      return view("admin.training.index", compact("trainings"));
    }
    
    public function create(){
      $devices = ['Mac', 'Windows', 'Ios', 'Android', 'Linux', 'Router', 'play_station', 'xbox'];
      return view("admin.training.create", compact("devices"));
    }
    
    public function store(TrainingRequest $request){
      $past_training = Training::where("device",  $_POST['device'])->first();

      if(empty($past_training)){
        if($request->file("icon")){
        
          $file_name = time() . "." . $request->icon->extension();
          $request->icon->move(public_path("pictures/training-icon/"), $file_name);

          Training::create(['device' => $_POST['device'], 'icon' => "/public/pictures/training-icon/" . $file_name, "name" => "linux", "color" => "#fff"]);
          return redirect("/admin/training");
        }else{
          return back();
        }
      }else{
        return back();
      }
    }
    
    public function edit($id){
      $training = Training::find($id);
      $devices = ['Mac', 'Windows', 'Ios', 'Android', 'Linux', 'Router', 'play_station', 'xbox'];
      return view("admin.training.edit", compact("training", "devices"));
    }
    
    public function update(TrainingRequest $request, $id){
      $past_training = Training::where("device",  $_POST['device'])->first();
      if(empty($past_training)){
        $training = Training::find($id);
         if($request->file("icon")){
            $file_name = time() . "." . $request->icon->extension();
            $request->icon->move(public_path("pictures/training-icon/"), $file_name);
          
           $training->icon = "/pictures/training-icon/" . $file_name;
         }
        $training->device = $_POST['device'];
        $training->save();
        return redirect("/admin/training");
      }else{
        return back();
      }
    }
        
    public function delete($id){
      Training::find($id)->delete();
      return back();
    }
    
}
