<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQContent extends Model
{
    use HasFactory;
    protected $table = "content_faq";
    protected $fillable = ['picture', 'faq_id', 'text', 'current_page', 'type'];


}
