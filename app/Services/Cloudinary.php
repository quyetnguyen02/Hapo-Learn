<?php

namespace App\Services;

class Cloudinary
{
    public function upload($image)
    {
        return cloudinary()->upload($image->getRealPath())->getSecurePath();
    }
}
