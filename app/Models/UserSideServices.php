<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSideServices extends Model
{
    use HasFactory;
    protected $table = "user_side_services";
    protected $fillable = ['domain', 'user_ip', 'status'];

}
