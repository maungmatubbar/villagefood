<?php
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
/**********image Upload Functions********/
if (!function_exists('imageUpload')) {
    function imageUpload($image, $pathName)
    {
        $extension = $image->getClientOriginalExtension();
        $imageName = time() . '_' . rand(10, 99999999) . '_' . Str::random(5) . '.' . $extension;
        $imageUrl = 'upload_images/' . $pathName.'/'.$imageName;
        Image::make($image)->save($imageUrl);
        return $imageUrl;
    }
}

