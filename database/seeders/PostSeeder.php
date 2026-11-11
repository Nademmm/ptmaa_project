<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $catPju = PostCategory::firstOrCreate(
            ['slug' => 'penerangan-jalan-umum'],
            [
                'name' => 'Penerangan Jalan Umum',
                'description' => 'Edukasi teknis mengenai PJU Tenaga Surya (All In One, Two In One, Konvensional), PJU PLN, dan konstruksi tiang.',
            ]
        );

        $catMe = PostCategory::firstOrCreate(
            ['slug' => 'mechanical-electrical-impeller'],
            [
                'name' => 'Mechanical & Electrical',
                'description' => 'Wawasan teknis sistem elektrikal MDP/SDP, fabrikasi impeller industri, dan perawatan peralatan pabrik.',
            ]
        );

        PostCategory::where('slug', 'sparepart-konstruksi-k3')->delete();
        Post::where('slug', 'pentingnya-kualitas-sparepart-dan-standar-k3-dalam-proyek-konstruksi')->delete();

        $catK3 = PostCategory::updateOrCreate(
            ['slug' => 'standar-k3-konstruksi-industri'],
            [
                'name' => 'Standar K3 & Konstruksi',
                'description' => 'Disiplin penerapan Keselamatan dan Kesehatan Kerja (K3) pada proyek konstruksi Penerangan Jalan Umum dan rekayasa Mechanical & Electrical.',
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'mengenal-3-konfigurasi-pju-tenaga-surya-dan-kelebihan-pju-pln'],
            [
                'post_category_id' => $catPju->id,
                'title' => 'Mengenal 3 Konfigurasi PJU Tenaga Surya (All In One, Two In One, Konvensional) & PJU PLN',
                'featured_image' => 'images/projects/pju-k3-gempol-sidoarjo.webp',
                'excerpt' => 'Panduan lengkap memahami perbedaan desain PJU All In One, Two In One dengan klem lengan fleksibel, PJU Konvensional, serta pilihan lampu PJU PLN (COB, Osram, Philips, Estika).',
                'content' => "Dalam perencanaan infrastruktur Penerangan Jalan Umum (PJU), pemilihan sistem pencahayaan harus disesuaikan dengan kondisi geografis, ketersediaan jaringan listrik, serta target efisiensi anggaran jangka panjang.\n\nBerdasarkan standar pengadaan PT. Multi Abadi Aksana, sistem PJU Tenaga Surya terbagi ke dalam tiga konfigurasi utama. Pertama, PJU All In One di mana kontroler, baterai, dan solar panel menyatu di dalam satu wadah atau rumah lampu konkret sehingga bekerja mandiri secara ringkas. Kedua, PJU Two In One di mana lampu, kontroler, dan baterai berada dalam satu rumah lampu, sedangkan panel solar terpisah di atasnya dan dipadukan dengan tiang berlengan klem fleksibel. Ketiga, PJU Konvensional (Split System) di mana lampu, solar panel, dan box sistem baterai terpasang terpisah dengan konstruksi yang kokoh.\n\nUntuk jalan arteri dengan pasokan listrik stabil, sistem PJU PLN menggunakan tiang parabola melengkung dan armature lampu LED hemat energi (COB, OSRAM, PHILIPS, maupun ESTIKA) tetap menjadi andalan karena intensitas cahayanya dapat diatur serta diintegrasikan dengan Smart Lighting Controller.",
                'meta_title' => 'Mengenal Konfigurasi PJU Tenaga Surya & PJU PLN | PT. Multi Abadi Aksana',
                'meta_description' => 'Perbandingan teknis PJU All In One, Two In One, Konvensional, dan PJU PLN (COB, Osram, Philips, Estika) dari PT. Multi Abadi Aksana.',
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'perawatan-dan-fabrikasi-impeller-serta-sistem-elektrikal-industri'],
            [
                'post_category_id' => $catMe->id,
                'title' => 'Fabrikasi Impeller Presisi & Pemeliharaan Berkala Sistem Mekanikal-Elektrikal Pabrik',
                'featured_image' => 'images/projects/me-impeller-rotor-stainless.webp',
                'excerpt' => 'Bagaimana rekondisi komponen impeller blower dan preventive maintenance pada panel MDP/SDP, trafo, serta motor industri menjaga kontinuitas operasional pabrik.',
                'content' => "Komponen mekanikal berputar seperti impeller pada sistem blower sentrifugal dan sirkulasi udara pabrik (seperti unit PGIC-E34) bekerja di bawah paparan debu, suhu tinggi, dan beban kontinu. Kerusakan atau keausan pada bilah impeller maupun bearing penopang dapat menurunkan efisiensi hisap/hembus dan memicu getaran berlebih pada motor penggerak.\n\nPT. Multi Abadi Aksana menyediakan layanan pengadaan barang sekaligus jasa fabrikasi dan perbaikan teknis untuk komponen impeller stainless steel, penggantian V-belt, bearing, hingga pembersihan volute housing secara menyeluruh.\n\nDi sisi kelistrikan, tim Mechanical & Electrical kami juga menangani perakitan Panel Utama (MDP/SDP), panel otomatis ATS/AMF, penarikan kabel distribusi tegangan rendah maupun menengah (NYA, NYM, NYY, XLPE), hingga pengujian beban listrik dan perawatan rutin berkala (preventive maintenance) pada trafo, genset, dan unit HVAC.",
                'meta_title' => 'Fabrikasi Impeller & Maintenance Mekanikal Elektrikal | PT. Multi Abadi Aksana',
                'meta_description' => 'Layanan fabrikasi impeller industri, instalasi panel MDP/SDP, dan preventive maintenance pabrik oleh PT. Multi Abadi Aksana.',
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'penerapan-standar-k3-pada-instalasi-pju-dan-mechanical-electrical'],
            [
                'post_category_id' => $catK3->id,
                'title' => 'Disiplin Standar K3 & APD Lengkap pada Proyek PJU dan Mechanical Electrical',
                'featured_image' => 'images/projects/me-maintenance-apd-lengkap.webp',
                'excerpt' => 'Komitmen PT. Multi Abadi Aksana dalam menerapkan protokol Keselamatan dan Kesehatan Kerja (K3) serta kelengkapan Alat Pelindung Diri (APD) di setiap titik proyek.',
                'content' => "Keberhasilan eksekusi proyek infrastruktur Penerangan Jalan Umum (PJU) dan rekayasa Mechanical & Electrical industri sangat ditentukan oleh dua faktor utama: ketepatan spesifikasi teknis dan keselamatan personel di lapangan.\n\nSetiap personel teknis PT. Multi Abadi Aksana wajib mengenakan Alat Pelindung Diri (APD) berstandar K3 lengkap, meliputi helm keselamatan proyek, sarung tangan pelindung tahan kerja berat, seragam lengan panjang, rompi visibilitas tinggi (high-visibility vest), sepatu safety, serta respirator saat bekerja di ruang mesin atau area pabrik berdebu.\n\nBaik dalam pekerjaan pendirian tiang PJU menggunakan armada mobil crane, pengecoran pondasi beton, maupun fabrikasi Impeller blower dan pengujian panel distribusi MDP/SDP, prinsip utama kami selalu dijalankan secara konsisten: Utamakan Keselamatan dan Kesehatan Kerja (K3) dari tahap Survei hingga Serah Terima Pekerjaan.",
                'meta_title' => 'Standar K3 Proyek PJU & Mechanical Electrical | PT. Multi Abadi Aksana',
                'meta_description' => 'Komitmen penerapan standar K3 dan APD lengkap PT. Multi Abadi Aksana pada instalasi Penerangan Jalan Umum dan Mechanical Electrical di Jawa Timur.',
                'published_at' => now()->subDay(),
                'is_published' => true,
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'panduan-desain-interior-furnish-dan-fasad-eksterior-modern'],
            [
                'post_category_id' => $catMe->id,
                'title' => 'Panduan Komprehensif Desain Interior, Custom Built-In Furniture & Fasad Eksterior Tahan Cuaca',
                'featured_image' => 'images/projects/inout-pengerjaan-interior-kitchen.webp',
                'excerpt' => 'Menghadirkan harmoni visual dan fungsionalitas ruang melalui perencanaan 3D photorealistic, material HPL anti-rayap, dan fasad arsitektur modern weather resistant.',
                'content' => "Menciptakan hunian, kantor, maupun ruang komersial yang estetis dan berdaya tahan tinggi membutuhkan integrasi erat antara perencanaan arsitektur 2D/3D, pemilihan material interior yang presisi, serta proteksi fasad luar terhadap cuaca tropis.\n\nLingkup Interior & Exterior pada divisi Mechanical & Electrical PT. Multi Abadi Aksana menghadirkan pendekatan terpadu. Pada area interior, kami memulai dengan Lay Out Planning 2D serta 3D photorealistic rendering agar klien dapat memvisualisasikan proporsi ruang, tata cahaya, dan material finishing sebelum fabrikasi fisik dimulai. Pembuatan custom built-in furniture seperti kitchen set, wardrobe, backdrop TV, dan credenza dikerjakan di workshop spesialis menggunakan bahan plywood grade A dengan lapisan HPL anti-scratch, edged PVC rapi, serta hardware ber-damping soft-close.\n\nUntuk melengkapi kenyamanan indoor, kami menyediakan furnish interior seperti gordyn blackout/sheer, wallpaper tekstur, hingga solar window film penolak radiasi UV yang mampu menurunkan beban pendingin ruangan (AC).\n\nDi area eksterior, fasad arsitektur dirancang dengan panel ACP (Aluminium Composite Panel), cat weather resistant bersertifikasi, serta aksen batu alam untuk perlindungan maksimal terhadap kelembapan dan panas matahari. Konstruksi pendukung seperti kanopi baja hollow, carport anti-selip, dan pagar teralis laser cutting diselesaikan dengan powder coating bermutu tinggi agar tahan karat dan tetap kokoh puluhan tahun.",
                'meta_title' => 'Desain Interior & Fasad Eksterior Tahan Cuaca | PT. Multi Abadi Aksana',
                'meta_description' => 'Layanan desain interior 3D render, custom built-in furniture, furnish ruang, dan fasad arsitektur modern oleh divisi Mechanical & Electrical PT. Multi Abadi Aksana.',
                'published_at' => now(),
                'is_published' => true,
            ]
        );
    }
}
