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

        $catSparepart = PostCategory::updateOrCreate(
            ['slug' => 'sparepart-konstruksi-k3'],
            [
                'name' => 'Komponen Mekanikal & Standar K3',
                'description' => 'Panduan pemilihan komponen mekanikal armada/mesin serta penerapan K3 pada proyek Penerangan Jalan Umum dan Mechanical & Electrical.',
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
            ['slug' => 'pentingnya-kualitas-sparepart-dan-standar-k3-dalam-proyek-konstruksi'],
            [
                'post_category_id' => $catSparepart->id,
                'title' => 'Menjaga Keandalan Armada dengan Sparepart Orisinal & Budaya K3 di Lokasi Proyek',
                'featured_image' => 'images/projects/me-maintenance-apd-lengkap.webp',
                'excerpt' => 'Mulai dari pemilihan oli, grease, ban, filter, dan kampas kopling berkualitas premium hingga disiplin penerapan Keselamatan dan Kesehatan Kerja (K3).',
                'content' => "Keberhasilan eksekusi proyek infrastruktur dan kelancaran operasional industri sangat bergantung pada dua faktor utama: kesiapan peralatan/armada kerja dan keselamatan personel di lapangan.\n\nDi bawah Divisi Mechanical & Electrical, PT. Multi Abadi Aksana menyuplai komponen mekanikal dan perawatan armada kualitas premium yang mencakup Oli, Grease, Ban Luar, Ban Dalam, Aki, Filter, Wiper, Baut Roda, Bearing, Kabel, Kampas Kopling, dan Lampu kendaraan/alat berat. Penggunaan suku cadang dan pelumas yang tepat spesifikasi mencegah kerusakan mendadak di tengah jadwal proyek yang padat.\n\nSeluruh aktivitas instalasi Penerangan Jalan Umum maupun perbaikan mesin Mechanical & Electrical pabrik selalu dijalankan dengan prinsip utama kami: Utamakan Keselamatan dan Kesehatan Kerja (K3), didukung proses kerja sama yang transparan mulai dari tahap Komunikasi, Survei, Negosiasi, hingga Deal.",
                'meta_title' => 'Pengadaan Sparepart Premium & Komitmen K3 | PT. Multi Abadi Aksana',
                'meta_description' => 'Solusi pengadaan sparepart alat berat/armada dan komitmen standar K3 PT. Multi Abadi Aksana di Sidoarjo.',
                'published_at' => now()->subDay(),
                'is_published' => true,
            ]
        );
    }
}
