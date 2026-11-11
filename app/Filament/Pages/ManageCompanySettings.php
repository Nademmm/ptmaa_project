<?php

namespace App\Filament\Pages;

use App\Settings\CompanySettings;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageCompanySettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Pengaturan & Administrasi';

    protected static ?string $navigationLabel = 'Profil & Kontak Perusahaan';

    protected static ?string $title = 'Pengaturan Profil & Kontak PT. Multi Abadi Aksana';

    protected static ?int $navigationSort = 1;

    protected static string $settings = CompanySettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Resmi Perusahaan')
                    ->description('Informasi utama identitas korporat PT. Multi Abadi Aksana.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('company_name')
                                    ->required()
                                    ->label('Nama Resmi Perusahaan'),
                                TextInput::make('principle_k3')
                                    ->required()
                                    ->label('Prinsip Kerja K3'),
                            ]),
                        TextInput::make('tagline')
                            ->required()
                            ->label('Tagline Resmi Perusahaan'),
                        Textarea::make('vision')
                            ->rows(3)
                            ->required()
                            ->label('Visi Perusahaan'),
                        Repeater::make('missions')
                            ->simple(
                                TextInput::make('mission')
                                    ->required()
                                    ->placeholder('Tuliskan poin misi perusahaan...')
                            )
                            ->defaultItems(4)
                            ->addActionLabel('Tambah Poin Misi')
                            ->label('Misi Perusahaan'),
                        Repeater::make('value_points')
                            ->simple(
                                TextInput::make('value_point')
                                    ->required()
                                    ->placeholder('Tuliskan poin keunggulan perusahaan...')
                            )
                            ->defaultItems(3)
                            ->addActionLabel('Tambah Poin Keunggulan')
                            ->label('Poin Nilai Keunggulan Perusahaan'),
                    ]),

                Section::make('Kontak Resmi & Lokasi Sidoarjo')
                    ->description('Nomor WhatsApp, telepon, alamat email resmi, dan lokasi kantor/workshop di Sidoarjo.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('email_official')
                                    ->required()
                                    ->email()
                                    ->label('Email Resmi Perusahaan'),
                                TextInput::make('phone_office')
                                    ->required()
                                    ->label('Telepon Kantor Resmi'),
                                TextInput::make('whatsapp_main')
                                    ->required()
                                    ->label('WhatsApp Resmi Utama (Semua Divisi)'),
                                TextInput::make('whatsapp_sparepart')
                                    ->required()
                                    ->label('WhatsApp Operasional Teknis & Workshop'),
                            ]),
                        Textarea::make('address_head_office')
                            ->rows(2)
                            ->required()
                            ->label('Alamat Head Office (Kec. Taman, Sidoarjo)'),
                        Textarea::make('address_workshop')
                            ->rows(2)
                            ->required()
                            ->label('Alamat Workshop & Operasional Teknis (Sukodono, Sidoarjo)'),
                        TextInput::make('google_maps_embed_url')
                            ->url()
                            ->label('URL Embed Google Maps'),
                    ]),

                Section::make('Statistik & Rekam Jejak Perusahaan')
                    ->description('Data pencapaian perusahaan untuk keperluan profil korporat.')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                TextInput::make('years_of_experience')
                                    ->numeric()
                                    ->required()
                                    ->label('Tahun Pengalaman'),
                                TextInput::make('projects_completed')
                                    ->numeric()
                                    ->required()
                                    ->label('Proyek Selesai'),
                                TextInput::make('units_installed_or_supplied')
                                    ->numeric()
                                    ->required()
                                    ->label('Unit Terpasang / Tersuplai'),
                                TextInput::make('partner_clients')
                                    ->numeric()
                                    ->required()
                                    ->label('Mitra Klien'),
                            ]),
                    ]),
            ]);
    }
}
