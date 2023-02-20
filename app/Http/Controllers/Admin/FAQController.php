<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function index(){
      $faq = FAQ::all();
      return view("admin.faq.index", compact("faq"));
    }
    
    public function create(){
      return view("admin.faq.create");
    }
    
    public function store(Request $request){
      $past_training = FAQ::where("device",  $_POST['device'])->first();

      if(empty($past_training)){
        if($request->file("icon")){
        
          $file_name = time() . "." . $request->icon->extension();
          $request->icon->move(public_path("pictures/faq-icon/"), $file_name);

          FAQ::create(['device' => $_POST['device'], 'icon' => "/public/pictures/faq-icon/" . $file_name, "name" => "linux", "color" => "#fff"]);
          return redirect("/admin/faq");
        }else{
          return back();
        }
      }else{
        return back();
      }
    }
    
    public function edit($id){
      $faq = FAQ::find($id);
      return view("admin.faq.edit", compact("faq"));
    }
    
    public function update(Request $request, $id){
      $faq = FAQ::find($id);
      if($request->file("icon")){
          $file_name = time() . "." . $request->icon->extension();
          $request->icon->move(public_path("pictures/faq-icon/"), $file_name);
        
         $faq->icon = "/public/pictures/faq-icon/" . $file_name;
       }
      $faq->device = $_POST['device'];
      $faq->save();
      return redirect("/admin/faq");
    }
        
    public function delete($id){
      FAQ::find($id)->delete();
      return back();
    }
    
}
