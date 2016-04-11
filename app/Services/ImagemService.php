<?php

namespace App\Services;

class ImagemService
{
    public function uploadImage($image)
    {
        $imageFileName = time() . '.' . $image->getClientOriginalExtension();

        $s3 = \Storage::disk('s3');
        $filePath = '/public/' . $imageFileName;
        $s3->put($filePath, file_get_contents($image), 'public');
    }

}