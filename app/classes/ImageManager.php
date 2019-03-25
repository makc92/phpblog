<?php

namespace App\classes;

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(array('driver' => 'gd'));


class ImageManager
{
    public function uploadImage($image)
    {
        /*Рабоате но мне кажется, что это такая дичь)*/
        if (!empty($image['name'])) {
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . "." . $extension;
            $image = Image::make($image['tmp_name']);
            $image->save("img/" . $filename);
            return $filename;
        } else {
            return null;
        }
    }

    public function deleteImage($filename)
    {
        unlink('img/' . $filename);
    }

    public function getImage($image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $extension;
        return $filename;
    }
}