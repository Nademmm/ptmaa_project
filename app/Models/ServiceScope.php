<?php

namespace App\Models;

use App\Enums\ServiceScopeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceScope extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_pillar_id',
        'type', // barang / jasa
        'title',
        'description',
        'items', // json list of points
        'sort_order',
    ];

    protected $casts = [
        'type' => ServiceScopeType::class,
        'items' => 'array',
        'sort_order' => 'integer',
    ];

    public function pillar(): BelongsTo
    {
        return $this->belongsTo(ServicePillar::class, 'service_pillar_id');
    }
}

