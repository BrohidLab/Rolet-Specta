<?php

namespace App\Observers;

use App\Models\CategoryGallery;

class CategoryGalleryObserver
{
    public function creating(CategoryGallery $data)
    {
        $data->id = generateUuid();
    }
}
