<?php

namespace App\Livewire\Components;

use App\Services\WhatsAppGeneratorService;
use Livewire\Component;

class FloatingWhatsApp extends Component
{
    public function render()
    {
        return view('livewire.components.floating-whats-app', [
            'whatsAppUrl' => WhatsAppGeneratorService::forConsultation(),
        ]);
    }
}
