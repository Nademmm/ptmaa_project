<?php

namespace App\Providers;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\ServicePillar;
use App\Observers\GalleryObserver;
use App\Observers\ProductObserver;
use App\Observers\ServicePillarObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Observers for Cache Invalidation & Slugs
        Product::observe(ProductObserver::class);
        ServicePillar::observe(ServicePillarObserver::class);
        Gallery::observe(GalleryObserver::class);
    }
}

