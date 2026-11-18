<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;

class GalleryObserver
{
    public function saved(Gallery $gallery): void
    {
        $this->clearCache();
    }

    public function deleted(Gallery $gallery): void
    {
        $this->clearCache();
    }

    private function clearCache(): void
    {
        Cache::forget('gallery_projects_all');
        Cache::forget('gallery_projects_featured');
        Cache::increment('seo_sitemap_version');
    }
}

