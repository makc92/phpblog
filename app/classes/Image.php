<?php
/**
 * Created by PhpStorm.
 * User: MakcS
 * Date: 22.01.2019
 * Time: 18:19
 */

namespace App\classes;
use Intervention\Image\ImageManager;

class Image
{
    private $imageManager;
    public function  __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    public function uploadImage($image){
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $extension;
        $image = Image::make($image['tmp_name']);
        $image->save($filename);
    }
}