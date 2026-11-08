<?php

namespace App\Providers;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\ServicePillar;
use App\Observers\GalleryObserver;
use App\Observers\ProductObserver;
use App\Observers\ServicePillarObserver;
use Illuminate\Support\Facades\URL;
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
        // Support Cloudflare Tunnels & Reverse Proxies (HTTPS + External Host)
        if (! empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            $proto = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 'https';
            URL::forceRootUrl("{$proto}://{$_SERVER['HTTP_X_FORWARDED_HOST']}");
            URL::forceScheme($proto);
        } elseif (! empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            URL::forceScheme('https');
        } elseif (! empty($_SERVER['HTTP_HOST']) && (str_contains($_SERVER['HTTP_HOST'], 'trycloudflare.com') || str_contains($_SERVER['HTTP_HOST'], 'lhr.life'))) {
            URL::forceScheme('https');
        }

        // Register Observers for Cache Invalidation & Slugs
        Product::observe(ProductObserver::class);
        ServicePillar::observe(ServicePillarObserver::class);
        Gallery::observe(GalleryObserver::class);
    }
}

