<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_category_id',
        'title',
        'slug',
        'featured_image',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(function (): void {
            \Illuminate\Support\Facades\Cache::forget('latest_posts_home');
            \Illuminate\Support\Facades\Cache::forget('seo_sitemap_xml');
        });
        static::deleted(function (): void {
            \Illuminate\Support\Facades\Cache::forget('latest_posts_home');
            \Illuminate\Support\Facades\Cache::forget('seo_sitemap_xml');
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        return Product::resolvePublicImageUrl($this->featured_image, '/images/projects/pju-k3-gempol-sidoarjo.webp');
    }
}

