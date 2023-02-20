<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CkeckManagment extends Model
{
    protected $table = "check_in_out_managment";
    use HasFactory;
    protected $fillable = ['token', 'user_ip', 'status', 'device', 'user_id'];


}

