<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'company_name' => 'PT. Multi Abadi Aksana',
            'tagline' => 'Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan',
            'principle_k3' => 'Utamakan Keselamatan dan Kesehatan Kerja (K3)',
            'vision' => 'Menjadi perusahaan penyedia barang dan jasa (general contractor & supplier) yang terpercaya, profesional, berintegritas tinggi, dan berdaya saing tinggi di Indonesia, serta menjadi mitra strategis unggulan dalam penyediaan solusi infrastruktur Penerangan Jalan Umum dan Mechanical & Electrical yang berkelanjutan.',
            'missions' => [
                'Menyediakan produk Penerangan Jalan Umum (Solar Cell & PLN), fabrikasi Impeller presisi, serta instalasi sistem Mechanical & Electrical dengan standar mutu terbaik, aman, dan tepat spesifikasi.',
                'Memberikan kepercayaan penuh kepada konsumen baik dalam kualitas maupun pelayanan.',
                'Berperan aktif dengan pemerintahan maupun swasta dalam mengembangkan usaha untuk membangun negara.',
                'Mewujudkan sistem manajemen perusahaan yang menjunjung tinggi etika bisnis dan sosial.',
            ],
            'value_points' => [
                'Kualitas Terjamin: Produk dan material berkualitas tinggi sesuai spesifikasi teknis dan standar keselamatan.',
                'Tenaga Ahli Berpengalaman: Didukung oleh tim profesional yang berpengalaman di bidangnya serta jaringan supplier yang luas.',
                'Tepat Waktu & Efisien: Komitmen penuh terhadap ketepatan waktu pengerjaan, proses pengadaan yang transparan, dan efisiensi anggaran.',
            ],
            'email_official' => 'ptmultiabadiaksana15@gmail.com',
            'whatsapp_main' => '+62 823-4297-9898',
            'whatsapp_sparepart' => '+62 823-4297-9898',
            'phone_office' => '+62 823-4297-9898',
            'address_head_office' => 'Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257.',
            'address_workshop' => 'Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur.',
            'google_maps_embed_url' => 'https://maps.google.com/maps?q=Taman+Surya+Agung+Sidoarjo&t=&z=15&ie=UTF8&iwloc=&output=embed',
            'years_of_experience' => 8,
            'projects_completed' => 120,
            'units_installed_or_supplied' => 1500,
            'partner_clients' => 45,
        ];

        DB::table('settings')->where('group', 'company')->where('name', 'company_profile_pdf_path')->delete();

        foreach ($defaults as $name => $value) {
            DB::table('settings')->updateOrInsert(
                [
                    'group' => 'company',
                    'name' => $name,
                ],
                [
                    'locked' => false,
                    'payload' => json_encode($value, JSON_UNESCAPED_UNICODE),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
