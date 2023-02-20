<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "setting";
    protected $fillable = ['last_version', 'update_link', 'force_update', 'website_link', 'virasti_link', 'bale_link', 'support_link'];

}
