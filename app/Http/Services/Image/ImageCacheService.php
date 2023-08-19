<?php

namespace App\Http\Services\Image;

use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

class ImageCacheService {
    public function cache($imagePath, $size=''){
        //set image size
        $imageSize = Config::get("image.cache-image-sizes");
        if(!isset($imageSize[$size])){
            $size = Config::get("image.default-current-cache-image");
        }

        $width = $imageSize[$size]['width'];
        $height = $imageSize[$size]['height'];

        //cache image
        if(file_exists($imagePath)){
            $img = Image::cache(function ($image) use ($imagePath, $width, $height){
                return $image->make($imagePath)->fit($width, $height);
            }, Config::get("image.image-cache-live-time"), true);

            return $img->response();
        }else{
            $fontSize = 26;
            if($size == 'small'){
                $fontSize = 5;
            }elseif($size == 'large'){
                $fontSize = 45;
            }
            $img = Image::canvas($width, $height, '#404E67')->text("Image not found - 404", $width / 2, $height / 2, function ($font) use ($fontSize){
                $font->color = "#F3F3F3";
                $font->align = "center";
                $font->valign = "center";
                $font->file(public_path("admin-asset/fonts/Montserrat-Medium.ttf"));
                $font->size($fontSize);
            });
            return $img->response();
        }

    }
}
