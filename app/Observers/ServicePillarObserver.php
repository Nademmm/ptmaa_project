<?php

namespace App\Observers;

use App\Models\ServicePillar;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ServicePillarObserver
{
    public function creating(ServicePillar $pillar): void
    {
        if (empty($pillar->slug)) {
            $pillar->slug = Str::slug($pillar->name);
        }
    }

    public function saved(ServicePillar $pillar): void
    {
        Cache::forget('service_pillars_all');
        Cache::forget("service_pillar_{$pillar->slug}");
    }

    public function deleted(ServicePillar $pillar): void
    {
        Cache::forget('service_pillars_all');
        Cache::forget("service_pillar_{$pillar->slug}");
    }
}

