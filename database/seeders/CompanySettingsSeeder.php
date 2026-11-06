<?php

namespace Database\Seeders;

use App\Settings\CompanySettings;
use Illuminate\Database\Seeder;

class CompanySettingsSeeder extends Seeder
{
    public function run(): void
    {
        // Settings default sesuai dokumen resmi PT. Multi Abadi Aksana
        // Data ini dikelola oleh spatie/laravel-settings
        if (class_exists(CompanySettings::class)) {
            try {
                $settings = app(CompanySettings::class);
                $settings->company_name = 'PT. Multi Abadi Aksana';
                $settings->tagline = 'Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan';
                $settings->principle_k3 = 'Utamakan Keselamatan dan Kesehatan Kerja (K3)';
                $settings->vision = 'Menjadi perusahaan penyedia barang dan jasa (general contractor & supplier) yang terpercaya, profesional, berintegritas tinggi, dan berdaya saing tinggi di Indonesia, serta menjadi mitra strategis unggulan dalam penyediaan solusi infrastruktur Penerangan Jalan Umum dan Mechanical & Electrical yang berkelanjutan.';
                $settings->missions = [
                    'Menyediakan produk Penerangan Jalan Umum (Solar Cell & PLN), fabrikasi Impeller, sistem Mechanical & Electrical, serta komponen mekanikal industri dengan standar mutu terbaik, aman, dan tepat spesifikasi.',
                    'Memberikan kepercayaan penuh kepada konsumen baik dalam kualitas maupun pelayanan.',
                    'Berperan aktif dengan pemerintahan maupun swasta dalam mengembangkan usaha untuk membangun negara.',
                    'Mewujudkan sistem manajemen perusahaan yang menjunjung tinggi etika bisnis dan sosial.',
                ];
                $settings->value_points = [
                    'Kualitas Terjamin: Produk dan material berkualitas tinggi sesuai spesifikasi teknis dan standar keselamatan.',
                    'Tenaga Ahli Berpengalaman: Didukung oleh tim profesional yang berpengalaman di bidangnya serta jaringan supplier yang luas.',
                    'Tepat Waktu & Efisien: Komitmen penuh terhadap ketepatan waktu pengerjaan, proses pengadaan yang transparan, dan efisiensi anggaran.',
                ];
                $settings->email_official = 'ptmultiabadiaksana15@gmail.com';
                $settings->whatsapp_main = '+62 823-4297-9898';
                $settings->whatsapp_sparepart = '+62 823-4297-9898';
                $settings->phone_office = '+62 823-4297-9898';
                $settings->address_head_office = 'Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257.';
                $settings->address_workshop = 'Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur.';
                $settings->google_maps_embed_url = 'https://maps.google.com/maps?q=Taman+Surya+Agung+Sidoarjo&t=&z=15&ie=UTF8&iwloc=&output=embed';
                $settings->years_of_experience = 8;
                $settings->projects_completed = 120;
                $settings->units_installed_or_supplied = 1500;
                $settings->partner_clients = 45;
                $settings->company_profile_pdf_path = 'files/ComPro_MULTI_ABADI_AKSANA.pdf';
                $settings->save();
            } catch (\Throwable $e) {
                // Table might not be migrated yet or spatie-settings not bound
            }
        }
    }
}

