<?php

namespace App\classes;
use Intervention\Image\ImageManagerStatic as Image;
Image::configure(array('driver' => 'gd'));



class ImageManager
{
    public function uploadImage($image){
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $extension;
        $image = Image::make($image['tmp_name']);
        $image->save("img/" . $filename);
        return $filename;
    }
}