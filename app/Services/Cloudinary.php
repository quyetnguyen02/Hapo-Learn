<?php

namespace App\Services;

class Cloudinary {
    public function Upload($image) {
        return cloudinary()->upload($image->getRealPath())->getSecurePath();
    }
}
