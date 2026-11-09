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

        // Set default SEO X-Robots-Tag header for public pages
        if (! $this->app->runningInConsole() && ! headers_sent()) {
            $uri = $_SERVER['REQUEST_URI'] ?? '/';
            if (! str_starts_with($uri, '/portal-internal-maa-9x7k2v') && ! str_starts_with($uri, '/livewire')) {
                header('X-Robots-Tag: index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
            }
        }
    }
}

