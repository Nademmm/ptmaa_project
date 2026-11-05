<?php

namespace App\Filament\Pages;

use App\Settings\CompanySettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageCompanySettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Pengaturan Sistem';
    protected static ?string $navigationLabel = 'Profil & Kontak PT. MAA';
    protected static string $settings = CompanySettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Perusahaan')
                    ->schema([
                        TextInput::make('company_name')->required()->label('Nama Resmi Perusahaan'),
                        TextInput::make('tagline')->required()->label('Tagline Perusahaan'),
                        TextInput::make('principle_k3')->required()->label('Prinsip Kerja K3'),
                        Textarea::make('vision')->rows(2)->required()->label('Visi Perusahaan'),
                        Repeater::make('missions')
                            ->schema([TextInput::make('item')->required()])
                            ->label('Misi Perusahaan'),
                    ]),

                Section::make('Kontak Resmi & WhatsApp Routing')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('email_official')->required()->email()->label('Email Resmi'),
                                TextInput::make('whatsapp_main')->required()->label('WhatsApp Utama (PJU, ME, Interior)'),
                                TextInput::make('whatsapp_sparepart')->required()->label('WhatsApp Divisi Sparepart'),
                            ]),
                        TextInput::make('address_head_office')->required()->label('Alamat Head Office (Taman, Sidoarjo)'),
                        TextInput::make('address_workshop')->required()->label('Alamat Workshop (Sukodono, Sidoarjo)'),
                        TextInput::make('google_maps_embed_url')->label('Google Maps Embed URL'),
                    ]),

                Section::make('Angka Statistik Beranda (Counter Strip)')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                TextInput::make('years_of_experience')->numeric()->required()->label('Tahun Pengalaman'),
                                TextInput::make('projects_completed')->numeric()->required()->label('Proyek Selesai'),
                                TextInput::make('units_installed_or_supplied')->numeric()->required()->label('Unit Terpasang/Tersuplai'),
                                TextInput::make('partner_clients')->numeric()->required()->label('Mitra Klien'),
                            ]),
                    ]),

                Section::make('Dokumen Company Profile (PDF)')
                    ->schema([
                        FileUpload::make('company_profile_pdf_path')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('files')
                            ->label('File PDF Company Profile'),
                    ]),
            ]);
    }
}

