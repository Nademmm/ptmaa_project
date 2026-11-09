<?php

namespace App\Livewire\Pages;

use App\Models\ServicePillar;
use Illuminate\Support\Facades\View;
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

        View::share([
            'metaDescription' => 'Profil resmi PT. Multi Abadi Aksana (General Trading, Supplier & Contractor di Sidoarjo). Visi, misi, komitmen K3, serta cakupan pengadaan barang dan jasa Penerangan Jalan Umum & Mechanical Electrical.',
            'canonicalUrl' => route('about'),
            'ogImage' => '/images/banners/corporate-meeting.webp',
        ]);

        return view('livewire.pages.about-page', [
            'pillars' => $pillars,
        ]);
    }
}

