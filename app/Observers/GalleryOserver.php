<?php

namespace App\Observers;

use App\Models\Gallery;

class GalleryOserver
{
    public function creating(Gallery $model) {
        $model->id = generateUuid();
    }
}