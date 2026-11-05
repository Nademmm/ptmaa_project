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
            'image_path' => 'gallery/pju-gempol-sidoarjo.jpg',
            'description' => 'Ereksi tiang octagonal hot dip galvanized, penarikan kabel bawah tanah (underground distribution), dan pemasangan armature lampu PJU LED berdaya 120W berstandar keselamatan Dishub.',
            'is_featured' => true,
            'completion_date' => '2024-08-15',
            'sort_order' => 1,
        ]);

        Gallery::create([
            'title' => 'Renovasi Arsitektural & Interior Butik Adelle Jewellery',
            'slug' => 'proyek-interior-adelle-jewellery',
            'client_or_unit_code' => 'Adelle Jewellery Store',
            'location' => 'Pusat Perbelanjaan / Mall Jawa Timur',
            'category' => 'interior_exterior',
            'image_path' => 'gallery/interior-adelle.jpg',
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
            'image_path' => 'gallery/betonisasi-sidoarjo.jpg',
            'description' => 'Pekerjaan sipil pondasi tiang lampu jalan, pengecoran bahu jalan, serta pembuatan manhole jalur distribusi kelistrikan terintegrasi.',
            'is_featured' => true,
            'completion_date' => '2024-09-20',
            'sort_order' => 3,
        ]);

        Gallery::create([
            'title' => 'Perawatan & Pengadaan Komponen Alat Berat Unit PGIC-E34 & PGIC-AB0',
            'slug' => 'perawatan-sparepart-alat-berat-pgic-e34',
            'client_or_unit_code' => 'Armada Alat Berat PGIC-E34 & PGIC-AB0',
            'location' => 'Workshop Lapangan Proyek Tambang/Infrastruktur',
            'category' => 'alat_berat_sparepart',
            'image_path' => 'gallery/alat-berat-pgic.jpg',
            'description' => 'Penggantian suku cadang fast-moving, pelumasan heavy duty hydraulic system, filter replacement, dan rekondisi komponen kelistrikan alat berat.',
            'is_featured' => true,
            'completion_date' => '2024-10-05',
            'sort_order' => 4,
        ]);
    }
}

