<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create(){
      $user_name = $_POST['user_name'];
      $message_title = $_POST['message_title'];
      $message_text = $_POST['message_text'];
      
      if($user_name != null AND $message_title != null AND $message_text != null){
        $data = [
          "user_name" => $user_name,
          "user_ip" => ip(),
          "message_title" => $message_title,
          "message_text" => $message_text,
        ];
        
        Contact::create($data);
        echo "['Data added']";
      }else{
        echo "['Please Writer Your Contact']";
      }
    }
}