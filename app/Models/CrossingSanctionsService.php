<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossingSanctionsService extends Model
{
    use HasFactory;
    protected $fillable = ["service_id", "crossing_id"];
}
