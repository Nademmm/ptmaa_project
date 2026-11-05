<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create([
            'title' => 'Pengadaan & Pemasangan PJU Ruas Gempol - Sidoarjo - Malang',
            'slug' => 'proyek-pju-ruas-gempol-sidoarjo-malang',
            'client_or_unit_code' => 'Dinas Perhubungan & Balai Jalan',
            'location' => 'Jalur Utama Gempol - Sidoarjo - Malang, Jawa Timur',
            'category' => 'pju',
            'image_path' => '/galeri/galeri1.webp',
            'description' => 'Ereksi tiang octagonal hot dip galvanized, penarikan kabel bawah tanah (underground distribution), dan pemasangan armature lampu PJU LED berdaya 120W berstandar keselamatan Dishub.',
            'is_featured' => true,
            'completion_date' => '2024-08-15',
            'sort_order' => 1,
        ]);

        Gallery::create([
            'title' => 'Renovasi Arsitektural & Interior Butik Adelle Jewellery',
            'slug' => 'proyek-interior-adelle-jewellery',
            'client_or_unit_code' => 'Adelle Jewellery Store',
            'location' => 'Pusat Perbelanjaan Jawa Timur',
            'category' => 'interior_exterior',
            'image_path' => '/galeri/galeri2.webp',
            'description' => 'Pekerjaan custom display cabinet kaca presisi, aksen dinding wall panel, lighting spot dekoratif, dan partisi akustik mewah untuk gerai perhiasan premium.',
            'is_featured' => true,
            'completion_date' => '2024-05-10',
            'sort_order' => 2,
        ]);

        Gallery::create([
            'title' => 'Pekerjaan Infrastruktur Betonisasi Jalan & Saluran Sidoarjo',
            'slug' => 'pekerjaan-betonisasi-jalan-sidoarjo',
            'client_or_unit_code' => 'Dinas PU Bina Marga',
            'location' => 'Kabupaten Sidoarjo, Jawa Timur',
            'category' => 'pju',
            'image_path' => '/galeri/galeri3.webp',
            'description' => 'Pekerjaan sipil pondasi tiang lampu jalan, pengecoran bahu jalan, serta pembuatan manhole jalur distribusi kelistrikan terintegrasi.',
            'is_featured' => true,
            'completion_date' => '2024-09-20',
            'sort_order' => 3,
        ]);

        Gallery::create([
            'title' => 'Perawatan & Pengadaan Komponen Alat Berat Unit PGIC-E34 & PGIC-AB0',
            'slug' => 'perawatan-sparepart-alat-berat-pgic-e34',
            'client_or_unit_code' => 'Armada Alat Berat PGIC-E34 & PGIC-AB0',
            'location' => 'Workshop Lapangan Proyek Infrastruktur',
            'category' => 'alat_berat_sparepart',
            'image_path' => '/galeri/galeri4.webp',
            'description' => 'Penggantian suku cadang fast-moving, pelumasan heavy duty hydraulic system, filter replacement, dan rekondisi komponen kelistrikan alat berat.',
            'is_featured' => true,
            'completion_date' => '2024-10-05',
            'sort_order' => 4,
        ]);

        Gallery::create([
            'title' => 'Instalasi PJU Tenaga Surya All In One Kawasan Industri',
            'slug' => 'instalasi-pju-tenaga-surya-kawasan-industri',
            'client_or_unit_code' => 'Kawasan Industri Jawa Timur',
            'location' => 'Sidoarjo & Pasuruan, Jawa Timur',
            'category' => 'pju',
            'image_path' => '/galeri/galeri5.webp',
            'description' => 'Pemasangan unit PJU Tenaga Surya All In One Integrated lengkap dengan stang ornamen dan pondasi beton bertulang.',
            'is_featured' => false,
            'completion_date' => '2024-07-12',
            'sort_order' => 5,
        ]);

        Gallery::create([
            'title' => 'Fabrikasi & Balancing Impeller Pompa Sirkulasi Pabrik',
            'slug' => 'fabrikasi-balancing-impeller-pompa-pabrik',
            'client_or_unit_code' => 'Divisi Mechanical & Electrical',
            'location' => 'Surabaya, Jawa Timur',
            'category' => 'mechanical_electrical',
            'image_path' => '/galeri/galeri6.webp',
            'description' => 'Rekondisi dan fabrikasi rotor impeller stainless steel dengan pengujian dynamic balancing presisi tinggi.',
            'is_featured' => false,
            'completion_date' => '2024-06-18',
            'sort_order' => 6,
        ]);

        Gallery::create([
            'title' => 'Pemasangan Panel Distribusi MDP & SDP Gedung Komersial',
            'slug' => 'pemasangan-panel-distribusi-mdp-sdp',
            'client_or_unit_code' => 'Proyek M&E Komersial',
            'location' => 'Surabaya & Malang',
            'category' => 'mechanical_electrical',
            'image_path' => '/galeri/galeri7.webp',
            'description' => 'Perakitan dan commissioning panel listrik utama (MDP) serta penarikan jalur kabel tray berstandar K3.',
            'is_featured' => false,
            'completion_date' => '2024-04-22',
            'sort_order' => 7,
        ]);

        Gallery::create([
            'title' => 'Distribusi Pelumas Drum & Suku Cadang Armada Proyek',
            'slug' => 'distribusi-pelumas-drum-suku-cadang',
            'client_or_unit_code' => 'Divisi Sparepart & Equipment',
            'location' => 'Jawa Timur',
            'category' => 'alat_berat_sparepart',
            'image_path' => '/galeri/galeri8.webp',
            'description' => 'Pengiriman rutin oli hidrolik, oli mesin diesel beban berat, dan filter alat berat ke lokasi operasional mitra.',
            'is_featured' => false,
            'completion_date' => '2024-11-01',
            'sort_order' => 8,
        ]);
    }
}
