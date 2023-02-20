<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Models\SocialNetworkSetting;
use App\Models\DNSSetting;


class SettingController
{
    public function index(){
        $setting = Setting::find(1);
        unset($setting->created_at);
        unset($setting->updated_at);
        unset($setting->deleted_at);
        $dns = DNSSetting::where("setting_id", $setting->id)->get();
        $dns_array = [];
        foreach($dns as $d){
            array_push($dns_array, $d->dns);
        }
        
        $socials = SocialNetworkSetting::where("setting_id", $setting->id)->get();
        $social_array = [];
        foreach($socials as $social){
            array_push($social_array, $social->url);
        }
        
        $setting['dns'] = $dns_array;
        $setting['split_list'] = $social_array;
        $data['result'] = $setting;
        $data['isSuccess'] = true;
        $data['statusCode'] = 200;
        echo json_encode($data);
    }
}
