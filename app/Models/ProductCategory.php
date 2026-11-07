<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_pillar_id',
        'name',
        'slug',
        'icon',
        'description',
        'contact_phone', // override WA per kategori jika ada
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saved(function (): void {
            \Illuminate\Support\Facades\Cache::forget('footer_categories');
            \Illuminate\Support\Facades\Cache::forget('catalog_categories');
        });
        static::deleted(function (): void {
            \Illuminate\Support\Facades\Cache::forget('footer_categories');
            \Illuminate\Support\Facades\Cache::forget('catalog_categories');
        });
    }

    public function pillar(): BelongsTo
    {
        return $this->belongsTo(ServicePillar::class, 'service_pillar_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class)->orderBy('sort_order');
    }
}

