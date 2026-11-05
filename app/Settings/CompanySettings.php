<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CompanySettings extends Settings
{
    public string $company_name;
    public string $tagline;
    public string $principle_k3;
    public string $vision;
    public array $missions;
    public array $value_points;

    // Contacts
    public string $email_official;
    public string $whatsapp_main;
    public string $whatsapp_sparepart;
    public string $phone_office;

    // Addresses
    public string $address_head_office;
    public string $address_workshop;
    public ?string $google_maps_embed_url;

    // Home Statistics
    public int $years_of_experience;
    public int $projects_completed;
    public int $units_installed_or_supplied;
    public int $partner_clients;

    // Files
    public ?string $company_profile_pdf_path;

    public static function group(): string
    {
        return 'company';
    }
}

