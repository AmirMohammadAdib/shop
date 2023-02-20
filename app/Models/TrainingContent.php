<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingContent extends Model
{
    use HasFactory;
    protected $table = "content_trainings";
    protected $fillable = ['picture', 'training_id', 'text', 'current_page', 'type'];


}
