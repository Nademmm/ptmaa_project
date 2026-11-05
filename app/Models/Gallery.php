<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_or_unit_code',
        'location',
        'category', // pju, me, interior_exterior, alat_berat_sparepart
        'image_path',
        'description',
        'is_featured',
        'completion_date',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'completion_date' => 'date',
        'sort_order' => 'integer',
    ];
}

