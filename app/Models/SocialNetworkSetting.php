<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetworkSetting extends Model
{
    use HasFactory;
    protected $table = "socials_network_setting";
    protected $fillable = ['platform', 'url', 'setting_id'];

}
