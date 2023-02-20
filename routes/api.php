<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\TrainingController;
use App\Http\Controllers\Api\DNSController;
use App\Http\Controllers\Api\DownloadController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\FilterSearchController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Api\FAQController;
use App\Http\Controllers\Api\StatisticsController;

/* 
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------- -----------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

if(isset($_SERVER['HTTP_ORIGIN'])){
  $http_origin = $_SERVER['HTTP_ORIGIN'];
}else{
  $http_origin = "https://403.online";
}

if ($http_origin == "https://403.online" || $http_origin == "https://anti403.ir"){  
    header("Access-Control-Allow-Origin: $http_origin");
}

header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE'); 
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

//services
Route::get("/services", [ServiceController::class, "index"]);

//services
Route::get("/all-services", [ServiceController::class, "all"]);

//score
Route::post("/score/create/{service}", [ScoreController::class, "create"]);

//trainings
Route::get("/trainings", [TrainingController::class, "index"]);

//dns
Route::get("/dns", [DNSController::class, "index"], "index");

//search
Route::get("/search", [ServiceController::class, "search"]);

//downlaod
Route::get("/downloads", [DownloadController::class, "index"]);

//request user
Route::post("/request/create", [RequestController::class, "create"]);

//contact us
Route::post("/contact-us/create", [ContactController::class, "create"]);

//search-filter
Route::get("/search-filter", [FilterSearchController::class, "index"]);

//search-filter
Route::get("/setting", [SettingController::class, "index"]);

Route::get("/config", [ConfigController::class, "index"]);

//faq
Route::get("/faq", [FAQController::class, "index"]);

//statistic
Route::get("/statistic", [StatisticsController::class, "index"]); 

//add count
Route::get("/add-count", function(){
  echo '1';
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/active', [AuthController::class, 'active']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot', [AuthController::class, 'forgot']);
Route::get('/reset/{token}', [AuthController::class, 'reset']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/change-password', [ChangePasswordController::class, 'change']);
