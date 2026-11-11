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
        if (empty($this->image_path)) {
            return '/images/projects/pju-k3-gempol-sidoarjo.webp';
        }

        if (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://')) {
            return $this->image_path;
        }

        $cleanPath = ltrim($this->image_path, '/');

        if (file_exists(public_path('storage/' . $cleanPath))) {
            $ver = @filemtime(public_path('storage/' . $cleanPath)) ?: 'k3';
            return asset('storage/' . $cleanPath) . '?v=' . $ver;
        }

        if (file_exists(public_path($cleanPath))) {
            $ver = @filemtime(public_path($cleanPath)) ?: 'k3';
            return '/' . $cleanPath . '?v=' . $ver;
        }

        return asset('storage/' . $cleanPath) . '?v=k3';
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

