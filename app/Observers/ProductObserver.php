<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product): void
    {
        if (empty($product->slug)) {
            $product->slug = Str::slug($product->name);
        }
    }

    public function updating(Product $product): void
    {
        if ($product->isDirty('name') && empty($product->slug)) {
            $product->slug = Str::slug($product->name);
        }
    }

    public function saved(Product $product): void
    {
        Cache::forget('catalog_categories');
        Cache::forget('featured_products');
        Cache::forget("product_{$product->slug}");
        Cache::forget('seo_sitemap_xml');
    }

    public function deleted(Product $product): void
    {
        Cache::forget('catalog_categories');
        Cache::forget('featured_products');
        Cache::forget("product_{$product->slug}");
        Cache::forget('seo_sitemap_xml');
    }
}

