<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image_path',
        'object_position',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => \Illuminate\Support\Facades\Cache::forget('hero_slides_active'));
        static::deleted(fn () => \Illuminate\Support\Facades\Cache::forget('hero_slides_active'));
    }

    public function getImageUrlAttribute(): string
    {
        return Product::resolvePublicImageUrl(
            $this->image_path,
            '/images/projects/pju-k3-gempol-sidoarjo.webp',
            true
        );
    }

    public function getObjectPositionStyleAttribute(): string
    {
        if (! empty($this->object_position) && $this->object_position !== 'center center') {
            return $this->object_position;
        }

        $path = $this->image_path ?? '';
        if (str_contains($path, 'pju-crane-erection')) {
            return 'center top';
        }
        if (str_contains($path, 'pju-k3-gempol-sidoarjo')) {
            return 'center 15%';
        }
        if (str_contains($path, 'me-impeller-rotor-stainless')) {
            return 'center 25%';
        }
        if (str_contains($path, 'pju-parabola-cabang-dua')) {
            return 'center 30%';
        }
        if (str_contains($path, 'pju-solar-rest-area')) {
            return 'center 30%';
        }

        return $this->object_position ?: 'center center';
    }
}

