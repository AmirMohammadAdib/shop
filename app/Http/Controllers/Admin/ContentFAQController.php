<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQContent;

class ContentFAQController extends Controller
{
    public function index($faq_id){
      $contents = FAQContent::where("faq_id", $faq_id)->get();
      return view("admin.content-faq.index", compact("contents", "faq_id"));
    }
    
    public function create($faq_id){
      return view("admin.content-faq.create", compact("faq_id"));
    } 
    
    public function store(Request $request, $faq_id){
      $text = $_POST['text'];
      $type = $_POST['type'];
      $current_page = count(FAQContent::where("faq_id", $faq_id)->get()) + 1;

      if($text != null AND $type != null){
        if($request->file('picture')){
          $file_name = time() . "." . $request->picture->extension();

          $request->picture->move(public_path("/pictures/faq/", $file_name));
             
          FAQContent::create(['text' => $text, 'picture' => "/public/pictures/faq/" . $file_name, 'type' => $type, 'faq_id' => $faq_id, 'current_page' => $current_page]);
          
          return redirect("/admin/faq-content/" . $faq_id)->with("swal-success", "Successfuly added:)");
        }else{
          return back();
        }
      }else{
        return back();
        exit;
      }
    }
    
    public function edit($id){
      $content = FAQContent::find($id);
      return view("admin.content-faq.edit", compact("content"));
    }
    
    public function update(Request $request, $id){
      $text = $_POST['text'];
      $type = $_POST['type'];
      
      if($text != null AND $type != null){
        $content = FAQContent::find($id);
        if($request->file('picture')){
          $file_name = time() . "." . $request->picture->extension();
          $request->picture->move(public_path("/pictures/faq/", $file_name));
          $content->picture = "/public/pictures/faq/" . $file_name;
        }
        $content->text = $text;
        $content->type = $type;
        $content->save();
        return back(); 
      }else{
        return back();
      }
    }
        
    public function delete($id){
      FAQContent::find($id)->delete();
      return back();
    }
}
