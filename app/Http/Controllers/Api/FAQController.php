<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use App\Models\FAQContent;

class FAQController extends Controller
{
    public function index(){
    header('Access-Control-Allow-Origin: *');
        $faqs = FAQ::all();
        foreach($faqs as $faq){
            unset($faq->created_at);
            unset($faq->updated_at);
            unset($faq->deleted_at);
            
            $contents = FAQContent::where("faq_id", $faq->id)->get();

            $faq->total = count(FAQContent::where("faq_id", $faq->id)->get());
            foreach($contents as $content){
                unset($content->created_at);
                unset($content->updated_at);
                unset($content->deleted_at);
                if($content->picture[0] != "/"){
                    $content->picture = substr($content->picture, 6);   
                }
            }
            
            $faq->icon = "/" . substr($faq->icon, 7);   
            $faq->total_dns_content = count(FAQContent::where("faq_id", $faq->id)->where("type", "dns")->get());
            $faq->total_ping_content = count(FAQContent::where("faq_id", $faq->id)->where("type", "Special service")->get());
            $faq['data'] = $contents;
        }
        echo json_encode($faqs);
    }
}
