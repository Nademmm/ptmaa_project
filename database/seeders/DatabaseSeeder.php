<?php

namespace Database\Seeders;

use App\Enums\InquiryPipelineStatus;
use App\Models\ContactInquiry;
use App\Models\ServicePillar;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Ensure public/images are mirrored into storage/app/public for Filament FileUpload & ImageColumn
        if (File::isDirectory(public_path('images'))) {
            File::ensureDirectoryExists(storage_path('app/public/images'));
            File::copyDirectory(public_path('images'), storage_path('app/public/images'));
        }

        // 1. Seed Default Administrator Account
        User::updateOrCreate(
            ['email' => 'admin@ptmaa.co.id'],
            [
                'name' => 'Admin Utama PT. Multi Abadi Aksana',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Core Business Divisions, Products, Galleries, Posts, and Settings
        $this->call([
            ServicePillarSeeder::class,
            ProductCatalogSeeder::class,
            GallerySeeder::class,
            PostSeeder::class,
            CompanySettingsSeeder::class,
        ]);

        // 3. Seed Sample Contact Inquiries (Mini CRM Pipeline) if empty
        if (ContactInquiry::count() === 0) {
            $pjuPillar = ServicePillar::where('slug', 'penerangan-jalan-umum')->first();
            $mePillar = ServicePillar::where('slug', 'mechanical-electrical')->first();

            ContactInquiry::create([
                'full_name' => 'Ir. Hendra Wijaya',
                'company_or_institution' => 'Dinas Perhubungan Kab. Pasuruan',
                'whatsapp_number' => '081234567890',
                'email' => 'hendra.dishub@pasuruankab.go.id',
                'service_pillar_id' => $pjuPillar?->id,
                'subject' => 'Pengadaan 45 Titik PJU Tenaga Surya Two In One & Tiang Octagonal 9M',
                'message' => 'Mohon dijadwalkan survei titik koordinat dan penawaran spesifikasi teknis untuk rencana pemasangan PJU Tenaga Surya Two In One di ruas jalan penghubung kawasan industri.',
                'pipeline_status' => InquiryPipelineStatus::SURVEI,
                'admin_notes' => 'Tim teknis sudah melakukan survei titik koordinat pada Selasa lalu. Sedang menyusun RAB & gambar teknis.',
            ]);

            ContactInquiry::create([
                'full_name' => 'Budi Santoso, S.T.',
                'company_or_institution' => 'PT. Sinar Baja Manufaktur',
                'whatsapp_number' => '081398765432',
                'email' => 'procurement@sinarbaja.co.id',
                'service_pillar_id' => $mePillar?->id,
                'subject' => 'Fabrikasi & Dynamic Balancing Impeller Blower Stainless Steel',
                'message' => 'Kami membutuhkan fabrikasi ulang 2 unit rotor impeller centrifugal blower bahan SUS 304 beserta jasa bongkar pasang dan balancing di pabrik kami di Rungkut Industri.',
                'pipeline_status' => InquiryPipelineStatus::NEGOSIASI,
                'admin_notes' => 'Penawaran harga sudah dikirim via email resmi. Menunggu PO dari divisi purchasing klien.',
            ]);

            ContactInquiry::create([
                'full_name' => 'Rizky Pratama',
                'company_or_institution' => 'CV. Karya Mandiri Logistik',
                'whatsapp_number' => '082145678912',
                'email' => 'rizky@karyamandiri.com',
                'service_pillar_id' => $mePillar?->id,
                'subject' => 'Suplai Rutin Oli Hidrolik, Grease & Filter Armada',
                'message' => 'Ingin menanyakan ketersediaan kontrak suplai bulanan untuk kebutuhan oli mesin, grease bearing, dan filter udara untuk 18 unit armada truk operasional kami di Sidoarjo.',
                'pipeline_status' => InquiryPipelineStatus::KOMUNIKASI,
                'admin_notes' => 'Baru masuk, segera hubungi via WhatsApp untuk rincian kode part filter dan viskositas oli.',
            ]);
        }
    }
}
