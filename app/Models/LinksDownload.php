<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinksDownload extends Model
{
    use HasFactory;
    protected $table = "links_download";
    protected $fillable = ['url', 'name', 'download_id', 'count'];


}

