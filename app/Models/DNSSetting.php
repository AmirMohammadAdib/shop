<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DNSSetting extends Model
{
    use HasFactory;
    protected $table = "dns_setting";
    protected $fillable = ['dns', 'setting_id'];

}
