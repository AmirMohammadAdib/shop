<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DNS;

class DNSController extends Controller
{
    public function index(){
        $dnss = DNS::all();
        foreach($dnss as $dns){
            unset($dns->created_at);
            unset($dns->updated_at);
            unset($dns->deleted_at);
        }
        echo json_encode($dnss);
    }
}
