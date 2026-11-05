<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServicePillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'code',
        'icon',
        'short_summary',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopes(): HasMany
    {
        return $this->hasMany(ServiceScope::class)->orderBy('sort_order');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(ProductCategory::class)->orderBy('sort_order');
    }
}

