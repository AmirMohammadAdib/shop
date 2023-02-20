<?php 



function ip()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function slug($title){
    $title = explode(" ", $title);
    $title = implode("-", $title);
    return $title;
  }
  
 function check_valid_url($url){
    $regex = "((https?|ftp)\:\/\/)?";
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?";
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})";
    $regex .= "(\:[0-9]{2,5})?";
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?";
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?";
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?";
    
    
    if (preg_match("/^$regex$/i", $url)) {
       return true;
    }else{
        return false;
    }
 }
 
 function toUrl($url){
    $url = explode("http://", $url);
    if(count($url) == 1){
        $url = $url[0];
    }else{
        $url = $url[1];
    }
    $url = explode("https://", $url);
    if(count($url) == 1){
        $url = $url[0];
    }else{
        $url = $url[1];
    }
    
    $url = explode("www.", $url);
    if(count($url) == 1){
        $url = $url[0];
    }else{
        $url = $url[1];
    }

    $url = "https://www." . $url;
    
    return $url;
 }
 
 function toName($url){
     $url = str_replace("http://", "", $url);
     $url = str_replace("https://", "", $url);
     $url = str_replace("www.", "", $url);
     $url = explode(".", $url);
     if(count($url) == 2){
         $url = $url[0];
     }elseif(count($url) == 3){
         $url = $url[0] . "." . $url[1];
     }elseif(count($url) == 4){
         $url = $url[0] . "." . $url[1] . "." . $url[2];
     }elseif(count($url) == 5){
         $url = $url[0] . "." . $url[1] . "." . $url[2] . "." .  $url[3];
     }elseif(count($url) == 6){
         $url = $url[0] . "." . $url[1] . "." . $url[2] . "." . $url[3] . "." . $url[4];
     }
     return $url;
 }
 
   function statusCode($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);
    return $httpCode;         
  }  
  
  function getCrossing($service_id){
        $crossing_name = [];
        $crossings = \App\Models\CrossingSanctionsService::where("service_id", $service_id)->get();
        foreach($crossings as $crossing){
            $crossing_array = \App\Models\CrossingSanctions::find($crossing->crossing_id);
            unset($crossing_array->id);
            unset($crossing_array->created_at);
            unset($crossing_array->updated_at);
            unset($crossing_array->deleted_at);
    
            array_push($crossing_name, $crossing_array);
        }
        return $crossing_name;
  }
  
  function is403($url) {
    $ir_extension = toUrl($url);
    $ir_extension = explode(".", $ir_extension);
    $ir_extension = $ir_extension[2];
    if($ir_extension == "ir"){
      return 200;
    }else{
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_NOBODY, true);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
      curl_setopt($ch, CURLOPT_TIMEOUT, 7);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      $html = curl_exec($ch);
      $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      return (int)($code);
    }
}


function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}




function get_as($ip){
  $url_name = "https://api.radar.qrator.net/v1/lookup/ip?query=" . $ip;

  $ch_session = curl_init();

  curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($ch_session, CURLOPT_URL, $url_name);

  $result_url = curl_exec($ch_session);

  $data_router = json_decode($result_url);
  if($data_router != null){
    $name = $data_router->data[0]->name;
  }else{
    $name = "";
  }
    
  return $name;
}