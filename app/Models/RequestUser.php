<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestUser extends Model
{
    use HasFactory;
    protected $table = "user_requests";
    protected $fillable = ['request', 'service_name', 'user_ip', 'show_status'];


}
