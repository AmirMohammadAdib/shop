<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DNS extends Model
{
    use HasFactory;
    protected $table = "dns";
    protected $fillable = ['ip', 'port', 'count'];

}
