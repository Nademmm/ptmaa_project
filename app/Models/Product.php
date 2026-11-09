<?php

namespace App\Models;

use App\Enums\ProductAvailability;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
        'sub_badge',
        'brand',
        'availability_status',
        'thumbnail_image',
        'gallery_images',
        'short_summary',
        'description',
        'why_choose_text',
        'specifications',
        'advantages',
        'is_featured',
        'has_warranty_badge',
        'has_eco_k3_badge',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'availability_status' => ProductAvailability::class,
        'gallery_images' => 'array',
        'specifications' => 'array',
        'advantages' => 'array',
        'is_featured' => 'boolean',
        'has_warranty_badge' => 'boolean',
        'has_eco_k3_badge' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function getDivisionAttribute(): string
    {
        return $this->category?->division ?? 'pju';
    }

    public function getDivisionNameAttribute(): string
    {
        return $this->division === 'pju' ? 'Penerangan Jalan Umum' : 'Mechanical & Electrical';
    }

    public static function resolvePublicImageUrl(?string $path, string $fallback = '/images/products/pju-all-in-one.webp'): string
    {
        if (empty($path)) {
            return $fallback;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/');

        if (file_exists(public_path($cleanPath))) {
            $ver = @filemtime(public_path($cleanPath)) ?: 'k3';
            return '/' . $cleanPath . '?v=' . $ver;
        }

        if (file_exists(public_path('storage/' . $cleanPath))) {
            $ver = @filemtime(public_path('storage/' . $cleanPath)) ?: 'k3';
            return asset('storage/' . $cleanPath) . '?v=' . $ver;
        }

        return asset('storage/' . $cleanPath) . '?v=k3';
    }

    public function getThumbnailUrlAttribute(): string
    {
        return self::resolvePublicImageUrl($this->thumbnail_image, '/images/products/pju-all-in-one.webp');
    }

    public function getGalleryUrlsAttribute(): array
    {
        $mainUrl = $this->thumbnail_url;
        $rawGallery = is_array($this->gallery_images) && count($this->gallery_images) > 0
            ? $this->gallery_images
            : [$mainUrl];

        $urls = collect($rawGallery)
            ->map(fn ($img) => self::resolvePublicImageUrl($img, $mainUrl))
            ->values()
            ->all();

        if (! in_array($mainUrl, $urls, true)) {
            array_unshift($urls, $mainUrl);
        }

        return array_values(array_unique($urls));
    }
}

