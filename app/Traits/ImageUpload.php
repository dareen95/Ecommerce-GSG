<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



Trait ImageUpload{

    function uploadImage($image,$directory,$quality) {

        $file_extension = $image->getClientOriginalExtension();
        $file_name = Str::random(20) . '.' . $file_extension;
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $image_resize = Image::make($image->getRealPath());
        $image_resize->save( $directory . '/' . $file_name, $quality);
        return  $directory . '/'. $file_name;

    }

}
