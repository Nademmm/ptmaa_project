<?php

namespace App\Livewire\Components;

use App\Services\WhatsAppGeneratorService;
use Livewire\Component;

class FloatingWhatsApp extends Component
{
    public function render()
    {
        $phone = WhatsAppGeneratorService::formatPhoneNumber(WhatsAppGeneratorService::DEFAULT_MAIN_PHONE);

        return view('livewire.components.floating-whats-app', [
            'whatsAppUrl' => "https://wa.me/{$phone}?text=" . urlencode("Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa."),
        ]);
    }
}
