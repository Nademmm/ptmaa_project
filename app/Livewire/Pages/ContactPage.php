<?php

namespace App\Livewire\Pages;

use App\Enums\InquiryPipelineStatus;
use App\Models\ContactInquiry;
use App\Models\ServicePillar;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Hubungi Kami & Konsultasi Proyek | PT. Multi Abadi Aksana')]
class ContactPage extends Component
{
    #[Validate('required|min:3|max:100')]
    public string $full_name = '';

    #[Validate('nullable|max:150')]
    public string $company_or_institution = '';

    #[Validate('required|min:9|max:20')]
    public string $whatsapp_number = '';

    #[Validate('nullable|email|max:100')]
    public string $email = '';

    #[Validate('nullable|exists:service_pillars,id')]
    public int|string|null $service_pillar_id = null;

    #[Validate('nullable|max:150')]
    public string $subject = '';

    #[Validate('required|min:10')]
    public string $message = '';

    public bool $isSubmitted = false;

    public function submit(): void
    {
        if ($this->service_pillar_id === '') {
            $this->service_pillar_id = null;
        }

        $this->validate();

        $pillarId = filled($this->service_pillar_id) ? (int) $this->service_pillar_id : null;
        $subject = trim($this->subject);
        if ($subject === '') {
            $pillarName = $pillarId ? ServicePillar::find($pillarId)?->name : null;
            $subject = $pillarName ? "Konsultasi Divisi {$pillarName}" : 'Konsultasi Pengadaan & Proyek';
        }

        ContactInquiry::create([
            'full_name' => trim($this->full_name),
            'company_or_institution' => trim($this->company_or_institution) ?: null,
            'whatsapp_number' => trim($this->whatsapp_number),
            'email' => trim($this->email) ?: null,
            'service_pillar_id' => $pillarId,
            'subject' => $subject,
            'message' => trim($this->message),
            'pipeline_status' => InquiryPipelineStatus::KOMUNIKASI,
        ]);

        $this->reset(['full_name', 'company_or_institution', 'whatsapp_number', 'email', 'service_pillar_id', 'subject', 'message']);
        $this->isSubmitted = true;
    }

    public function render()
    {
        $pillars = \Illuminate\Support\Facades\Cache::remember('service_pillars_all', 3600, fn () => ServicePillar::with('scopes')->where('is_active', true)->orderBy('sort_order')->get());

        return view('livewire.pages.contact-page', [
            'pillars' => $pillars,
        ]);
    }
}

