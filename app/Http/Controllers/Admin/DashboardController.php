<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CrossingSanctions;
use App\Models\Training;


class DashboardController
{
    public function index(){
        $services = Service::all();
        $crossings = CrossingSanctions::all();
        $trainings = Training::all();
        return view("admin.dashboard.index", compact("services", "crossings", "trainings"));
    }
}
