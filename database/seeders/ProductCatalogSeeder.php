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
        // Upsert berbasis slug: menjalankan seeder ulang tidak menghapus produk/kategori buatan admin.
        $upsertCategory = fn (array $data) => ProductCategory::updateOrCreate(['slug' => $data['slug']], $data);
        $upsertProduct = fn (array $data) => Product::updateOrCreate(['slug' => $data['slug']], $data);

        $pjuPillar = ServicePillar::where('slug', 'penerangan-jalan-umum')->first();
        $mePillar = ServicePillar::where('slug', 'mechanical-electrical')->first();

        // ==========================================
        // KATEGORI DIVISI 1: PENERANGAN JALAN UMUM
        // ==========================================
        $catPjuSolar = $upsertCategory([
            'service_pillar_id' => $pjuPillar?->id,
            'name' => 'Penerangan Jalan Umum Tenaga Surya',
            'slug' => 'pju-tenaga-surya',
            'icon' => 'heroicon-o-sun',
            'description' => 'Sistem Penerangan Jalan Umum berbasis energi terbarukan (All In One, Two In One, Konvensional Split System & Tiang Klem Lengan Fleksibel).',
            'contact_phone' => '082342979898',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $catPjuPln = $upsertCategory([
            'service_pillar_id' => $pjuPillar?->id,
            'name' => 'Penerangan Jalan Umum PLN & Tiang',
            'slug' => 'pju-pln-tiang',
            'icon' => 'heroicon-o-sparkles',
            'description' => 'Armature lampu jalan PLN (COB, OSRAM, PHILIPS, ESTIKA) beserta Tiang Penerangan Jalan Umum bentuk parabola melengkung, Octagonal, dan High Mast.',
            'contact_phone' => '082342979898',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // ==========================================
        // KATEGORI DIVISI 2: MECHANICAL & ELECTRICAL
        // ==========================================
        $catMePanel = $upsertCategory([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Panel Elektrikal & Otomasi PLC',
            'slug' => 'panel-elektrikal-otomasi-plc',
            'icon' => 'heroicon-o-cpu-chip',
            'description' => 'Fabrikasi Box panel stainless/aluminium, wiring panel distribusi MDP/SDP, sinkronisasi, MCC/switchgear, dan customize PLC programming.',
            'contact_phone' => '082342979898',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        $catMeFabrikasi = $upsertCategory([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Fabrikasi Tangki, Ducting & Struktur Baja',
            'slug' => 'fabrikasi-tangki-ducting-baja',
            'icon' => 'heroicon-o-wrench-screwdriver',
            'description' => 'Fabrikasi tangki BBM genset, tangki pendam, ducting exhaust BJLS, silo bahan baku, conveyor system, dan struktur baja industri tanpa MOQ.',
            'contact_phone' => '082342979898',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        $catMeImpeller = $upsertCategory([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Sistem Mekanikal Blower & Impeller',
            'slug' => 'mekanikal-blower-impeller',
            'icon' => 'heroicon-o-cog',
            'description' => 'Fabrikasi rotor impeller stainless steel, centrifugal blower unit industri PGIC-E34, dynamic balancing, dan rekondisi housing.',
            'contact_phone' => '082342979898',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        $catMeKonstruksi = $upsertCategory([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Konstruksi MEP, E&I & Building Automation',
            'slug' => 'konstruksi-mep-ei-bas',
            'icon' => 'heroicon-o-bolt',
            'description' => 'Instalasi MEP (HVAC, plumbing, daya), E&I instrumen sensor otomatis, Building Automation System (BAS), dan Testing Commissioning (TAC).',
            'contact_phone' => '082342979898',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        // ==========================================
        // KATEGORI DIVISI 2 (LANJUTAN): INTERIOR & EXTERIOR (BAGIAN MECHANICAL & ELECTRICAL)
        // ==========================================
        $catInoutInterior = $upsertCategory([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Desain & Pengerjaan Interior',
            'slug' => 'desain-pengerjaan-interior',
            'icon' => 'heroicon-o-home',
            'description' => 'Lay Out Planning denah 2D, pemodelan 3D render digital, pengerjaan konstruksi fisik interior, built-in furniture, gordyn, wallpaper & kaca film.',
            'contact_phone' => '082342979898',
            'sort_order' => 7,
            'is_active' => true,
        ]);

        $catInoutExterior = $upsertCategory([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Arsitektur & Konstruksi Exterior',
            'slug' => 'arsitektur-konstruksi-exterior',
            'icon' => 'heroicon-o-building-office-2',
            'description' => 'Desain fasad bangunan modern, finishing weather resistant (ACP/batu alam), paket All In One arsitektur (izin PBG/IMB), kanopi, pagar teralis & carport.',
            'contact_phone' => '082342979898',
            'sort_order' => 8,
            'is_active' => true,
        ]);

        // ==========================================
        // PRODUK PILAR 1: PENERANGAN JALAN UMUM
        // ==========================================

        $upsertProduct([
            'product_category_id' => $catPjuSolar->id,
            'name' => 'PJU Tenaga Surya All In One',
            'slug' => 'pju-tenaga-surya-all-in-one',
            'sub_badge' => 'PJU All In One',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/pju-all-in-one.webp',
            'gallery_images' => [
                'images/products/pju-all-in-one.webp',
                'images/projects/pju-solar-rest-area.webp',
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

        $upsertProduct([
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

        $upsertProduct([
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

        $upsertProduct([
            'product_category_id' => $catPjuPln->id,
            'name' => 'Armature Lampu PJU PLN (COB, OSRAM, PHILIPS, ESTIKA)',
            'slug' => 'armature-lampu-pju-pln-cob-osram-philips-estika',
            'sub_badge' => 'PJU PLN',
            'brand' => 'COB / OSRAM / PHILIPS / ESTIKA',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/lampu-pju-pln-terpasang.webp',
            'gallery_images' => [
                'images/products/lampu-pju-pln-terpasang.webp',
                'images/projects/pju-pln-nyala-malam.webp',
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

        $upsertProduct([
            'product_category_id' => $catPjuPln->id,
            'name' => 'Tiang PJU PLN Parabola, Octagonal, Monopole & High Mast',
            'slug' => 'tiang-pju-pln-parabola-octagonal-monopole',
            'sub_badge' => 'Tiang PJU',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/tiang-pju-parabola.webp',
            'gallery_images' => [
                'images/products/tiang-pju-parabola.webp',
                'images/projects/pju-parabola-cabang-dua.webp',
                'images/projects/pju-highmast-sorot.webp',
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
        // PRODUK PILAR 2: MECHANICAL & ELECTRICAL
        // ==========================================

        $upsertProduct([
            'product_category_id' => $catMePanel->id,
            'name' => 'Fabrikasi Box Panel, Wiring Panel & Pemrograman PLC Industri',
            'slug' => 'fabrikasi-box-panel-wiring-plc-industri',
            'sub_badge' => 'Panel & Otomasi',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/me-box-panel-outdoor.webp',
            'gallery_images' => [
                'images/products/me-box-panel-outdoor.webp',
                'images/products/me-plc-programming-hmi.webp',
                'images/projects/me-terminasi-kabel-pondasi.webp',
                'images/products/me-bas-building-automation.webp',
            ],
            'short_summary' => 'Menerima order fabrikasi Box panel stainless/aluminium, wiring panel distribusi, sinkronisasi, MCC/switchgear, serta custom PLC programming untuk panel otomasi.',
            'description' => 'Berdasarkan dokumen Proposal Mechanical Electrical PT. Multi Abadi Aksana, kami melayani order Fabrikasi Box panel, enclosure, dan kabinet berbahan stainless steel maupun aluminium sesuai standar IEC dan IP Rating. Layanan wiring panel mencakup panel distribusi utama (MDP/SDP), panel kontrol motor, panel sinkronisasi genset, serta MCC/switchgear. Dilengkapi pula layanan kustomisasi pemrograman PLC untuk otomasi mesin pabrik.',
            'why_choose_text' => 'Menyediakan spesifikasi material yang disesuaikan secara presisi dengan kebutuhan klien, rapi dan aman sesuai regulasi keselamatan kelistrikan industri.',
            'specifications' => [
                ['label' => 'Fabrikasi Enclosure', 'value' => 'Bahan Stainless Steel & Aluminium, IP Rating & Standar IEC'],
                ['label' => 'Lingkup Wiring', 'value' => 'Panel Distribusi, Panel Kontrol, Sinkronisasi, MCC / Switchgear'],
                ['label' => 'Pemrograman PLC', 'value' => 'Customize PLC Otomasi Industri & Integrasi Touchscreen HMI'],
                ['label' => 'Aksesori Komponen', 'value' => 'Schneider, ABB, Chint, Kabel NYAF & Terminal Terstandarisasi'],
            ],
            'advantages' => [
                ['point' => 'Material dan kapasitas dapat disesuaikan (customized) dengan beban riil pabrik'],
                ['point' => 'Pengerjaan wiring rapi, sistematis, dan teruji fungsi sebelum serah terima'],
                ['point' => 'Dukungan pemrograman otomasi PLC untuk meningkatkan efisiensi produksi'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 6,
        ]);

        $upsertProduct([
            'product_category_id' => $catMeFabrikasi->id,
            'name' => 'Fabrikasi Tangki BBM, Ducting BJLS, Silo & Struktur Baja Industri',
            'slug' => 'fabrikasi-tangki-bbm-ducting-silo-baja',
            'sub_badge' => 'Fabrikasi Industri',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::CUSTOM,
            'thumbnail_image' => 'images/products/me-tangki-bbm-silo.webp',
            'gallery_images' => [
                'images/products/me-tangki-bbm-silo.webp',
                'images/products/me-ducting-exhaust-bjls.webp',
                'images/products/me-steel-structure-baja.webp',
            ],
            'short_summary' => 'Fabrikasi tangki BBM genset, tangki pendam bawah tanah, ducting exhaust BJLS, silo bahan baku industri, conveyor system, dan struktur baja tanpa batasan MOQ.',
            'description' => 'Sesuai spesifikasi Proposal Mechanical Electrical PT. Multi Abadi Aksana, divisi fabrikasi kami memproduksi tangki bahan bakar minyak (harian dan penampungan genset), tangki pendam BBM bawah tanah, ducting dan exhaust extension berbahan BJLS maupun carbon steel untuk tata udara HVAC dan ruang genset, tangki silo bahan baku, conveyor system (belt, screw, roller bucket), serta struktur baja untuk bangunan pabrik dan tower. Seluruh pengerjaan menerima Custom Order tanpa minimum quantity (MOQ).',
            'why_choose_text' => 'Kapasitas workshop fleksibel yang siap melayani pesanan khusus (Custom Order) tanpa syarat MOQ, dengan pengelasan dan pelapisan material anti-korosi berdaya tahan tinggi.',
            'specifications' => [
                ['label' => 'Varian Tangki BBM', 'value' => 'Tangki Duduk (Storage Genset) & Tangki Pendam Bawah Tanah'],
                ['label' => 'Ducting & Exhaust', 'value' => 'Bahan BJLS & Carbon Steel untuk Genset, Fan Blower & HVAC'],
                ['label' => 'Storage & Conveyor', 'value' => 'Silo Bahan Baku, Belt Conveyor, Screw & Roller Bucket'],
                ['label' => 'Struktur Baja', 'value' => 'Rangka Bangunan Pabrik, Gudang, Mezzanine & Tower'],
                ['label' => 'Ketentuan Pemesanan', 'value' => 'Menerima Custom Order Tanpa Minimum of Quantity (MOQ)'],
            ],
            'advantages' => [
                ['point' => 'Fabrikasi presisi sesuai gambar kerja teknis (approval drawing)'],
                ['point' => 'Tanpa batasan minimum order, fleksibel untuk proyek skala kecil hingga pabrik besar'],
                ['point' => 'Pengujian kebocoran (leak test) dan pelapisan cat pelindung industri'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 7,
        ]);

        $upsertProduct([
            'product_category_id' => $catMeImpeller->id,
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
                ['label' => 'Pengujian & Komisioning', 'value' => 'Dynamic Balancing, Uji Fungsi Mekanikal & Pengujian Sistem HVAC'],
                ['label' => 'Rekam Jejak On Duty', 'value' => 'Penanganan Impeller & Sistem Blower Unit Industri PGIC-E34'],
            ],
            'advantages' => [
                ['point' => 'Dikerjakan langsung oleh tenaga ahli mekanikal berpengalaman di lingkungan pabrik'],
                ['point' => 'Material berkualitas tinggi sesuai spesifikasi teknis dan standar keselamatan'],
                ['point' => 'Didukung layanan preventive maintenance berkala untuk mencegah downtime'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 8,
        ]);

        $upsertProduct([
            'product_category_id' => $catMeKonstruksi->id,
            'name' => 'Konstruksi MEP, E&I, BAS & Testing Commissioning (TAC)',
            'slug' => 'konstruksi-mep-ei-bas-tac',
            'sub_badge' => 'Konstruksi ME',
            'brand' => 'PT. Multi Abadi Aksana',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/me-mep-plumbing-hvac.webp',
            'gallery_images' => [
                'images/products/me-mep-plumbing-hvac.webp',
                'images/products/me-bas-building-automation.webp',
                'images/projects/me-maintenance-apd-lengkap.webp',
                'images/projects/me-instalasi-flange-ducting.webp',
            ],
            'short_summary' => 'Layanan konstruksi MEP (HVAC, plumbing, daya), E&I instrumen sensor, Building Automation System (BAS terpadu), serta Testing, Adjusting & Commissioning.',
            'description' => 'Proposal Mechanical Electrical PT. Multi Abadi Aksana merinci layanan konstruksi lengkap: sektor Mechanical (tata udara, ventilasi, HVAC), sektor Electrical (distribusi tenaga listrik dan pencahayaan), dan Plumbing (air bersih, pembuangan, drainase). Ditunjang instalasi Electrical & Instrumental (E&I) untuk sensor dan aktuator mesin, sistem kendali terpadu Building Automation System (BAS) untuk monitoring gedung real-time, serta proses Testing, Adjusting, and Commissioning (TAC) sebelum serah terima.',
            'why_choose_text' => 'Mengintegrasikan mechanical, electrical, dan otomasi instrumen dalam satu pintu pelaksanaan, menjamin fasilitas gedung maupun pabrik beroperasi hemat energi dan handal.',
            'specifications' => [
                ['label' => 'Lingkup MEP', 'value' => 'Tata Udara HVAC, Ventilasi, Plumbing Air Bersih/Drainase & Distribusi Daya'],
                ['label' => 'Sektor E&I', 'value' => 'Sensor Pembaca Parameter, Aktuator Mesin, dan Panel Kontrol Otomatis'],
                ['label' => 'Sistem BAS', 'value' => 'Building Automation System: Kendali Terpadu Lighting, Tata Udara & Energi Real-Time'],
                ['label' => 'Layanan Pelaksanaan', 'value' => 'Installation Service, Maintenance & Retrofit, serta Tahapan TAC Lengkap'],
            ],
            'advantages' => [
                ['point' => 'Sistem kendali otomatis terpadu meningkatkan efisiensi energi gedung hingga 30%'],
                ['point' => 'Tahapan Testing, Adjusting & Commissioning (TAC) memastikan keamanan maksimal'],
                ['point' => 'Layanan retrofit untuk memodernisasi peralatan lama menjadi lebih ramah lingkungan'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 9,
        ]);

        // ==========================================
        // PRODUK PILAR 2 (LANJUTAN): INTERIOR & EXTERIOR
        // ==========================================

        $upsertProduct([
            'product_category_id' => $catInoutInterior->id,
            'name' => 'Desain Interior 3D, Lay Out Planning & Built-In Furniture Custom',
            'slug' => 'desain-interior-3d-layout-builtin-furniture',
            'sub_badge' => 'Interior & Furniture',
            'brand' => 'PT. Multi Abadi Aksana (In & Out Space)',
            'availability_status' => ProductAvailability::CUSTOM,
            'thumbnail_image' => 'images/products/inout-builtin-furniture.webp',
            'gallery_images' => [
                'images/products/inout-builtin-furniture.webp',
                'images/products/inout-desain-3d-render.webp',
                'images/products/inout-furnish-interior.webp',
                'images/projects/inout-pengerjaan-interior-kitchen.webp',
            ],
            'short_summary' => 'Tahap analisis layout 2D berskala, desain visual 3D render beresolusi tinggi, pengerjaan konstruksi fisik, serta pembuatan Built In Furniture custom.',
            'description' => 'Berdasarkan dokumen Proposal Interior & Exterior PT. Multi Abadi Aksana, kami melayani Lay Out Planning sebagai tahap analisis teknis tata letak furnitur, arah sirkulasi gerak, dan pembagian zona ruang secara proporsional. Dilanjutkan Desain 3D Render beresolusi tinggi yang menampilkan gambaran nyata hasil akhir lengkap dengan pencahayaan, tekstur material, dan paduan warna. Tahap fisik diwujudkan melalui pembuatan Built In Furniture custom-made (kitchen set, lemari full-ceiling, backdrop TV) yang memaksimalkan setiap inci sudut ruang, serta pengerjaan interior menyeluruh (pembongkaran, finishing dinding/lantai, hingga instalasi ME).',
            'why_choose_text' => 'Mengoptimalkan ruang hunian dan komersial Anda secara maksimal melalui perencanaan berskala presisi, visualisasi 3D realistis sebelum mulai kerja, serta fabrikasi furnitur kustom berkualitas tinggi.',
            'specifications' => [
                ['label' => 'Perencanaan Ruang', 'value' => 'Lay Out Planning Denah 2D Berskala & Analisis Sirkulasi Gerak'],
                ['label' => 'Pemodelan Visual', 'value' => 'Desain 3D Render Digital High-Resolution (Lighting, Tekstur & Warna)'],
                ['label' => 'Built-In Furniture', 'value' => 'Kitchen Set, Lemari Full-Ceiling, Panel TV, Meja Kerja & Rak Multifungsi'],
                ['label' => 'Pengerjaan Interior', 'value' => 'Pembongkaran, Finishing Dinding & Lantai, Instalasi ME & Perakitan'],
            ],
            'advantages' => [
                ['point' => 'Memaksimalkan setiap inci sudut ruangan yang tersisa dengan furnitur custom-made'],
                ['point' => 'Visualisasi 3D yang sangat nyata membantu Anda melihat hasil akhir sebelum eksekusi fisik'],
                ['point' => 'Pengerjaan terpadu satu atap mencakup sipil, elektrikal, finishing lantai, hingga furnitur'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => false,
            'sort_order' => 10,
        ]);

        $upsertProduct([
            'product_category_id' => $catInoutInterior->id,
            'name' => 'Pengadaan Furnish Interior (Gordyn Blind, Wallpaper & Kaca Film)',
            'slug' => 'furnish-interior-gordyn-wallpaper-kaca-film',
            'sub_badge' => 'Furnish Interior',
            'brand' => 'PT. Multi Abadi Aksana (In & Out Space)',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/inout-furnish-interior.webp',
            'gallery_images' => [
                'images/products/inout-furnish-interior.webp',
                'images/products/inout-builtin-furniture.webp',
            ],
            'short_summary' => 'Solusi terintegrasi untuk fungsi pencahayaan, privasi, estetika, dan efisiensi energi: gordyn blind blackout/sunscreen, pelapis wallpaper vinyl, dan kaca film penahan panas UV.',
            'description' => 'Sesuai Proposal Interior & Exterior PT. Multi Abadi Aksana, layanan Furnish Interior mengoptimalkan fungsi pencahayaan, privasi, dan estetika pada ruang komersial maupun hunian. Lingkup kerjanya mencakup survei dan pengukuran presisi di lapangan, pemilihan material spesifik seperti kain blackout/sunscreen, pelapis dinding vinyl-backed bertekstur, hingga kaca film penahan panas matahari (UV/infra merah) untuk menurunkan beban pendingin ruangan (AC).',
            'why_choose_text' => 'Mengurangi radiasi panas matahari dan meningkatkan privasi ruangan dengan material pilihan yang awet dan pemasangan rapi bergaransi.',
            'specifications' => [
                ['label' => 'Jenis Gordyn / Blind', 'value' => 'Roller Blind, Vertical Blind, Wooden Blind, Kain Blackout & Sunscreen'],
                ['label' => 'Pelapis Dinding', 'value' => 'Wallpaper Vinyl-Backed Tahan Lembap dengan Aneka Pilihan Motif'],
                ['label' => 'Kaca Film Pelindung', 'value' => 'Kaca Film Tolak Panas (Penahan Sinar UV & Infra Merah) & Kaca Film Artistik'],
                ['label' => 'Jasa Terkait', 'value' => 'Survei Pengukuran di Lokasi, Fabrikasi Kustom & Instalasi Profesional'],
            ],
            'advantages' => [
                ['point' => 'Membantu penghematan energi pendingin ruangan berkat penolak panas sinar UV'],
                ['point' => 'Menjaga privasi ruang kerja maupun ruang keluarga tanpa mengorbankan estetika'],
                ['point' => 'Pengukuran presisi di lokasi sehingga hasil pemasangan pas dan rapi'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => false,
            'sort_order' => 11,
        ]);

        $upsertProduct([
            'product_category_id' => $catInoutExterior->id,
            'name' => 'Desain Fasad Arsitektur Weather Resistant & Paket All in One Bangunan',
            'slug' => 'desain-fasad-arsitektur-weather-resistant-all-in-one',
            'sub_badge' => 'Fasad & Arsitektur',
            'brand' => 'PT. Multi Abadi Aksana (In & Out Space)',
            'availability_status' => ProductAvailability::CUSTOM,
            'thumbnail_image' => 'images/products/inout-fasad-arsitektur-modern.webp',
            'gallery_images' => [
                'images/products/inout-fasad-arsitektur-modern.webp',
                'images/products/inout-fasad-weather-resisten.webp',
                'images/projects/inout-fasad-gable-minimalis.webp',
            ],
            'short_summary' => 'Perancangan fasad bangunan modern sebagai identitas visual utama, aplikasi material weather resistant (ACP/batu alam), serta paket All In One berizin PBG/IMB.',
            'description' => 'Dalam Proposal Interior & Exterior PT. Multi Abadi Aksana, fasad bangunan adalah benteng perlindungan pertama dan identitas visual utama yang dirancang untuk mengatur pencahayaan alami, sirkulasi udara, serta efisiensi energi. Kami menerapkan material berstandar Weather Resistant dengan ketahanan tinggi terhadap terik sinar UV, hujan deras, dan kelembapan ekstrem (cat khusus eksterior, panel ACP, dan batu alam berpelapis pelindung). Didukung Paket All In One yang mencakup konsep arsitektur, perhitungan struktur, gambar kerja teknis, pengurusan izin (PBG/IMB), pemilihan material, hingga eksekusi konstruksi fisik di lapangan.',
            'why_choose_text' => 'Fasad bangunan yang tidak hanya menawan secara visual namun juga tangguh menghadapi cuaca tropis serta ramah energi, didukung kemudahan perizinan PBG/IMB.',
            'specifications' => [
                ['label' => 'Perancangan Fasad', 'value' => 'Fasad Bangunan Modern, Pengatur Pencahayaan Alami & Sirkulasi Udara'],
                ['label' => 'Standar Weather Resistant', 'value' => 'Panel ACP, Cat Pelindung UV/Hujan Ekstrem, Batu Alam Coating'],
                ['label' => 'Paket All In One', 'value' => 'Konsep Arsitektur, Hitungan Struktur, Gambar Kerja & Pengurusan PBG/IMB'],
                ['label' => 'Eksekusi Lapangan', 'value' => 'Pengadaan Material Tahan Cuaca & Konstruksi Fisik Menyeluruh'],
            ],
            'advantages' => [
                ['point' => 'Material tahan cuaca ekstrem menjaga tampilan bangunan tetap prima bertahun-tahun'],
                ['point' => 'Desain arsitektur modern memaksimalkan pencahayaan dan sirkulasi alami'],
                ['point' => 'Layanan All In One memudahkan Anda tanpa repot mengurus izin PBG/IMB terpisah'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => false,
            'sort_order' => 12,
        ]);

        $upsertProduct([
            'product_category_id' => $catInoutExterior->id,
            'name' => 'Konstruksi Eksterior (Kanopi Modern, Pagar Teralis Laser Cutting & Carport)',
            'slug' => 'konstruksi-eksterior-kanopi-pagar-teralis-carport',
            'sub_badge' => 'Eksterior & Kanopi',
            'brand' => 'PT. Multi Abadi Aksana (In & Out Space)',
            'availability_status' => ProductAvailability::TERSEDIA,
            'thumbnail_image' => 'images/products/inout-kanopi-pagar-carport.webp',
            'gallery_images' => [
                'images/products/inout-kanopi-pagar-carport.webp',
                'images/products/inout-fasad-weather-resisten.webp',
                'images/projects/inout-fasad-gable-minimalis.webp',
            ],
            'short_summary' => 'Pekerjaan struktur luar pengaman dan estetika bangunan: kanopi rangka baja, pagar teralis laser cutting anti-karat, dan penutup lantai carport anti-selip.',
            'description' => 'Sesuai Proposal Interior & Exterior PT. Multi Abadi Aksana, layanan Furnish Exterior mengombinasikan fungsi keamanan, perlindungan cuaca, dan penguatan estetika fasad. Proses pengerjaan meliputi survei lapangan dan perhitungan elevasi, pembuatan gambar kerja (approval drawing), fabrikasi presisi di workshop (pengelasan, laser cutting motif modern, pelapisan cat anti-karat / powder coating), hingga instalasi struktur kanopi, pagar teralis, serta pengerjaan penutup lantai carport anti-selip berbasis beban berat.',
            'why_choose_text' => 'Konstruksi kokoh berbahan baja galvanis dengan finishing cat powder coating tahan karat dan desain laser cutting artistik yang mempercantik hunian Anda.',
            'specifications' => [
                ['label' => 'Rangka Kanopi', 'value' => 'Hollow Galvanis, Baja WF, Atap Alderon, Polycarbonate & Kaca Tempered'],
                ['label' => 'Pagar & Teralis', 'value' => 'Besi Hollow, Ornamen Laser Cutting Custom, Finishing Powder Coating Anti-Karat'],
                ['label' => 'Area Carport', 'value' => 'Pengecoran Lantai, Paving Block / Batu Alam, Keramik Anti-Selip Tahan Beban'],
                ['label' => 'Tahapan Kerja', 'value' => 'Survei Elevasi, Approval Drawing, Fabrikasi Workshop & Instalasi Lapangan'],
            ],
            'advantages' => [
                ['point' => 'Finishing powder coating anti-karat menjamin daya tahan jangka panjang di area terbuka'],
                ['point' => 'Desain teralis laser cutting dapat disesuaikan dengan konsep arsitektur bangunan'],
                ['point' => 'Lantai carport kuat menahan beban kendaraan roda empat tanpa retak'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => false,
            'sort_order' => 13,
        ]);
    }
}
