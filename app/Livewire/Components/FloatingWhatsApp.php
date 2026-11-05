<?php

namespace App\Livewire\Components;

use App\Services\WhatsAppGeneratorService;
use Livewire\Component;

class FloatingWhatsApp extends Component
{
    public function render()
    {
        $mainWa = WhatsAppGeneratorService::formatPhoneNumber(WhatsAppGeneratorService::DEFAULT_MAIN_PHONE);
        $sparepartWa = WhatsAppGeneratorService::formatPhoneNumber(WhatsAppGeneratorService::DEFAULT_SPAREPART_PHONE);

        return view('livewire.components.floating-whats-app', [
            'mainWaUrl' => "https://wa.me/{$mainWa}?text=" . urlencode("Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa."),
            'sparepartWaUrl' => "https://wa.me/{$sparepartWa}?text=" . urlencode("Halo Admin Divisi Sparepart PT. Multi Abadi Aksana, saya ingin menanyakan suku cadang / pelumas."),
        ]);
    }
}

