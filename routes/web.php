<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CrossingController;
use App\Http\Controllers\Admin\CrossingServiceController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\ContentTrainingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\DownloadUrlController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\ContentFAQController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;
use App\Http\Controllers\Admin\UserRequestController;
use App\Http\Controllers\Admin\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("get-dns/{url}", function($url){
  exec("nslookup $url 10.202.10.202", $output);
  $output = implode(" ", $output);
  $name = explode("Name", $output);
  if(count($name) == 1){
    dd("Not supporting");
  }elseif(count($name) == 2){
    dd("Not supporting");
  }else{
    $name = $name[0];
  }
  $name = explode(" = ", $name)[1];
  $name = explode(". ", $name)[0];
  dd($name);
});
 
Route::get("/cache", function(){
  //dd(Illuminate\Support\Facades\Cache::get("search"));
  Illuminate\Support\Facades\Cache::forget("search");
});

//authentication  
Route::get("/login", [LoginController::class, "view"]);
Route::post("/login", [LoginController::class, "login"])->name("login.store");
Route::get("/register", [RegisterController::class, "view"]);
Route::post("/register", [RegisterController::class, "register"]);
Route::get("/logout", [LogoutController::class, "view"]);

//dashboard
Route::get("/dashboard", [DashboardController::class, "index"])->middleware('admin');


Route::group(['middleware' => 'admin','prefix' => 'admin'],function(){
    Route::get("/", [AdminController::class, "index"]);
    
    //services
    Route::get("/service", [ServiceController::class, "index"]);
    Route::get("/service/create", [ServiceController::class, "create"])->name("service.create");
    Route::post("/service/store", [ServiceController::class, "store"])->name("service.store");;
    Route::get("/service/edit/{id}", [ServiceController::class, "edit"])->name("service.edit");
    Route::post("/service/update/{id}", [ServiceController::class, "update"])->name("service.update");
    Route::get("/service/delete/{id}", [ServiceController::class, "delete"])->name("service.delete");
    Route::get("/url-service/create/{service_id}", [ServiceController::class, "urlService"])->name("service.url");
    Route::post("/url-service/store/{service_id}", [ServiceController::class, "urlServiceStore"])->name("service.url.store");
    Route::get("/url-service/delete/{id}", [ServiceController::class, "urlServiceDelete"])->name("service.url.delete");
    
    //crossing
    Route::get("/crossing", [CrossingController::class, "index"]);
    Route::get("/crossing/create", [CrossingController::class, "create"])->name("crossing.create");
    Route::post("/crossing/store", [CrossingController::class, "store"])->name("crossing.store");;
    Route::get("/crossing/edit/{id}", [CrossingController::class, "edit"])->name("crossing.edit");
    Route::post("/crossing/update/{id}", [CrossingController::class, "update"])->name("crossing.update");
    Route::get("/crossing/delete/{id}", [CrossingController::class, "delete"])->name("crossing.delete");
    
    
    //crossing-services
    Route::get("/crossing-service/{service_id}", [CrossingServiceController::class, "index"])->name("crossing.service.index");;
    Route::get("/crossing-service/create/{service_id}", [CrossingServiceController::class, "create"])->name("crossing.service.create");
    Route::post("/crossing-service/store/{service_id}", [CrossingServiceController::class, "store"])->name("crossing.service.store");;
    Route::get("/crossing-service/edit/{id}", [CrossingServiceController::class, "edit"])->name("crossing.service.edit");
    Route::post("/crossing-service/update/{id}", [CrossingServiceController::class, "update"])->name("crossing.service.update");
    Route::get("/crossing-service/delete/{id}", [CrossingServiceController::class, "delete"])->name("crossing.service.delete");
    
    
    //training
    Route::get("/training", [TrainingController::class, "index"])->name("training.index");
    Route::get("/training/create", [TrainingController::class, "create"])->name("training.create");
    Route::post("/training/store", [TrainingController::class, "store"])->name("training.store");
    Route::get("/training/edit/{id}", [TrainingController::class, "edit"])->name("training.edit");
    Route::post("/training/update/{id}", [TrainingController::class, "update"])->name("training.update");
    Route::get("/training/delete/{id}", [TrainingController::class, "delete"])->name("training.delete");
    
    //training-content
    Route::get("/training-content/{training_id}", [ContentTrainingController::class, "index"])->name("training.content.index");
    Route::get("/training-content/create/{training_id}", [ContentTrainingController::class, "create"])->name("training.content.create");
    Route::post("/training-content/store/{training_id}", [ContentTrainingController::class, "store"])->name("training.content.store");
    Route::get("/training-content/edit/{id}", [ContentTrainingController::class, "edit"])->name("training.content.edit");
    Route::post("/training-content/update/{id}", [ContentTrainingController::class, "update"])->name("training.content.update");
    Route::get("/training-content/delete/{id}", [ContentTrainingController::class, "delete"])->name("training.content.delete");


    Route::get('setting', [SettingController::class, "index"]);
    Route::post('setting/store', [SettingController::class, "store"])->name("setting.store");
    Route::post('setting/social/store', [SettingController::class, "socialStore"])->name("setting.social.store");
    Route::post('setting/dns/store', [SettingController::class, "dnsStore"])->name("setting.dns.store");
  
    //download
    Route::get("/download", [DownloadController::class, "index"])->name("download.index");
    Route::get("/download/create", [DownloadController::class, "create"])->name("download.create");
    Route::post("/download/store", [DownloadController::class, "store"])->name("download.store");
    Route::get("/download/edit/{id}", [DownloadController::class, "edit"])->name("download.edit");
    Route::post("/download/update/{id}", [DownloadController::class, "update"])->name("download.update");
    Route::get("/download/delete/{id}", [DownloadController::class, "delete"])->name("download.delete");
    
    //download url
    Route::get("/download-url/{download_id}", [DownloadUrlController::class, "index"])->name("download.url.index");
    Route::get("/download-url/create/{download_id}", [DownloadUrlController::class, "create"])->name("download.url.create");
    Route::post("/download-url/store/{download_id}", [DownloadUrlController::class, "store"])->name("download.url.store");
    Route::get("/download-url/edit/{id}", [DownloadUrlController::class, "edit"])->name("download.url.edit");
    Route::post("/download-url/update/{id}", [DownloadUrlController::class, "update"])->name("download.url.update");
    Route::get("/download-url/delete/{id}", [DownloadUrlController::class, "delete"])->name("download.url.delete");
    
    
    //faq
    Route::get("/faq", [FAQController::class, "index"])->name("faq.index");
    Route::get("/faq/create", [FAQController::class, "create"])->name("faq.create");
    Route::post("/faq/store", [FAQController::class, "store"])->name("faq.store");
    Route::get("/faq/edit/{id}", [FAQController::class, "edit"])->name("faq.edit");
    Route::post("/faq/update/{id}", [FAQController::class, "update"])->name("faq.update");
    Route::get("/faq/delete/{id}", [FAQController::class, "delete"])->name("faq.delete");
    
    //faq-content
    Route::get("/faq-content/{training_id}", [ContentFAQController::class, "index"])->name("faq.content.index");
    Route::get("/faq-content/create/{training_id}", [ContentFAQController::class, "create"])->name("faq.content.create");
    Route::post("/faq-content/store/{training_id}", [ContentFAQController::class, "store"])->name("faq.content.store");
    Route::get("/faq-content/edit/{id}", [ContentFAQController::class, "edit"])->name("faq.content.edit");
    Route::post("/faq-content/update/{id}", [ContentFAQController::class, "update"])->name("faq.content.update");
    Route::get("/faq-content/delete/{id}", [ContentFAQController::class, "delete"])->name("faq.content.delete");

    //requests
    Route::get("/request", [UserRequestController::class, "index"])->name("request.index");
    Route::get("/request/change-status/{id}", [UserRequestController::class, "change"])->name("request.change.status");
   
    Route::get("/users", [UserController::class, 'index'])->name("user.index");
    Route::get("/user/change-status/{user_id}", [UserController::class, "changeStatus"])->name("user.change.status");
});