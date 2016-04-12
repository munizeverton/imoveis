<?php
/**
 * Created by PhpStorm.
 * User: Everton
 * Date: 11/04/2016
 * Time: 20:30
 */

namespace App\Services;


interface ImagemServiceInterface
{
    public function uploadImage($image, $fileName);

    public function getImageUrl($imageName);
}