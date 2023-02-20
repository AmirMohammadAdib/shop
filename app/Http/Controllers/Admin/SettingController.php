<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\SocialNetworkSetting;
use App\Models\DNSSetting;

class SettingController extends Controller
{
  public function index(){
    $setting = Setting::find(1);
    $socials = SocialNetworkSetting::where("setting_id", 1)->get();
    $dns = DNSSetting::where("setting_id", 1)->get();
    return view("admin.setting.index", compact("setting", "socials", "dns"));
  }
  
  public function store(){
    $setting = setting::find(1);
    $setting->currentversion = $_POST['currentversion'];
    $setting->minversion = $_POST['minversion'];
    $setting->update_link = $_POST['update_link'];
    $setting->force_update = $_POST['force_update'];
    $setting->virasti_link = $_POST['virasti_link'];
    $setting->bale_link = $_POST['bale_link'];
    $setting->support_link = $_POST['support_link'];
    $setting->message = $_POST['message'];
    $setting->save();
    return back();
  }
  
  public function socialStore(){
    SocialNetworkSetting::create(["platform" => $_POST['platform'], "url" => $_POST['url'], "setting_id" => 1]);
    return back();
  }
  
  public function dnsStore(){
    DNSSetting::create(["dns" => $_POST['dns'], "setting_id" => 1]);
    return back();
  }

}
