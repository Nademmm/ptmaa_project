<?php

namespace App\Models;

use App\Enums\InquiryPipelineStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'company_or_institution',
        'whatsapp_number',
        'email',
        'service_pillar_id',
        'subject',
        'message',
        'pipeline_status',
        'admin_notes',
    ];

    protected $casts = [
        'pipeline_status' => InquiryPipelineStatus::class,
    ];

    public function pillar(): BelongsTo
    {
        return $this->belongsTo(ServicePillar::class, 'service_pillar_id');
    }
}
