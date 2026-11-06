<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::truncate();

        $galleries = [
            // ==========================================
            // DIVISI 1: PENERANGAN JALAN UMUM
            // ==========================================
            [
                'title' => 'Pemasangan Penerangan Jalan Umum Tenaga Surya & Standar K3',
                'slug' => 'pemasangan-pju-tenaga-surya-gempol-sidoarjo',
                'category' => 'pju',
                'location' => 'Ruas Jalan Gempol, Sidoarjo (Koordinat -7.5238, 112.6974)',
                'completion_date' => '2026-01-13',
                'image_path' => '/images/projects/pju-k3-gempol-sidoarjo.webp',
                'description' => 'Dokumentasi tim teknisi lapangan PT. Multi Abadi Aksana dengan Alat Pelindung Diri (APD) lengkap berstandar K3 pasca instalasi Tiang Penerangan Jalan Umum Octagonal dan Panel Surya.',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Ereksi Tiang Penerangan Jalan Umum dengan Armada Mobil Crane',
                'slug' => 'ereksi-tiang-pju-mobil-crane',
                'category' => 'pju',
                'location' => 'Sidoarjo, Jawa Timur',
                'completion_date' => '2026-01-15',
                'image_path' => '/images/projects/pju-crane-erection.webp',
                'description' => 'Proses pengangkatan dan pendirian (erection) tiang Penerangan Jalan Umum menggunakan armada truk crane teleskopik di titik pondasi tepi jalan raya.',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Instalasi Modul Solar Panel & Armature di Puncak Tiang',
                'slug' => 'instalasi-modul-solar-panel-armature-pju',
                'category' => 'pju',
                'location' => 'Jawa Timur',
                'completion_date' => '2026-01-18',
                'image_path' => '/images/projects/pju-instalasi-panel-tiang.webp',
                'description' => 'Pekerjaan ketinggian pemasangan bracket modul surya dan armature lampu Penerangan Jalan Umum menggunakan keranjang kerja crane dengan pengawasan penuh dari bawah.',
                'is_featured' => false,
                'sort_order' => 3,
            ],
            [
                'title' => 'Pengecoran Pondasi Beton & Pemasangan Baseplate Angkur Tiang',
                'slug' => 'pengecoran-pondasi-beton-baseplate-angkur-pju',
                'category' => 'pju',
                'location' => 'Jawa Timur',
                'completion_date' => '2026-01-20',
                'image_path' => '/images/projects/pju-pondasi-baseplate.webp',
                'description' => 'Tahap pekerjaan sipil pemasangan flensa baseplate tiang Penerangan Jalan Umum pada baut angkur pondasi beton menggunakan kunci torsi oleh teknisi.',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Jaringan Penerangan Jalan Umum Jalan Tol & Jalan Raya Utama',
                'slug' => 'jaringan-pju-jalan-tol-utama',
                'category' => 'pju',
                'location' => 'Jawa Timur',
                'completion_date' => '2026-01-25',
                'image_path' => '/images/projects/pju-tiang-jalan-tol.webp',
                'description' => 'Deretan tiang Penerangan Jalan Umum lengan ganda yang telah terpasang rapi di sepanjang median jalan bebas hambatan untuk menjamin visibilitas dan keselamatan berkendara.',
                'is_featured' => false,
                'sort_order' => 5,
            ],

            // ==========================================
            // DIVISI 2: MECHANICAL & ELECTRICAL
            // ==========================================
            [
                'title' => 'Fabrikasi & Rekondisi Impeller Rotor Stainless Steel',
                'slug' => 'fabrikasi-rekondisi-impeller-rotor-stainless-steel',
                'category' => 'mechanical_electrical',
                'location' => 'Fasilitas Industri Jawa Timur',
                'completion_date' => '2026-02-02',
                'image_path' => '/images/projects/me-impeller-rotor-stainless.webp',
                'description' => 'Pengerjaan fabrikasi dan perawatan teknis komponen bilah rotor Impeller sentrifugal berbahan stainless steel untuk sistem sirkulasi udara pabrik.',
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'Overhaul & Pembersihan Housing Blower Industri PGIC-E34',
                'slug' => 'overhaul-housing-blower-industri-pgic-e34',
                'category' => 'mechanical_electrical',
                'location' => 'Area Pabrik Industri',
                'completion_date' => '2026-02-05',
                'image_path' => '/images/projects/me-housing-blower-pgic-e34.webp',
                'description' => 'Tim teknisi Mechanical & Electrical PT. Multi Abadi Aksana melakukan pembongkaran dan pembersihan bagian dalam rumah keong (volute housing) blower industri kode unit PGIC-E34.',
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Inspeksi Transmisi V-Belt, Pulley & Motor Penggerak Blower',
                'slug' => 'inspeksi-transmisi-vbelt-pulley-motor-industri',
                'category' => 'mechanical_electrical',
                'location' => 'Area Pabrik Industri',
                'completion_date' => '2026-02-08',
                'image_path' => '/images/projects/me-belt-motor-industri.webp',
                'description' => 'Pemeriksaan ketegangan V-belt, kesejajaran pulley, bearing, dan kondisi motor listrik penggerak dalam program preventive maintenance mekanikal.',
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'title' => 'Pemasangan Flange & Ducting Sistem Sirkulasi Udara Industri',
                'slug' => 'pemasangan-flange-ducting-sirkulasi-udara',
                'category' => 'mechanical_electrical',
                'location' => 'Area Pabrik Industri',
                'completion_date' => '2026-02-10',
                'image_path' => '/images/projects/me-instalasi-flange-ducting.webp',
                'description' => 'Pengencangan baut sambungan flange ducting dan perpipaan udara bertekanan menggunakan peralatan keselamatan kerja lengkap.',
                'is_featured' => false,
                'sort_order' => 9,
            ],
            [
                'title' => 'Preventive Maintenance Mesin Pabrik dengan Standar APD K3',
                'slug' => 'preventive-maintenance-mesin-pabrik-apd-k3',
                'category' => 'mechanical_electrical',
                'location' => 'Area Pabrik Industri',
                'completion_date' => '2026-02-12',
                'image_path' => '/images/projects/me-maintenance-apd-lengkap.webp',
                'description' => 'Penerapan disiplin Keselamatan dan Kesehatan Kerja (K3) menggunakan respirator, helm proyek, dan sarung tangan pelindung saat menangani ruang mesin berdebu.',
                'is_featured' => false,
                'sort_order' => 10,
            ],
            [
                'title' => 'Terminasi Kabel Distribusi Bawah Tanah & Grounding Elektrikal',
                'slug' => 'terminasi-kabel-distribusi-bawah-tanah-grounding',
                'category' => 'mechanical_electrical',
                'location' => 'Jawa Timur',
                'completion_date' => '2026-02-14',
                'image_path' => '/images/projects/me-terminasi-kabel-pondasi.webp',
                'description' => 'Penyambungan dan isolasi kabel daya tegangan rendah pada jalur conduit pondasi tiang untuk memastikan keamanan aliran listrik bebas korsleting.',
                'is_featured' => false,
                'sort_order' => 11,
            ],
        ];

        foreach ($galleries as $item) {
            Gallery::create($item);
        }
    }
}
