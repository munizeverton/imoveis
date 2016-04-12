<?php

namespace App\Services;

class ImagemS3Service implements ImagemServiceInterface
{
    public function uploadImage($image, $fileName)
    {
        if (\Config::get('app.env') == 'test'){
            return;
        }

        $s3 = \Storage::disk('s3');
        $filePath = '/public/' . $fileName;
        $s3->put($filePath, file_get_contents($image), 'public');
    }

    public function getImageUrl($imageName)
    {
        $bucket = $this->getBucket();
        return "https://s3.amazonaws.com/{$bucket}/public/{$imageName}";
    }

    private function getBucket()
    {
        return \Config::get('filesystems.disks.s3.bucket');
    }
}