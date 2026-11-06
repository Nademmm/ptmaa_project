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
        $pjuPillar = ServicePillar::where('code', 'PJU')->first();
        $interiorPillar = ServicePillar::where('code', 'INTERIOR')->first();
        $mePillar = ServicePillar::where('code', 'ME')->first();
        $sparepartPillar = ServicePillar::where('code', 'SPAREPART')->first();

        // Kategori 1: PJU Tenaga Surya
        $catPjuSolar = ProductCategory::create([
            'service_pillar_id' => $pjuPillar?->id,
            'name' => 'PJU Tenaga Surya',
            'slug' => 'pju-tenaga-surya',
            'icon' => 'heroicon-o-sun',
            'description' => 'Sistem Penerangan Jalan Umum berbasis energi terbarukan (PJU All In One, PJU Two In One, PJU Konvensional & Tiang Klem Lengan Fleksibel).',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // Kategori 2: PJU PLN & Tiang
        $catPjuPln = ProductCategory::create([
            'service_pillar_id' => $pjuPillar?->id,
            'name' => 'PJU PLN & Tiang',
            'slug' => 'pju-pln-tiang',
            'icon' => 'heroicon-o-sparkles',
            'description' => 'Armature lampu jalan PLN (COB, OSRAM, PHILIPS, ESTIKA) beserta Tiang PJU PLN bentuk parabola melengkung, Octagonal, dan High Mast.',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // Kategori 3: Mechanical & Electrical
        $catMe = ProductCategory::create([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Mechanical & Electrical',
            'slug' => 'mechanical-electrical',
            'icon' => 'heroicon-o-bolt',
            'description' => 'Fabrikasi & perbaikan Impeller industri, Panel Utama MDP/SDP, ATS/AMF, MCCB/MCB, Capacitor Bank, Kabel NYA/NYM/NYY/XLPE, Trafo, Genset & UPS.',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Kategori 4: Interior & Exterior
        $catInterior = ProductCategory::create([
            'service_pillar_id' => $interiorPillar?->id,
            'name' => 'Interior & Exterior',
            'slug' => 'interior-exterior',
            'icon' => 'heroicon-o-home-modern',
            'description' => 'Gypsum board, PVC, Wall Panel WPC/UVP, Acoustic Tile, Parket/Vinyl/SPC Flooring, Custom Furniture, Partisi Kaca/Cubicle, serta Fasad ACP & Kanopi.',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // Kategori 5: Sparepart & Equipment (WhatsApp: +62 823-4297-9898)
        $catSparepart = ProductCategory::create([
            'service_pillar_id' => $sparepartPillar?->id,
            'name' => 'Sparepart & Equipment',
            'slug' => 'sparepart-equipment',
            'icon' => 'heroicon-o-wrench-screwdriver',
            'description' => 'Katalog suku cadang kualitas premium: Oli, Grease, Ban Luar, Ban Dalam, Aki, Filter, Wiper, Baut Roda, Bearing, Kabel, Kampas Kopling, Lampu & Mesin.',
            'contact_phone' => '082342979898',
            'sort_order' => 5,
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
            'thumbnail_image' => '/images/products/pju-all-in-one.webp',
            'gallery_images' => [
                '/images/products/pju-all-in-one.webp',
                '/images/projects/pju-k3-gempol-sidoarjo.webp',
                '/images/projects/pju-crane-erection.webp',
            ],
            'short_summary' => 'Seluruh komponen berada dalam satu wadah atau rumah konkret: kontroler, baterai, dan solar panel menyatu dalam satu rumah lampu yang bekerja secara mandiri.',
            'description' => 'Berdasarkan dokumen Proposal PJU PT. Multi Abadi Aksana, PJU All In One dirancang dengan seluruh komponen utama (kontroler, baterai lithium, dan modul solar panel) menyatu di dalam satu wadah atau rumah lampu yang konkret. Dengan desain terintegrasi ini, unit bekerja secara mandiri dan otomatis menggunakan energi terbarukan.',
            'why_choose_text' => 'Menggunakan energi terbarukan dan ramah lingkungan, menghemat biaya operasional dari PLN, mengurangi emisi gas dan polusi cahaya, serta sangat cocok untuk jalan raya, kawasan industri, maupun daerah terpencil.',
            'specifications' => [
                ['label' => 'Konfigurasi Sistem', 'value' => 'All In One (Kontroler, Baterai, Solar Panel dalam 1 Rumah Lampu)'],
                ['label' => 'Sumber Energi', 'value' => '100% Energi Surya Terbarukan (Mandiri & Otomatis)'],
                ['label' => 'Komponen Kontrol', 'value' => 'Smart Lighting Controller, Timer & Photocell Sensor'],
                ['label' => 'Tipe Baterai', 'value' => 'Lithium / Gel Battery Terintegrasi'],
                ['label' => 'Layanan Pendukung', 'value' => 'Survei Lux Level, Pekerjaan Pondasi Beton & Ereksi Tiang'],
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
            'thumbnail_image' => '/images/products/pju-two-in-one.webp',
            'gallery_images' => [
                '/images/products/pju-two-in-one.webp',
                '/images/projects/pju-instalasi-panel-tiang.webp',
                '/images/projects/pju-pondasi-baseplate.webp',
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
            'thumbnail_image' => '/images/products/pju-konvensional.webp',
            'gallery_images' => [
                '/images/products/pju-konvensional.webp',
                '/images/products/pju-solar-panel.webp',
                '/images/projects/pju-k3-gempol-sidoarjo.webp',
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
            'thumbnail_image' => '/images/products/lampu-pju-pln-terpasang.webp',
            'gallery_images' => [
                '/images/products/lampu-pju-pln-terpasang.webp',
                '/images/products/lampu-pju-cob.webp',
                '/images/products/lampu-pju-osram.webp',
                '/images/products/lampu-pju-philips.webp',
                '/images/products/lampu-pju-estika.webp',
            ],
            'short_summary' => 'Pengadaan armature lampu PJU jaringan PLN dengan pilihan tipe dan merek resmi: COB, OSRAM, PHILIPS, dan ESTIKA yang memberikan penerangan stabil dan konsisten.',
            'description' => 'Sesuai Proposal PJU PT. Multi Abadi Aksana, kami menyediakan berbagai varian lampu PJU PLN hemat energi meliputi tipe COB, OSRAM, PHILIPS, dan ESTIKA, serta lampu sorot (floodlight). Sistem PJU PLN dirancang untuk memberikan pencahayaan jalan raya yang stabil, konsisten, dan dapat diintegrasikan dengan sistem kontrol cerdas.',
            'why_choose_text' => 'Dapat memberikan penerangan stabil dan konsisten sepanjang malam, dapat diatur intensitas cahaya sesuai kebutuhan jalan, serta dapat diintegrasikan dengan Panel Distribusi PJU dan Smart Lighting Controller untuk pengoptimalan energi.',
            'specifications' => [
                ['label' => 'Pilihan Tipe & Merek', 'value' => 'COB, OSRAM, PHILIPS, ESTIKA & Floodlight'],
                ['label' => 'Sistem Kontrol', 'value' => 'Panel Distribusi PJU, Timer, Photocell Sensor, Smart Lighting Controller'],
                ['label' => 'Jaringan Distribusi', 'value' => 'Kabel Distribusi Underground (Bawah Tanah) maupun Udara & Trafo Penunjang'],
                ['label' => 'Layanan Konstruksi', 'value' => 'Perhitungan Lux Level, Manhole/Handhole, Ereksi Tiang & Testing Commissioning'],
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
            'thumbnail_image' => '/images/products/tiang-pju-parabola.webp',
            'gallery_images' => [
                '/images/products/tiang-pju-parabola.webp',
                '/images/projects/pju-tiang-jalan-tol.webp',
                '/images/projects/pju-crane-erection.webp',
                '/images/projects/pju-pondasi-baseplate.webp',
            ],
            'short_summary' => 'Tiang Lampu PJU dengan struktur parabola melengkung, tiang Octagonal, Monopole, High Mast, tiang ornamen dekoratif, arm bracket, dan tiang pedestrian.',
            'description' => 'Pengadaan tiang penopang Penerangan Jalan Umum (PJU) lengkap dengan aksesori stang lampu (arm bracket) dan angkur baseplate. Tersedia Tiang PJU PLN dengan bentuk parabola melengkung, Tiang Octagonal, Monopole, High Mast, hingga tiang ornamen dekoratif untuk taman dan pedestrian.',
            'why_choose_text' => 'Didukung layanan pekerjaan sipil dan konstruksi lengkap oleh tim PT. Multi Abadi Aksana: mulai dari penggalian tanah, pengecoran pondasi beton tiang PJU, pembuatan manhole kabel bawah tanah, hingga ereksi tiang menggunakan crane berstandar K3.',
            'specifications' => [
                ['label' => 'Varian Struktur Tiang', 'value' => 'Parabola Melengkung, Octagonal, Monopole, High Mast'],
                ['label' => 'Varian Arsitektural', 'value' => 'Tiang Ornamen Dekoratif & Tiang Lampu Taman / Pedestrian'],
                ['label' => 'Aksesori Penunjang', 'value' => 'Arm Bracket (Stang Lampu), Klem Lengan & Baseplate Baja'],
                ['label' => 'Jasa Sipil Terkait', 'value' => 'Pengecoran Pondasi Beton, Manhole/Handhole & Ereksi Tiang'],
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
            'thumbnail_image' => '/images/projects/me-impeller-rotor-stainless.webp',
            'gallery_images' => [
                '/images/projects/me-impeller-rotor-stainless.webp',
                '/images/projects/me-housing-blower-pgic-e34.webp',
                '/images/projects/me-belt-motor-industri.webp',
                '/images/projects/me-instalasi-flange-ducting.webp',
                '/images/projects/me-maintenance-apd-lengkap.webp',
            ],
            'short_summary' => 'Pengadaan komponen teknik industri khususnya impeller dan suku cadang mekanikal, beserta jasa fabrikasi, instalasi, dan perbaikan teknis peralatan pabrik.',
            'description' => 'Sesuai profil layanan PT. Multi Abadi Aksana, kami menyediakan komponen teknik industri khususnya impeller dan suku cadang mekanikal, serta melayani jasa fabrikasi dan perbaikan teknis peralatan industri (seperti unit blower dan fan industri PGIC-E34). Seluruh pengerjaan dilakukan oleh tenaga ahli berpengalaman dengan standar keselamatan kerja (K3) ketat.',
            'why_choose_text' => 'Menjamin presisi komponen putar mekanikal dan keandalan operasional fasilitas pabrik Anda melalui fabrikasi material berkualitas tinggi serta dukungan perawatan berkala (preventive maintenance).',
            'specifications' => [
                ['label' => 'Cakupan Komponen', 'value' => 'Impeller Industri, Rotor Blower, Shaft, Housing & Suku Cadang Mekanikal'],
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
            'thumbnail_image' => '/images/projects/me-terminasi-kabel-pondasi.webp',
            'gallery_images' => [
                '/images/projects/me-terminasi-kabel-pondasi.webp',
                '/images/projects/me-belt-motor-industri.webp',
                '/images/products/sparepart-kabel.webp',
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
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 7,
        ]);

        // ==========================================
        // PILAR 2: INTERIOR & EXTERIOR (COMPRO MAA)
        // ==========================================

        Product::create([
            'product_category_id' => $catInterior->id,
            'name' => 'Material Dinding WPC/PVC, Flooring SPC/Vinyl, Custom Furniture & Fasad ACP',
            'slug' => 'material-interior-exterior-wpc-spc-custom-furniture-acp',
            'sub_badge' => 'Interior & Exterior',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => '/images/projects/interior-adelle-jewellery.webp',
            'gallery_images' => [
                '/images/projects/interior-adelle-jewellery.webp',
                '/images/projects/interior-ruang-kerja-partisi.webp',
                '/images/projects/interior-ruang-medis.webp',
                '/images/projects/interior-koridor-kantor.webp',
            ],
            'short_summary' => 'Pengadaan material penutup dinding & plafon (Gypsum, PVC, WPC/UVP), lantai (Parket, Vinyl, SPC, Granit), Custom Furniture, Partisi Kaca, serta aplikasi Fasad ACP.',
            'description' => 'Sesuai dokumen Company Profile PT. Multi Abadi Aksana, layanan Interior & Exterior kami mencakup pengadaan material lengkap beserta jasa perancangan 3D, konstruksi finishing interior, aplikasi eksterior gedung tinggi (ACP/kaca/kanopi), renovasi (refurbishment), hingga pemeliharaan fasad luar (gondola work). Telah terbukti pada pengerjaan gerai retail premium Adelle Jewellery, ruang perkantoran modern, dan fasilitas kesehatan.',
            'why_choose_text' => 'Menggabungkan estetika tata ruang modern dengan ketepatan konstruksi: mulai dari pembuatan konsep layout dan visualisasi 3D hingga instalasi plafon, partisi, lantai, dan perakitan furnitur kustom di lokasi.',
            'specifications' => [
                ['label' => 'Dinding & Plafon', 'value' => 'Gypsum Board, Panel PVC, Wall Panel WPC/UVP, Acoustic Tile, Wallpaper'],
                ['label' => 'Material Lantai (Flooring)', 'value' => 'Parket Kayu, Vinyl, SPC Flooring, Karpet Kantor, Ubin Granit/Keramik'],
                ['label' => 'Furnitur & Partisi', 'value' => 'Custom Furniture (Meja Kerja, Lemari, Resepsionis), Partisi Gipsum/Kaca, Toilet Cubicle'],
                ['label' => 'Eksterior & Aksesori', 'value' => 'Fasad ACP/Kaca Gedung, Rangka Kanopi, Pagar Utama, Tirai/Blinds & Downlight Decorative'],
            ],
            'advantages' => [
                ['point' => 'Layanan terintegrasi dari konsultasi desain 3D hingga konstruksi finishing dan renovasi'],
                ['point' => 'Rekam jejak nyata pada proyek retail mewah (Adelle Jewellery), kantor, dan ruang medis'],
                ['point' => 'Tersedia layanan maintenance berkala termasuk pembersihan dinding luar gedung (gondola work)'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 8,
        ]);

        // ==========================================
        // PILAR 4: SPAREPART & EQUIPMENT (PDF SPAREPART EQUIPMENT)
        // ==========================================

        Product::create([
            'product_category_id' => $catSparepart->id,
            'name' => 'Oli & Grease (Pelumas Mesin, Armada & Alat Berat)',
            'slug' => 'sparepart-oli-dan-grease-pelumas',
            'sub_badge' => 'Oli & Grease',
            'brand' => 'Divisi Sparepart MAA',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => '/images/products/sparepart-oli.webp',
            'gallery_images' => [
                '/images/products/sparepart-oli.webp',
                '/images/products/sparepart-grease.webp',
            ],
            'short_summary' => 'Penyediaan Oli (Lubricants) dan Grease (Gemuk Pelumas) kualitas premium untuk kendaraan operasional, armada logistik, alat berat, dan peralatan mesin industri.',
            'description' => 'Berdasarkan katalog Divisi Sparepart Equipment PT. Multi Abadi Aksana, kami menyediakan Oli pelumas mesin/hidrolik/transmisi serta Grease (gemuk pelumas) untuk melindungi bearing dan komponen bergerak dari keausan serta gesekan ekstrem.',
            'why_choose_text' => 'Kualitas premium dan terpercaya dengan proses pengadaan yang transparan serta dukungan jaringan supplier resmi untuk menjamin keaslian pelumas armada Anda.',
            'specifications' => [
                ['label' => 'Produk Tersedia', 'value' => 'Oli Mesin, Oli Hidrolik, Oli Transmisi & Grease (Gemuk Pelumas)'],
                ['label' => 'Aplikasi Unit', 'value' => 'Kendaraan Operasional, Truk Armada, Alat Berat & Mesin Pabrik'],
                ['label' => 'Kontak Layanan', 'value' => 'WhatsApp Resmi +62 823-4297-9898'],
                ['label' => 'Lokasi Workshop', 'value' => 'Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Sidoarjo'],
            ],
            'advantages' => [
                ['point' => 'Sparepart dan pelumas dengan kualitas premium dan terpercaya'],
                ['point' => 'Melindungi komponen mesin dan bearing dari gesekan serta suhu tinggi'],
                ['point' => 'Dilayani langsung oleh tim resmi PT. Multi Abadi Aksana (+62 823-4297-9898)'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 9,
        ]);

        Product::create([
            'product_category_id' => $catSparepart->id,
            'name' => 'Ban Luar, Ban Dalam & Baut Roda Armada / Alat Berat',
            'slug' => 'sparepart-ban-luar-ban-dalam-baut-roda',
            'sub_badge' => 'Ban & Roda',
            'brand' => 'Divisi Sparepart MAA',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => '/images/products/sparepart-ban-luar.webp',
            'gallery_images' => [
                '/images/products/sparepart-ban-luar.webp',
                '/images/products/sparepart-ban-dalam.webp',
                '/images/products/sparepart-baut-roda.webp',
            ],
            'short_summary' => 'Pengadaan Ban Luar, Ban Dalam, serta Baut Roda (Hub Bolts & Nuts) berdaya tahan tinggi untuk kendaraan niaga, armada operasional, dan alat berat.',
            'description' => 'Katalog resmi Divisi Sparepart Equipment PT. Multi Abadi Aksana menyediakan paket kebutuhan roda kendaraan dan alat berat yang meliputi Ban Luar berbagai ukuran tapak, Ban Dalam elastis tahan panas, serta Baut dan Mur Roda baja presisi.',
            'why_choose_text' => 'Menjamin keselamatan operasional armada di medan berat dengan material karet ban dan baut roda berkualitas tinggi yang sesuai standar keselamatan.',
            'specifications' => [
                ['label' => 'Item Katalog', 'value' => 'Ban Luar, Ban Dalam & Baut Roda'],
                ['label' => 'Peruntukan', 'value' => 'Kendaraan Operasional, Truk Niaga & Unit Alat Berat'],
                ['label' => 'Standar Mutu', 'value' => 'Kualitas Premium, Tahan Beban Berat & Gesekan'],
            ],
            'advantages' => [
                ['point' => 'Daya cengkeram dan ketahanan aus optimal untuk operasional harian'],
                ['point' => 'Tersedia lengkap beserta ban dalam dan baut roda presisi'],
                ['point' => 'Pengadaan cepat dan transparan melalui jaringan supplier luas'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 10,
        ]);

        Product::create([
            'product_category_id' => $catSparepart->id,
            'name' => 'Aki (Battery), Filter (Oli/Udara/BBM), Wiper & Lampu Kendaraan',
            'slug' => 'sparepart-aki-filter-wiper-lampu',
            'sub_badge' => 'Elektrikal & Filter',
            'brand' => 'Divisi Sparepart MAA',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => '/images/products/sparepart-aki.webp',
            'gallery_images' => [
                '/images/products/sparepart-aki.webp',
                '/images/products/sparepart-filter.webp',
                '/images/products/sparepart-wiper.webp',
                '/images/products/sparepart-lampu.webp',
            ],
            'short_summary' => 'Penyediaan Aki (Battery), Filter (Oli, Udara, Bahan Bakar), Wiper kaca, serta Lampu kendaraan/alat berat untuk perawatan rutin armada.',
            'description' => 'Sesuai dokumen Sparepart Equipment PT. Multi Abadi Aksana, kami menyuplai kebutuhan fast-moving parts meliputi Aki (Battery) daya starter tinggi, Filter Oli/Udara/Solar untuk menjaga kebersihan pembakaran mesin, Wiper kaca, serta Lampu penerangan/kerja kendaraan dan alat berat.',
            'why_choose_text' => 'Memudahkan perusahaan Anda mendapatkan seluruh komponen perawatan berkala (service rutin) armada dari satu pintu supplier yang terpercaya.',
            'specifications' => [
                ['label' => 'Item Katalog', 'value' => 'Aki (Battery), Filter (Oli/Udara/BBM), Wiper & Lampu'],
                ['label' => 'Fungsi Utama', 'value' => 'Perawatan Berkala (Preventive Maintenance) Armada & Mesin'],
                ['label' => 'Layanan Pemesanan', 'value' => 'Konsultasi & Pengadaan via WA +62 823-4297-9898'],
            ],
            'advantages' => [
                ['point' => 'Ketersediaan komponen fast-moving lengkap dalam satu mitra pengadaan'],
                ['point' => 'Menjaga performa kelistrikan starter dan kebersihan sirkulasi mesin'],
                ['point' => 'Kualitas produk terjamin sesuai spesifikasi kendaraan dan alat berat'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 11,
        ]);

        Product::create([
            'product_category_id' => $catSparepart->id,
            'name' => 'Bearing, Kampas Kopling, Kabel & Peralatan Mesin Lainnya',
            'slug' => 'sparepart-bearing-kampas-kopling-kabel-mesin',
            'sub_badge' => 'Transmisi & Mesin',
            'brand' => 'Divisi Sparepart MAA',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => '/images/products/sparepart-kampas-kopling.webp',
            'gallery_images' => [
                '/images/products/sparepart-kampas-kopling.webp',
                '/images/products/sparepart-bearing.webp',
                '/images/products/sparepart-kabel.webp',
            ],
            'short_summary' => 'Pengadaan Bearing presisi, Kampas Kopling (Clutch Disc), Kabel kelistrikan/kontrol, serta Peralatan Mesin lainnya untuk armada dan pabrik.',
            'description' => 'Melengkapi 12 produk utama di katalog Sparepart Equipment PT. Multi Abadi Aksana, kami menyediakan Bearing putaran tinggi, Kampas Kopling untuk sistem transmisi kendaraan/alat berat, Kabel kelistrikan multi-inti, serta berbagai peralatan mesin industri lainnya.',
            'why_choose_text' => 'Menjamin kelancaran sistem transmisi dan perputaran mesin industri maupun armada operasional dengan suku cadang berdaya tahan tinggi.',
            'specifications' => [
                ['label' => 'Item Katalog', 'value' => 'Bearing, Kampas Kopling, Kabel & Peralatan Mesin Lainnya'],
                ['label' => 'Aplikasi', 'value' => 'Sistem Transmisi Kendaraan, Alat Berat & Mesin Industri'],
                ['label' => 'Alur Pengadaan', 'value' => 'Komunikasi -> Survei -> Negosiasi -> Deal'],
            ],
            'advantages' => [
                ['point' => 'Bearing dan kampas kopling presisi untuk beban kerja berat'],
                ['point' => 'Didukung tim profesional dan jaringan supplier luas'],
                ['point' => 'Proses pengadaan transparan dan tepat waktu'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 12,
        ]);
    }
}
