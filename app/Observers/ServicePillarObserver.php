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
        $this->clearCache($pillar);
    }

    public function deleted(ServicePillar $pillar): void
    {
        $this->clearCache($pillar);
    }

    private function clearCache(ServicePillar $pillar): void
    {
        Cache::forget('service_pillars_all');
        Cache::forget("service_pillar_{$pillar->slug}");

        $originalSlug = $pillar->getOriginal('slug');
        if ($originalSlug && $originalSlug !== $pillar->slug) {
            Cache::forget("service_pillar_{$originalSlug}");
        }
    }
}

