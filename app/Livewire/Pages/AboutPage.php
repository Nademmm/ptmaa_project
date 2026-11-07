<?php

namespace App\Livewire\Pages;

use App\Models\ServicePillar;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Tentang Kami & Divisi Layanan | PT. Multi Abadi Aksana')]
class AboutPage extends Component
{
    public function render()
    {
        $pillars = \Illuminate\Support\Facades\Cache::remember('service_pillars_all', 3600, fn () => ServicePillar::with('scopes')->where('is_active', true)->orderBy('sort_order')->get());

        return view('livewire.pages.about-page', [
            'pillars' => $pillars,
        ]);
    }
}

