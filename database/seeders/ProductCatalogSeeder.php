<?php

namespace Database\Seeders;

use App\Enums\ProductAvailability;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ServicePillar;
use Illuminate\Database\Seeder;

class ProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        Product::query()->delete();
        ProductCategory::query()->delete();

        $pjuPillar = ServicePillar::where('slug', 'penerangan-jalan-umum')->first();
        $mePillar = ServicePillar::where('slug', 'mechanical-electrical')->first();

        // Kategori 1: Penerangan Jalan Umum Tenaga Surya
        $catPjuSolar = ProductCategory::create([
            'service_pillar_id' => $pjuPillar?->id,
            'name' => 'Penerangan Jalan Umum Tenaga Surya',
            'slug' => 'pju-tenaga-surya',
            'icon' => 'heroicon-o-sun',
            'description' => 'Sistem Penerangan Jalan Umum berbasis energi terbarukan (All In One, Two In One, Konvensional Split System & Tiang Klem Lengan Fleksibel).',
            'contact_phone' => '082342979898',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // Kategori 2: Penerangan Jalan Umum PLN & Tiang
        $catPjuPln = ProductCategory::create([
            'service_pillar_id' => $pjuPillar?->id,
            'name' => 'Penerangan Jalan Umum PLN & Tiang',
            'slug' => 'pju-pln-tiang',
            'icon' => 'heroicon-o-sparkles',
            'description' => 'Armature lampu jalan PLN (COB, OSRAM, PHILIPS, ESTIKA) beserta Tiang Penerangan Jalan Umum bentuk parabola melengkung, Octagonal, dan High Mast.',
            'contact_phone' => '082342979898',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // Kategori 3: Sistem Mechanical & Electrical
        $catMe = ProductCategory::create([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Sistem Mechanical & Electrical',
            'slug' => 'mechanical-electrical',
            'icon' => 'heroicon-o-bolt',
            'description' => 'Fabrikasi & perbaikan Impeller industri, Panel Utama MDP/SDP, ATS/AMF, MCCB/MCB, Capacitor Bank, Kabel NYA/NYM/NYY/XLPE, Trafo, Genset & UPS.',
            'contact_phone' => '082342979898',
            'sort_order' => 3,
            'is_active' => true,
        ]);


        // ==========================================
        // PILAR 1A: PJU TENAGA SURYA (PROPOSAL PJU MAA)
        // ==========================================

        Product::create([
            'product_category_id' => $catPjuSolar->id,
            'name' => 'PJU Tenaga Surya All In One',
            'slug' => 'pju-tenaga-surya-all-in-one',
            'sub_badge' => 'PJU All In One',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/pju-all-in-one.webp',
            'gallery_images' => [
                'images/products/pju-all-in-one.webp',
                'images/projects/pju-k3-gempol-sidoarjo.webp',
                'images/projects/pju-crane-erection.webp',
            ],
            'short_summary' => 'Seluruh komponen berada dalam satu wadah atau rumah konkret: kontroler, baterai, dan solar panel menyatu dalam satu rumah lampu yang bekerja secara mandiri.',
            'description' => 'Berdasarkan dokumen Proposal PJU PT. Multi Abadi Aksana, PJU All In One dirancang dengan seluruh komponen utama (kontroler, baterai lithium, dan modul solar panel) menyatu di dalam satu wadah atau rumah lampu yang konkret. Dengan desain terintegrasi ini, unit bekerja secara mandiri dan otomatis menggunakan energi terbarukan.',
            'why_choose_text' => 'Menggunakan energi terbarukan dan ramah lingkungan, menghemat biaya operasional dari PLN, mengurangi emisi gas dan polusi cahaya, serta sangat cocok untuk jalan raya, kawasan industri, maupun daerah terpencil.',
            'specifications' => [
                ['label' => 'Konfigurasi Sistem', 'value' => 'All In One (Kontroler, Baterai, Solar Panel dalam 1 Rumah Lampu)'],
                ['label' => 'Sumber Energi', 'value' => '100% Energi Surya Terbarukan (Mandiri & Otomatis)'],
                ['label' => 'Komponen Kontrol', 'value' => 'Smart Lighting Controller, Timer & Photocell Sensor'],
                ['label' => 'Tipe Baterai', 'value' => 'Lithium / Gel Battery Terintegrasi'],
                ['label' => 'Layanan Pendukung', 'value' => 'Survei Lux Level, Pekerjaan Pondasi Beton & Pendirian Tiang'],
            ],
            'advantages' => [
                ['point' => 'Menggunakan energi terbarukan dan ramah lingkungan'],
                ['point' => 'Menghemat biaya operasional listrik dari PLN'],
                ['point' => 'Dapat mengurangi emisi gas dan polusi cahaya'],
                ['point' => 'Bekerja secara mandiri dan sangat cocok untuk daerah terpencil'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 1,
        ]);

        Product::create([
            'product_category_id' => $catPjuSolar->id,
            'name' => 'PJU Tenaga Surya Two In One & Tiang Klem Fleksibel',
            'slug' => 'pju-tenaga-surya-two-in-one',
            'sub_badge' => 'PJU Two In One',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/pju-two-in-one.webp',
            'gallery_images' => [
                'images/products/pju-two-in-one.webp',
                'images/projects/pju-instalasi-panel-tiang.webp',
                'images/projects/pju-pondasi-baseplate.webp',
            ],
            'short_summary' => 'Lampu, kontroler, dan baterai berada dalam satu rumah lampu yang konkret, hanya panel solar saja yang terpisah dengan sistem klem lengan tiang fleksibel.',
            'description' => 'Sesuai spesifikasi Proposal PJU PT. Multi Abadi Aksana, pada tipe PJU Two In One komponen lampu LED, kontroler, dan baterai berada di dalam satu rumah lampu, sedangkan panel solar dipasang terpisah di atasnya. Tiang lampu tenaga surya memiliki ciri khas tersendiri yaitu lengan lampu dan tiang utama terpisah dan disatukan dengan klem lengan sehingga memudahkan penyesuaian arah saat pemasangan.',
            'why_choose_text' => 'Memberikan fleksibilitas penuh saat instalasi di lapangan karena lengan lampu dan sudut tangkapan panel surya dapat disesuaikan menggunakan klem lengan pada tiang utama.',
            'specifications' => [
                ['label' => 'Konfigurasi Sistem', 'value' => 'Two In One (Lampu, Kontroler & Baterai Menyatu; Panel Surya Terpisah)'],
                ['label' => 'Struktur Tiang', 'value' => 'Lengan Lampu & Tiang Utama Terpisah dengan Klem Lengan Fleksibel'],
                ['label' => 'Opsi Tiang PJU', 'value' => 'Octagonal, Monopole, High Mast, Ornamen Dekoratif'],
                ['label' => 'Sistem Daya', 'value' => 'Paket Solar Panel, Baterai (Lithium/Gel) & Solar Charge Controller'],
            ],
            'advantages' => [
                ['point' => 'Penyesuaian arah pemasangan lampu dan panel surya lebih fleksibel dengan klem lengan'],
                ['point' => 'Menghemat biaya operasional dari PLN dengan energi terbarukan'],
                ['point' => 'Rumah lampu ringkas karena baterai dan kontroler sudah terintegrasi'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 2,
        ]);

        Product::create([
            'product_category_id' => $catPjuSolar->id,
            'name' => 'PJU Tenaga Surya Konvensional (Split System)',
            'slug' => 'pju-tenaga-surya-konvensional',
            'sub_badge' => 'PJU Konvensional',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/pju-konvensional.webp',
            'gallery_images' => [
                'images/products/pju-konvensional.webp',
                'images/products/pju-solar-panel.webp',
                'images/projects/pju-k3-gempol-sidoarjo.webp',
            ],
            'short_summary' => 'Setiap komponen berada di tempat berbeda: lampu, solar panel, dan box sistem baterai terpasang secara terpisah dengan desain konvensional yang kokoh.',
            'description' => 'PJU Konvensional (Split System) menempatkan setiap komponen utama di bagian terpisah: armature lampu LED pada lengan tiang, modul solar panel di puncak tiang, serta box sistem baterai dan Solar Charge Controller yang terpasang kokoh pada badan tiang. Sistem ini bekerja secara mandiri dan otomatis.',
            'why_choose_text' => 'Desain konvensional yang sangat kokoh memungkinkan penggunaan kapasitas panel surya dan box baterai berdaya besar untuk kebutuhan penerangan jalan utama dengan durasi nyala maksimal.',
            'specifications' => [
                ['label' => 'Konfigurasi Sistem', 'value' => 'Split System (Lampu, Solar Panel & Box Sistem Terpisah)'],
                ['label' => 'Komponen Daya', 'value' => 'Solar Panel Mandiri, Box Baterai (Lithium/Gel), Solar Charge Controller'],
                ['label' => 'Tipe Tiang', 'value' => 'Tiang Octagonal / Monopole dengan Arm Bracket & Dudukan Box'],
                ['label' => 'Sistem Operasi', 'value' => 'Mandiri & Otomatis dengan Photocell / Timer'],
            ],
            'advantages' => [
                ['point' => 'Desain konvensional yang kokoh dan tahan cuaca ekstrem'],
                ['point' => 'Perawatan dan penggantian per komponen (baterai/panel/lampu) sangat mudah'],
                ['point' => 'Bekerja secara mandiri dan otomatis tanpa pasokan listrik PLN'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 3,
        ]);

        // ==========================================
        // PILAR 1B: PJU PLN & TIANG (PROPOSAL PJU MAA)
        // ==========================================

        Product::create([
            'product_category_id' => $catPjuPln->id,
            'name' => 'Armature Lampu PJU PLN (COB, OSRAM, PHILIPS, ESTIKA)',
            'slug' => 'armature-lampu-pju-pln-cob-osram-philips-estika',
            'sub_badge' => 'PJU PLN',
            'brand' => 'COB / OSRAM / PHILIPS / ESTIKA',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/lampu-pju-pln-terpasang.webp',
            'gallery_images' => [
                'images/products/lampu-pju-pln-terpasang.webp',
                'images/products/lampu-pju-cob.webp',
                'images/products/lampu-pju-osram.webp',
                'images/products/lampu-pju-philips.webp',
                'images/products/lampu-pju-estika.webp',
            ],
            'short_summary' => 'Pengadaan armature lampu PJU jaringan PLN dengan pilihan tipe dan merek resmi: COB, OSRAM, PHILIPS, dan ESTIKA yang memberikan penerangan stabil dan konsisten.',
            'description' => 'Sesuai Proposal PJU PT. Multi Abadi Aksana, kami menyediakan berbagai varian lampu PJU PLN hemat energi meliputi tipe COB, OSRAM, PHILIPS, dan ESTIKA, serta lampu sorot (floodlight). Sistem PJU PLN dirancang untuk memberikan pencahayaan jalan raya yang stabil, konsisten, dan dapat diintegrasikan dengan sistem kontrol cerdas.',
            'why_choose_text' => 'Dapat memberikan penerangan stabil dan konsisten sepanjang malam, dapat diatur intensitas cahaya sesuai kebutuhan jalan, serta dapat diintegrasikan dengan Panel Distribusi PJU dan Smart Lighting Controller untuk pengoptimalan energi.',
            'specifications' => [
                ['label' => 'Pilihan Tipe & Merek', 'value' => 'COB, OSRAM, PHILIPS, ESTIKA & Floodlight'],
                ['label' => 'Sistem Kontrol', 'value' => 'Panel Distribusi PJU, Timer, Photocell Sensor, Smart Lighting Controller'],
                ['label' => 'Jaringan Distribusi', 'value' => 'Kabel Distribusi Underground (Bawah Tanah) maupun Udara & Trafo Penunjang'],
                ['label' => 'Layanan Konstruksi', 'value' => 'Perhitungan Lux Level, Manhole/Handhole, Pendirian Tiang & Testing Commissioning'],
            ],
            'advantages' => [
                ['point' => 'Dapat memberikan penerangan stabil dan konsisten'],
                ['point' => 'Dapat diatur intensitas cahaya sesuai kebutuhan lapangan'],
                ['point' => 'Dapat diintegrasikan dengan sistem kontrol canggih untuk pengoptimalan energi'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 4,
        ]);

        Product::create([
            'product_category_id' => $catPjuPln->id,
            'name' => 'Tiang PJU PLN Parabola, Octagonal, Monopole & High Mast',
            'slug' => 'tiang-pju-pln-parabola-octagonal-monopole',
            'sub_badge' => 'Tiang PJU',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/tiang-pju-parabola.webp',
            'gallery_images' => [
                'images/products/tiang-pju-parabola.webp',
                'images/projects/pju-tiang-jalan-tol.webp',
                'images/projects/pju-crane-erection.webp',
                'images/projects/pju-pondasi-baseplate.webp',
            ],
            'short_summary' => 'Tiang Lampu PJU dengan struktur parabola melengkung, tiang Octagonal, Monopole, High Mast, tiang ornamen dekoratif, arm bracket, dan tiang pedestrian.',
            'description' => 'Pengadaan tiang penopang Penerangan Jalan Umum (PJU) lengkap dengan aksesori stang lampu (arm bracket) dan angkur baseplate. Tersedia Tiang PJU PLN dengan bentuk parabola melengkung, Tiang Octagonal, Monopole, High Mast, hingga tiang ornamen dekoratif untuk taman dan pedestrian.',
            'why_choose_text' => 'Didukung layanan pekerjaan sipil dan konstruksi lengkap oleh tim PT. Multi Abadi Aksana: mulai dari penggalian tanah, pengecoran pondasi beton tiang PJU, pembuatan manhole kabel bawah tanah, hingga pendirian tiang menggunakan crane berstandar K3.',
            'specifications' => [
                ['label' => 'Varian Struktur Tiang', 'value' => 'Parabola Melengkung, Octagonal, Monopole, High Mast'],
                ['label' => 'Varian Arsitektural', 'value' => 'Tiang Ornamen Dekoratif & Tiang Lampu Taman / Pedestrian'],
                ['label' => 'Aksesori Penunjang', 'value' => 'Arm Bracket (Stang Lampu), Klem Lengan & Baseplate Baja'],
                ['label' => 'Jasa Sipil Terkait', 'value' => 'Pengecoran Pondasi Beton, Manhole/Handhole & Pendirian Tiang'],
            ],
            'advantages' => [
                ['point' => 'Struktur presisi untuk menopang beban lampu PJU dan terpaan angin jalan raya'],
                ['point' => 'Tersedia bentuk parabola melengkung maupun sistem klem lengan fleksibel'],
                ['point' => 'Paket lengkap dengan jasa pengecoran pondasi dan pendirian tiang di lokasi'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 5,
        ]);

        // ==========================================
        // PILAR 3: MECHANICAL & ELECTRICAL (COMPRO MAA)
        // ==========================================

        Product::create([
            'product_category_id' => $catMe->id,
            'name' => 'Fabrikasi & Perbaikan Impeller Industri & Blower Pabrik',
            'slug' => 'fabrikasi-perbaikan-impeller-industri',
            'sub_badge' => 'Impeller & Mekanikal',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::CUSTOM,
            'thumbnail_image' => 'images/projects/me-impeller-rotor-stainless.webp',
            'gallery_images' => [
                'images/projects/me-impeller-rotor-stainless.webp',
                'images/projects/me-housing-blower-pgic-e34.webp',
                'images/projects/me-belt-motor-industri.webp',
                'images/projects/me-instalasi-flange-ducting.webp',
                'images/projects/me-maintenance-apd-lengkap.webp',
            ],
            'short_summary' => 'Fabrikasi dan rekondisi komponen putar presisi khususnya Impeller stainless steel dan sistem blower sentrifugal beserta jasa overhaul dan perawatan mesin pabrik.',
            'description' => 'Sesuai profil layanan PT. Multi Abadi Aksana, kami menyediakan pengadaan dan jasa fabrikasi komponen putar industri khususnya Impeller stainless steel dan perbaikan teknis sistem blower sentrifugal (seperti unit blower dan fan industri PGIC-E34). Seluruh pengerjaan dilakukan oleh tenaga ahli berpengalaman dengan standar keselamatan kerja (K3) ketat.',
            'why_choose_text' => 'Menjamin presisi komponen putar mekanikal dan keandalan operasional fasilitas pabrik Anda melalui fabrikasi material berkualitas tinggi serta dukungan perawatan berkala (preventive maintenance).',
            'specifications' => [
                ['label' => 'Cakupan Komponen', 'value' => 'Impeller Industri Stainless Steel, Rotor Blower, Shaft, Housing & Ducting'],
                ['label' => 'Layanan Teknis', 'value' => 'Fabrikasi Baru, Rekondisi/Perbaikan Teknis & Bongkar Pasang Unit'],
                ['label' => 'Pengujian & Komisioning', 'value' => 'Uji Fungsi Mekanikal, Hydrotest Perpipaan & Pengujian Sistem HVAC'],
                ['label' => 'Rekam Jejak On Duty', 'value' => 'Penanganan Impeller & Sistem Blower Unit Industri PGIC-E34'],
            ],
            'advantages' => [
                ['point' => 'Dikerjakan langsung oleh tenaga ahli mekanikal berpengalaman di lingkungan pabrik'],
                ['point' => 'Material berkualitas tinggi sesuai spesifikasi teknis dan standar keselamatan'],
                ['point' => 'Didukung layanan preventive maintenance berkala untuk mencegah downtime'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 6,
        ]);

        Product::create([
            'product_category_id' => $catMe->id,
            'name' => 'Panel Utama (MDP/SDP), ATS/AMF, Trafo, Genset & Distribusi Kabel',
            'slug' => 'panel-mdp-sdp-ats-amf-trafo-genset-kabel',
            'sub_badge' => 'Electrical & Power',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/projects/me-terminasi-kabel-pondasi.webp',
            'gallery_images' => [
                'images/projects/me-terminasi-kabel-pondasi.webp',
                'images/projects/me-instalasi-flange-ducting.webp',
                'images/projects/me-belt-motor-industri.webp',
            ],
            'short_summary' => 'Pengadaan Panel Utama (MDP/SDP), ATS/AMF, MCCB/MCB, Capacitor Bank, Kabel NYA/NYM/NYY/XLPE, Cable Tray, Transformator, Genset, UPS, dan Stabilizer.',
            'description' => 'Divisi Mechanical & Electrical PT. Multi Abadi Aksana melayani pengadaan barang dan jasa instalasi kelistrikan gedung maupun industri. Mencakup Panel & Proteksi (MDP/SDP, ATS/AMF, panel kontrol motor, MCCB/MCB, capacitor bank), Kabel & Jalur Distribusi (NYA, NYM, NYY, XLPE, kabel kontrol, cable tray, ladder, conduit), serta Peralatan Utama (Trafo, Genset, UPS, Stabilizer).',
            'why_choose_text' => 'Solusi satu pintu mulai dari perhitungan beban listrik dan desain skema jalur kelistrikan, perakitan panel, penarikan kabel daya, hingga pengujian beban listrik dan komisioning.',
            'specifications' => [
                ['label' => 'Panel & Proteksi', 'value' => 'Panel Utama (MDP/SDP), Panel ATS/AMF, Panel Kontrol Motor, MCCB/MCB, Capacitor Bank'],
                ['label' => 'Kabel & Jalur Distribusi', 'value' => 'Kabel Tegangan Rendah & Menengah (NYA, NYM, NYY, XLPE), Kabel Kontrol, Cable Tray, Ladder, Conduit'],
                ['label' => 'Peralatan Utama', 'value' => 'Transformator (Trafo), Genset, UPS, Stabilizer, Armature Sakelar/Stopkontak'],
                ['label' => 'Jasa Pelaksanaan', 'value' => 'Desain Skema Kelistrikan, Instalasi Panel/Kabel, Uji Beban & Preventive Maintenance'],
            ],
            'advantages' => [
                ['point' => 'Komponen kelistrikan terstandarisasi dan aman untuk beban industri maupun komersial'],
                ['point' => 'Dilengkapi jasa pengujian beban listrik dan fungsi otomatisasi panel'],
                ['point' => 'Layanan perawatan rutin berkala pada panel, trafo, genset, dan unit HVAC'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 7,
        ]);
    }
}
