<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;

class GalleryObserver
{
    public function saved(Gallery $gallery): void
    {
        Cache::forget('gallery_projects_all');
        Cache::forget('gallery_projects_featured');
    }

    public function deleted(Gallery $gallery): void
    {
        Cache::forget('gallery_projects_all');
        Cache::forget('gallery_projects_featured');
    }
}

