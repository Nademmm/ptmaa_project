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
        $slug = $this->category?->slug ?? '';
        return in_array($slug, ['pju-tenaga-surya', 'pju-pln-tiang']) ? 'pju' : 'me';
    }

    public function getDivisionNameAttribute(): string
    {
        return $this->division === 'pju' ? 'Penerangan Jalan Umum' : 'Mechanical & Electrical';
    }
}

