<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        // === PILAR 1: PROJEK ON DUTY PJU (Halaman 6 & 7 ComPro) ===
        Gallery::create([
            'title' => 'Penerapan K3 & Persiapan Tiang Octagonal PJU Ruas Gempol - Sidoarjo - Malang',
            'slug' => 'pju-k3-persiapan-tiang-gempol-sidoarjo-malang',
            'client_or_unit_code' => 'Projek On Duty - Divisi PJU',
            'location' => 'Ruas Jalan Tol Gempol - Sidoarjo - Malang, Jawa Timur',
            'category' => 'pju',
            'image_path' => '/images/projects/pju-k3-gempol-sidoarjo.webp',
            'description' => 'Tim lapangan PT. Multi Abadi Aksana melakukan pengecekan baseplate tiang PJU octagonal dengan rambu Utamakan Keselamatan dan Kesehatan Kerja (K3) serta armada crane di jalur Gempol - Sidoarjo - Malang.',
            'is_featured' => true,
            'completion_date' => '2024-08-15',
            'sort_order' => 1,
        ]);

        Gallery::create([
            'title' => 'Ereksi & Pendirian Tiang PJU Menggunakan Truk Crane Hidrolik',
            'slug' => 'ereksi-pendirian-tiang-pju-crane-hidrolik',
            'client_or_unit_code' => 'Projek On Duty - Divisi PJU',
            'location' => 'Jalur Utama Sidoarjo - Jawa Timur',
            'category' => 'pju',
            'image_path' => '/images/projects/pju-crane-erection.webp',
            'description' => 'Proses pengangkatan dan ereksi (pendirian) tiang PJU menggunakan truk crane di bahu jalan tol dengan pengamanan traffic cone dan personel ber-APD lengkap.',
            'is_featured' => false,
            'completion_date' => '2024-08-18',
            'sort_order' => 2,
        ]);

        Gallery::create([
            'title' => 'Pekerjaan Sipil Pondasi Beton & Jalur Kabel Bawah Tanah PJU',
            'slug' => 'pekerjaan-sipil-pondasi-beton-jalur-kabel-pju',
            'client_or_unit_code' => 'Projek On Duty - Sipil & PJU',
            'location' => 'Kabupaten Sidoarjo, Jawa Timur',
            'category' => 'pju',
            'image_path' => '/images/projects/pju-sipil-bahu-jalan.webp',
            'description' => 'Pekerjaan sipil penggalian tanah, pengecoran pondasi beton tiang PJU, serta pembuatan jalur kabel distribusi bawah tanah dengan pengamanan road barrier.',
            'is_featured' => false,
            'completion_date' => '2024-08-20',
            'sort_order' => 3,
        ]);

        Gallery::create([
            'title' => 'Instalasi Komponen Kelistrikan & Panel pada Tiang PJU',
            'slug' => 'instalasi-kelistrikan-panel-tiang-pju',
            'client_or_unit_code' => 'Projek On Duty - Teknisi PJU',
            'location' => 'Ruas Tol Jawa Timur',
            'category' => 'pju',
            'image_path' => '/images/projects/pju-instalasi-panel-tiang.webp',
            'description' => 'Teknisi PT. Multi Abadi Aksana melakukan penyambungan kabel daya dan perakitan terminal kontrol di dalam pintu inspeksi tiang PJU.',
            'is_featured' => false,
            'completion_date' => '2024-08-25',
            'sort_order' => 4,
        ]);

        Gallery::create([
            'title' => 'Pengujian & Komisioning Jaringan Tiang PJU Parabola Jalan Tol',
            'slug' => 'pengujian-komisioning-tiang-pju-parabola-jalan-tol',
            'client_or_unit_code' => 'Projek On Duty - Testing & Commissioning',
            'location' => 'Ruas Jalan Tol Jawa Timur',
            'category' => 'pju',
            'image_path' => '/images/projects/pju-tiang-jalan-tol.webp',
            'description' => 'Verifikasi akhir berdirinya tiang PJU parabola dan pengujian sistem kelistrikan untuk memastikan tingkat pencahayaan memenuhi standar keselamatan jalan.',
            'is_featured' => false,
            'completion_date' => '2024-08-28',
            'sort_order' => 5,
        ]);

        // === PILAR 2: PROJEK ON DUTY INTERIOR & EXTERIOR (Halaman 8 & 9 ComPro) ===
        Gallery::create([
            'title' => 'Pekerjaan Konstruksi & Finishing Interior Butik Adelle Jewellery',
            'slug' => 'konstruksi-finishing-interior-adelle-jewellery',
            'client_or_unit_code' => 'Adelle Jewellery',
            'location' => 'Pusat Perbelanjaan, Jawa Timur',
            'category' => 'interior_exterior',
            'image_path' => '/images/projects/interior-adelle-jewellery.webp',
            'description' => 'Pengerjaan tata ruang interior, perakitan meja display kaca berbingkai brass gold, instalasi lantai marmer/karpet, dan pencahayaan dekoratif pada gerai Adelle Jewellery.',
            'is_featured' => true,
            'completion_date' => '2024-05-14',
            'sort_order' => 6,
        ]);

        Gallery::create([
            'title' => 'Penataan Ruang Kerja Eksekutif, Partisi Kaca & Custom Furniture',
            'slug' => 'penataan-ruang-kerja-eksekutif-partisi-kaca',
            'client_or_unit_code' => 'Projek On Duty - Interior Kantor',
            'location' => 'Surabaya & Sidoarjo, Jawa Timur',
            'category' => 'interior_exterior',
            'image_path' => '/images/projects/interior-ruang-kerja-partisi.webp',
            'description' => 'Pemasangan wall panel dinding, partisi kaca rangka aluminium hitam, karpet tile kantor, linear pendant lamp, dan pengadaan custom furniture ruang kerja.',
            'is_featured' => false,
            'completion_date' => '2024-06-10',
            'sort_order' => 7,
        ]);

        Gallery::create([
            'title' => 'Pengerjaan Interior, Lantai Vinyl & Plafon Ruang Rawat Medis',
            'slug' => 'pengerjaan-interior-lantai-vinyl-ruang-medis',
            'client_or_unit_code' => 'Projek On Duty - Fasilitas Kesehatan',
            'location' => 'Jawa Timur',
            'category' => 'interior_exterior',
            'image_path' => '/images/projects/interior-ruang-medis.webp',
            'description' => 'Instalasi lantai vinyl medis higienis, meja konter bermotif marmer, plafon gipsum dengan panel lampu LED, kisi AC diffuser, serta pintu aluminium.',
            'is_featured' => false,
            'completion_date' => '2024-07-02',
            'sort_order' => 8,
        ]);

        Gallery::create([
            'title' => 'Instalasi Karpet Kantor, Partisi Kaca & Koridor Gedung Komersial',
            'slug' => 'instalasi-karpet-kantor-partisi-kaca-koridor',
            'client_or_unit_code' => 'Projek On Duty - Interior Gedung',
            'location' => 'Jawa Timur',
            'category' => 'interior_exterior',
            'image_path' => '/images/projects/interior-koridor-kantor.webp',
            'description' => 'Penataan lantai karpet kantor bermotif garis modern, pemasangan partisi kaca ruang rapat, pengecatan dinding, dan instalasi plafon akustik.',
            'is_featured' => false,
            'completion_date' => '2024-07-19',
            'sort_order' => 9,
        ]);

        // === PILAR 3 & 4: PROJEK ON DUTY MECHANICAL ELECTRICAL & ALAT/MESIN (Halaman 4, 10, 11 ComPro) ===
        Gallery::create([
            'title' => 'Fabrikasi & Instalasi Impeller Stainless Steel pada Unit PGIC-E34',
            'slug' => 'fabrikasi-instalasi-impeller-stainless-unit-pgic-e34',
            'client_or_unit_code' => 'Unit Mesin Industri PGIC-E34',
            'location' => 'Fasilitas Pabrik Industri, Jawa Timur',
            'category' => 'mechanical_electrical',
            'image_path' => '/images/projects/me-impeller-rotor-stainless.webp',
            'description' => 'Pengadaan dan pemasangan rotor impeller stainless steel beserta poros (shaft) presisi pada sistem saluran udara/blower vertikal kode unit PGIC-E34.',
            'is_featured' => true,
            'completion_date' => '2024-09-12',
            'sort_order' => 10,
        ]);

        Gallery::create([
            'title' => 'Terminasi Kabel Distribusi Bawah Tanah & Pengukuran Waterpass Pondasi',
            'slug' => 'terminasi-kabel-distribusi-bawah-tanah-pondasi',
            'client_or_unit_code' => 'Projek On Duty - Mechanical & Electrical',
            'location' => 'Sidoarjo, Jawa Timur',
            'category' => 'mechanical_electrical',
            'image_path' => '/images/projects/me-terminasi-kabel-pondasi.webp',
            'description' => 'Pekerjaan penarikan kabel distribusi tegangan rendah/menengah, penyambungan inti kabel pada angkur pondasi, serta pengukuran kelurusan menggunakan waterpass.',
            'is_featured' => true,
            'completion_date' => '2024-09-20',
            'sort_order' => 11,
        ]);

        Gallery::create([
            'title' => 'Inspeksi & Perbaikan Housing Blower Sentrifugal Unit PGIC-E34',
            'slug' => 'inspeksi-perbaikan-housing-blower-sentrifugal-pgic-e34',
            'client_or_unit_code' => 'Unit Mesin Industri PGIC-E34',
            'location' => 'Workshop & Pabrik Industri',
            'category' => 'alat_berat_sparepart',
            'image_path' => '/images/projects/me-housing-blower-pgic-e34.webp',
            'description' => 'Pembongkaran casing keong (volute housing) blower sentrifugal PGIC-E34 untuk inspeksi ruang impeller, pembersihan kerak industri, dan penggantian suku cadang aus.',
            'is_featured' => false,
            'completion_date' => '2024-10-03',
            'sort_order' => 12,
        ]);

        Gallery::create([
            'title' => 'Perawatan Motor Penggerak, Pulley, V-Belt & Bearing Blower Industri',
            'slug' => 'perawatan-motor-penggerak-pulley-vbelt-bearing',
            'client_or_unit_code' => 'Projek On Duty - Maintenance M&E & Sparepart',
            'location' => 'Pabrik Industri, Jawa Timur',
            'category' => 'alat_berat_sparepart',
            'image_path' => '/images/projects/me-belt-motor-industri.webp',
            'description' => 'Pekerjaan preventive maintenance pada motor listrik penggerak utama, penyetelan ketegangan V-belt, pelumasan grease pada pillow block bearing, dan uji putaran.',
            'is_featured' => false,
            'completion_date' => '2024-10-10',
            'sort_order' => 13,
        ]);
    }
}
