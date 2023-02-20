<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingContent;
use App\Http\Requests\TrainingContentRequest;

class ContentTrainingController extends Controller
{
    public function index($training_id){
      $contents = TrainingContent::where("training_id", $training_id)->get();
      foreach($contents as $content){
        $content->picture = substr($content->picture, 7);
      }
      return view("admin.content-training.index", compact("contents", "training_id"));
    }
    
    public function create($training_id){
      return view("admin.content-training.create", compact("training_id"));
    }
    
    public function store(TrainingContentRequest $request, $training_id){
      $text = $_POST['text'];
      $type = $_POST['type'];
      $current_page = count(TrainingContent::where("training_id", $training_id)->get()) + 1;

      if($text != null AND $type != null){
        if($request->file('picture')){
          $file_name = time() . "." . $request->picture->extension();
          $request->picture->move(public_path("pictures/training/" . $training_id . "/" . slug($type)), $file_name);
             
          TrainingContent::create(['text' => $text, 'picture' => "public/pictures/training/" . $training_id . "/" . slug($type) . "/" . $file_name, 'type' => $type, 'training_id' => $training_id, 'current_page' => $current_page]);
          
          return redirect("/admin/training-content/" . $training_id)->with("swal-success", "Successfuly added:)");
        }else{
          return back();
        }
      }else{
        return back();
        exit;
      }
    }
    
    public function edit($id){

    }
    
    public function update($id){

    }
        
    public function delete($id){
      TrainingContent::find($id)->delete();
      return back();
    }
}
