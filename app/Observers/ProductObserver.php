<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductCategory;
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
        $this->clearCatalogCache($product);
    }

    public function deleted(Product $product): void
    {
        $this->clearCatalogCache($product);
    }

    private function clearCatalogCache(Product $product): void
    {
        ProductCategory::clearCatalogCache();
        Cache::forget("product_{$product->slug}");

        $originalSlug = $product->getOriginal('slug');
        if ($originalSlug && $originalSlug !== $product->slug) {
            Cache::forget("product_{$originalSlug}");
        }

        Cache::increment('seo_sitemap_version');
    }
}

