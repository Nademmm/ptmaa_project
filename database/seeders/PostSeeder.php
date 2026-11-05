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
            ['slug' => 'infrastruktur-pju'],
            [
                'name' => 'Infrastruktur PJU',
                'description' => 'Edukasi dan teknologi lampu penerangan jalan umum tenaga surya maupun jaringan PLN.',
            ]
        );

        $catMe = PostCategory::firstOrCreate(
            ['slug' => 'mechanical-electrical'],
            [
                'name' => 'Mechanical & Electrical',
                'description' => 'Wawasan teknis sistem mekanikal, kelistrikan industri, dan fabrikasi komponen presisi.',
            ]
        );

        $catK3 = PostCategory::firstOrCreate(
            ['slug' => 'standar-k3-konstruksi'],
            [
                'name' => 'Standar K3 & Konstruksi',
                'description' => 'Panduan keselamatan kerja, manajemen proyek sipil, dan material arsitektur modern.',
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'panduan-memilih-pju-tenaga-surya-all-in-one-vs-two-in-one'],
            [
                'post_category_id' => $catPju->id,
                'title' => 'Panduan Memilih PJU Tenaga Surya: All In One vs Two In One untuk Proyek Jalan',
                'featured_image' => '/blog1.webp',
                'excerpt' => 'Memahami perbedaan spesifikasi teknis, efisiensi serapan panel monocrystalline, serta rekomendasi aplikasi lapangan antara sistem PJU All In One dan Two In One.',
                'content' => "Penerangan Jalan Umum Tenaga Surya (PJUTS) kini menjadi tulang punggung elektrifikasi jalan raya, kawasan industri, hingga jalan poros desa di Indonesia. Dalam pengadaan proyek pemerintah maupun korporasi, pemilihan antara tipe All In One (Integrated) dan Two In One sangat menentukan keandalan jangka panjang.\n\nPada sistem All In One, seluruh komponen mulai dari modul surya monocrystalline, baterai Lithium Iron Phosphate (LiFePO4), Smart MPPT Controller, hingga chip lampu LED menyatu di dalam satu casing die-cast aluminium. Keunggulan utamanya terletak pada proses instalasi yang ekstra cepat tanpa kabel eksternal yang rawan korosi maupun pencurian.\n\nSementara itu, sistem Two In One memisahkan panel surya dari rumah lampu utama (di mana baterai dan kontroler tetap menyatu di dalam kap lampu). Pemisahan ini memungkinkan ukuran panel surya yang lebih besar serta pengaturan sudut kemiringan (tilt angle) dan arah hadap panel secara independen mengikuti titik edar matahari di lokasi proyek.\n\nPT. Multi Abadi Aksana senantiasa melakukan survei titik koordinat dan analisis radiasi harian sebelum merekomendasikan tipe unit maupun ketinggian tiang octagonal yang tepat bagi mitra kami.",
                'meta_title' => 'Panduan Memilih PJU Tenaga Surya All In One vs Two In One | PT. Multi Abadi Aksana',
                'meta_description' => 'Perbandingan teknis PJU Tenaga Surya All In One dan Two In One untuk pengadaan jalan raya dan kawasan industri.',
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'pentingnya-dynamic-balancing-pada-impeller-dan-blower-industri'],
            [
                'post_category_id' => $catMe->id,
                'title' => 'Pentingnya Dynamic Balancing pada Fabrikasi Impeller & Blower Industri',
                'featured_image' => '/blog2.webp',
                'excerpt' => 'Ketidakseimbangan massa sekecil apa pun pada putaran RPM tinggi dapat memicu getaran destruktif pada bearing dan poros mesin pabrik Anda.',
                'content' => "Dalam operasional pabrik manufaktur, pengolahan air, maupun pembangkit energi, komponen berputar seperti impeller pompa sentrifugal dan rotor blower bekerja pada putaran tinggi secara terus-menerus. Ketika terjadi keausan akibat abrasi fluida atau korosi kimia, distribusi massa rotor menjadi tidak seimbang (unbalance).\n\nGejala awal yang sering diabaikan adalah meningkatnya suhu bantalan (bearing), suara bising berfrekuensi tinggi, serta getaran berlebih pada fondasi mesin. Jika dibiarkan, kondisi ini akan merusak mechanical seal, membengkokkan shaft, dan berujung pada unplanned downtime yang merugikan produksi.\n\nMelalui divisi Mechanical & Electrical, PT. Multi Abadi Aksana menyediakan layanan fabrikasi ulang dan perbaikan teknis impeller menggunakan material pilihan seperti Stainless Steel 304/316 dan Cast Iron, dilengkapi proses uji Dynamic Balancing berstandar ISO 1940 untuk memastikan putaran kembali presisi dan bebas vibrasi.",
                'meta_title' => 'Pentingnya Dynamic Balancing Impeller Industri | PT. Multi Abadi Aksana',
                'meta_description' => 'Solusi fabrikasi dan dynamic balancing impeller pompa serta blower industri dari PT. Multi Abadi Aksana.',
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'penerapan-disiplin-k3-dan-manajemen-mutu-proyek-konstruksi-jalan'],
            [
                'post_category_id' => $catK3->id,
                'title' => 'Penerapan Disiplin K3 dan Standar Hot Dip Galvanized pada Konstruksi PJU',
                'featured_image' => '/blog3.webp',
                'excerpt' => 'Bagaimana standar keselamatan kerja lapangan dan kualitas pelapisan anti-karat menentukan usia pakai infrastruktur jalan hingga puluhan tahun.',
                'content' => "Pekerjaan konstruksi sipil dan instalasi kelistrikan jalan raya memiliki risiko keselamatan tinggi karena berlangsung di jalur lalu lintas aktif. Oleh sebab itu, penerapan Kesehatan dan Keselamatan Kerja (K3) bukan sekadar kewajiban regulasi, melainkan fondasi utama keberhasilan eksekusi proyek.\n\nDi setiap proyek On Duty seperti ruas Gempol, Sidoarjo, hingga Malang, tim PT. Multi Abadi Aksana menerapkan prosedur pengamanan area kerja (traffic management), penggunaan Alat Pelindung Diri (APD) lengkap, serta pengujian kelayakan alat angkat (crane erection) sebelum pemasangan tiang.\n\nSelain disiplin K3, ketahanan material juga dijaga melalui penggunaan tiang baja dengan proses Hot Dip Galvanized berstandar ASTM A123 serta pengecoran pondasi beton bertulang yang presisi. Kombinasi mutu material dan eksekusi lapangan yang aman memastikan infrastruktur berfungsi optimal dalam jangka panjang.",
                'meta_title' => 'Penerapan Standar K3 & Tiang Galvanis Proyek PJU | PT. Multi Abadi Aksana',
                'meta_description' => 'Komitmen K3 dan mutu material konstruksi PT. Multi Abadi Aksana pada proyek PJU dan infrastruktur.',
                'published_at' => now()->subDay(),
                'is_published' => true,
            ]
        );
    }
}
