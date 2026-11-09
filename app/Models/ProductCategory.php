<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class ProductCategory extends Model
{
    use HasFactory;

    public const PJU_SLUGS = ['pju-tenaga-surya', 'pju-pln-tiang'];

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
            Cache::forget('footer_categories');
            Cache::forget('catalog_categories');
            Cache::forget('catalog_categories_pju');
            Cache::forget('catalog_categories_me');
            Cache::forget('featured_products');
        });
        static::deleted(function (): void {
            Cache::forget('footer_categories');
            Cache::forget('catalog_categories');
            Cache::forget('catalog_categories_pju');
            Cache::forget('catalog_categories_me');
            Cache::forget('featured_products');
        });
    }

    public function scopeForDivision(Builder $query, string $division): Builder
    {
        if ($division === 'pju') {
            return $query->where(function (Builder $q): void {
                $q->whereIn('slug', self::PJU_SLUGS)
                    ->orWhere('slug', 'like', 'pju%')
                    ->orWhereHas('pillar', fn (Builder $p) => $p->where('slug', 'penerangan-jalan-umum'));
            });
        }

        return $query->where(function (Builder $q): void {
            $q->whereNotIn('slug', self::PJU_SLUGS)
                ->where('slug', 'not like', 'pju%')
                ->where(function (Builder $sub): void {
                    $sub->whereNull('service_pillar_id')
                        ->orWhereHas('pillar', fn (Builder $p) => $p->where('slug', '!=', 'penerangan-jalan-umum'));
                });
        });
    }

    public function getDivisionAttribute(): string
    {
        $slug = (string) $this->slug;

        if (
            in_array($slug, self::PJU_SLUGS, true) ||
            str_starts_with($slug, 'pju') ||
            ($this->relationLoaded('pillar') && $this->pillar?->slug === 'penerangan-jalan-umum')
        ) {
            return 'pju';
        }

        return 'me';
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

