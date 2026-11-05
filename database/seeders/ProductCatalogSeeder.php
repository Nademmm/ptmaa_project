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
            'description' => 'Sistem lampu penerangan jalan mandiri bertenaga matahari (All In One, Two In One, Split System).',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // Kategori 2: PJU PLN & Tiang
        $catPjuPln = ProductCategory::create([
            'service_pillar_id' => $pjuPillar?->id,
            'name' => 'PJU PLN & Tiang',
            'slug' => 'pju-pln-tiang',
            'icon' => 'heroicon-o-sparkles',
            'description' => 'Lampu LED jalan jaringan PLN (Philips, Osram, COB) serta tiang octagonal, parabola, dan high mast.',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // Kategori 3: Mechanical & Electrical
        $catMe = ProductCategory::create([
            'service_pillar_id' => $mePillar?->id,
            'name' => 'Mechanical & Electrical',
            'slug' => 'mechanical-electrical',
            'icon' => 'heroicon-o-bolt',
            'description' => 'Panel MDP/SDP, ATS/AMF, trafo, genset, kabel distribusi, dan impeller industri.',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Kategori 4: Interior & Exterior
        $catInterior = ProductCategory::create([
            'service_pillar_id' => $interiorPillar?->id,
            'name' => 'Interior & Exterior',
            'slug' => 'interior-exterior',
            'icon' => 'heroicon-o-home-modern',
            'description' => 'Wall panel WPC/PVC, flooring SPC, gypsum, custom furniture, dan fasad ACP.',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // Kategori 5: Sparepart & Equipment (Nomor WA khusus sparepart)
        $catSparepart = ProductCategory::create([
            'service_pillar_id' => $sparepartPillar?->id,
            'name' => 'Sparepart & Equipment',
            'slug' => 'sparepart-equipment',
            'icon' => 'heroicon-o-wrench-screwdriver',
            'description' => 'Pelumas, filter, ban luar/dalam, aki, bearing, dan suku cadang alat berat / armada industri.',
            'contact_phone' => '081216592824',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        // --- Produk 1: PJU Solar Cell All In One ---
        Product::create([
            'product_category_id' => $catPjuSolar->id,
            'name' => 'PJU Tenaga Surya All In One Integrated',
            'slug' => 'pju-tenaga-surya-all-in-one',
            'sub_badge' => 'All In One',
            'brand' => 'MAA SolarTech',
            'availability_status' => ProductAvailability::TERSEDIA,
            'short_summary' => 'Lampu PJU bertenaga surya terintegrasi di mana solar panel, baterai Lithium LiFePO4, dan kontroler cerdas menyatu dalam satu housing aluminium.',
            'description' => 'PJU Tenaga Surya All In One merupakan solusi mutakhir penerangan jalan mandiri tanpa kabel listrik PLN. Seluruh modul solar panel monocrystalline efisiensi tinggi, sistem manajemen baterai (BMS), sel baterai lithium tahan lama, dan sensor cahaya/gerak terintegrasi secara kompak di dalam satu unit rumah lampu.',
            'why_choose_text' => 'Pemasangan sangat cepat dan praktis karena tidak membutuhkan penarikan kabel antar tiang. Sangat cocok untuk jalan pedesaan, jalan lingkar kawasan industri, area perkebunan, dan proyek infrastruktur pemerintah yang mengedepankan efisiensi biaya perawatan.',
            'specifications' => [
                ['label' => 'Daya LED', 'value' => '60W - 120W Ultra Bright LED'],
                ['label' => 'Tipe Solar Panel', 'value' => 'Monocrystalline Silicon High Efficiency (18V)'],
                ['label' => 'Tipe Baterai', 'value' => 'Lithium Iron Phosphate (LiFePO4) Grade A'],
                ['label' => 'Luminous Efficacy', 'value' => '> 160 lm/Watt'],
                ['label' => 'Color Temperature (CCT)', 'value' => '6000K - 6500K (Daylight / Cool White)'],
                ['label' => 'Durasi Penerangan', 'value' => '12 jam / hari (Autonomy 2-3 hari mendung)'],
                ['label' => 'Material Housing', 'value' => 'Die-cast Aluminum IP65 Tahan Korosi'],
                ['label' => 'Tinggi Tiang Rekomendasi', 'value' => '6 - 9 Meter'],
            ],
            'advantages' => [
                ['point' => 'Nol Biaya Listrik: 100% energi terbarukan dari tenaga surya'],
                ['point' => 'Instalasi Cepat: Langsung dipasang pada stang tiang tanpa perakitan box baterai terpisah'],
                ['point' => 'Otomatis Bekerja: Menyala otomatis saat senja dan mati saat fajar menggunakan photocell cerdas'],
                ['point' => 'Durabilitas Ekstrem: Proteksi IP65 tahan hujan deras, petir, dan suhu tropis Indonesia'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 1,
        ]);

        // --- Produk 2: PJU Solar Cell Two In One ---
        Product::create([
            'product_category_id' => $catPjuSolar->id,
            'name' => 'PJU Tenaga Surya Two In One Flexi Angle',
            'slug' => 'pju-tenaga-surya-two-in-one',
            'sub_badge' => 'Two In One',
            'brand' => 'MAA SolarTech',
            'availability_status' => ProductAvailability::TERSEDIA,
            'short_summary' => 'Konfigurasi PJU tenaga surya dengan lampu dan baterai terintegrasi dalam armature, sementara solar panel terpasang terpisah dengan sudut kemiringan fleksibel.',
            'description' => 'PJU Two In One memberikan keseimbangan sempurna antara kemudahan instalasi All In One dengan fleksibilitas tangkapan sinar matahari sistem Split. Panel surya terpisah dapat diarahkan secara presisi mengikuti orientasi sinar matahari optimal di lokasi proyek.',
            'why_choose_text' => 'Pilihan tepat untuk area jalan dengan naungan pohon atau orientasi jalan tertentu yang membutuhkan sudut kemiringan panel lebih leluasa guna memaksimalkan pengisian daya baterai.',
            'specifications' => [
                ['label' => 'Daya LED', 'value' => '80W - 150W LED Chip'],
                ['label' => 'Tipe Solar Panel', 'value' => 'Monocrystalline 120W - 200W terpisah dengan bracket rotasi'],
                ['label' => 'Tipe Baterai', 'value' => 'LiFePO4 terpasang di rumah lampu utama'],
                ['label' => 'Tingkat Proteksi', 'value' => 'IP66 Waterproof & Dustproof'],
                ['label' => 'Tinggi Tiang Rekomendasi', 'value' => '7 - 10 Meter'],
            ],
            'advantages' => [
                ['point' => 'Orientasi Panel Fleksibel: Arah kemiringan solar panel dapat diatur 360 derajat'],
                ['point' => 'Kapasitas Daya Lebih Besar: Mampu menampung wattase lampu dan kapasitas baterai lebih tinggi'],
                ['point' => 'Garansi Komponen Lengkap dengan ketersediaan suku cadang berkelanjutan'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 2,
        ]);

        // --- Produk 3: PJU PLN Lampu LED & Tiang Octagonal ---
        Product::create([
            'product_category_id' => $catPjuPln->id,
            'name' => 'Lampu PJU PLN Philips / Osram & Tiang Octagonal',
            'slug' => 'lampu-pju-pln-led-dan-tiang-octagonal',
            'sub_badge' => 'PJU PLN',
            'brand' => 'Philips / Osram / Estika',
            'availability_status' => ProductAvailability::TERSEDIA,
            'short_summary' => 'Armature lampu LED jalan berstandar dinas pekerjaan umum didukung tiang baja octagonal hot-dip galvanized anti karat.',
            'description' => 'Paket pengadaan lampu jalan PLN untuk arteri kota, jalan provinsi, dan kawasan industri. Dilengkapi proteksi lonjakan tegangan (Surge Protection 10kV) serta tiang baja octagonal yang diproses galvanisasi celup panas (Hot Dip Galvanized) berstandar ASTM A123.',
            'why_choose_text' => 'Memenuhi spesifikasi teknis dinas perhubungan (Dishub) dan kementerian PUPR. Tiang galvanis terbukti tahan korosi hingga lebih dari 20 tahun di lingkungan tropis.',
            'specifications' => [
                ['label' => 'Tegangan Operasional', 'value' => 'AC 100V - 277V / 50-60 Hz'],
                ['label' => 'Daya Lampu', 'value' => '90W / 120W / 150W / 200W'],
                ['label' => 'Surge Protection', 'value' => '10kV / 10kA internal protection'],
                ['label' => 'Tipe Tiang', 'value' => 'Octagonal / Monopole / Parabola Hot Dip Galvanized'],
                ['label' => 'Tinggi Tiang', 'value' => '7 Meter, 9 Meter, 11 Meter, 14 Meter'],
            ],
            'advantages' => [
                ['point' => 'Standar Mutu PUPR & Dishub: Memenuhi standar kuat pencahayaan jalan raya'],
                ['point' => 'Ketahanan Karat 20+ Tahun dengan proses Hot Dip Galvanizing berstandar internasional'],
                ['point' => 'Didukung pemasangan pondasi beton dan penarikan kabel bawah tanah berstandar K3'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 3,
        ]);

        // --- Produk 4: Mechanical Impeller Industri ---
        Product::create([
            'product_category_id' => $catMe->id,
            'name' => 'Fabrikasi Industrial Impeller & Blower Rotor Presisi',
            'slug' => 'fabrikasi-industrial-impeller-dan-blower',
            'sub_badge' => 'Mechanical',
            'brand' => 'MAA Precision Engineering',
            'availability_status' => ProductAvailability::CUSTOM,
            'short_summary' => 'Jasa fabrikasi, perbaikan teknis, dan dynamic balancing untuk berbagai jenis impeller pompa industri, exhaust fan, dan blower turbin.',
            'description' => 'PT. Multi Abadi Aksana memiliki kapabilitas fabrikasi dan perbaikan komponen mekanikal industri khususnya impeller pompa lumpur, impeller sirkulasi pendingin, dan blower sentrifugal. Dikerjakan dengan proses permesinan presisi dan uji Dynamic Balancing untuk memastikan vibrasi nol saat beroperasi pada RPM tinggi.',
            'why_choose_text' => 'Mengurangi downtime operasional pabrik Anda secara signifikan dengan opsi rekondisi komponen lama atau fabrikasi unit baru dengan material tahan abrasi dan asam (SS304 / SS316 / Cast Steel).',
            'specifications' => [
                ['label' => 'Material Pilihan', 'value' => 'Stainless Steel 304/316, Cast Iron, Bronze, Mild Steel'],
                ['label' => 'Tipe Impeller', 'value' => 'Open, Semi-Open, Closed, Vane Impeller'],
                ['label' => 'Diameter Fabrikasi', 'value' => 'Custom up to 2000 mm'],
                ['label' => 'Pengujian Kualitas', 'value' => 'Dynamic Balancing ISO 1940 Grade G2.5, Dye Penetrant Test'],
            ],
            'advantages' => [
                ['point' => 'Presisi Tinggi: Hasil penyeimbangan dinamis mengurangi getaran dan aus bantalan (bearing)'],
                ['point' => 'Material Tahan Kimia & Abrasi sesuai karakteristik cairan/udara industri'],
                ['point' => 'Layanan Darurat: Respon cepat untuk rekondisi impeller pabrik yang mengalami aus mendadak'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 4,
        ]);

        // --- Produk 5: Wall Panel WPC & Finishing Interior ---
        Product::create([
            'product_category_id' => $catInterior->id,
            'name' => 'Wall Panel WPC / UVP & Sistem Partisi Gedung',
            'slug' => 'wall-panel-wpc-uvp-dan-partisi-gedung',
            'sub_badge' => 'Interior',
            'brand' => 'Aksana Decor',
            'availability_status' => ProductAvailability::TERSEDIA,
            'short_summary' => 'Material penutup dinding kayu komposit modern (WPC) dan panel marmer UV tahan rayap dan air untuk kantor dan residensial.',
            'description' => 'Material pelapis dinding dan partisi interior berkualitas tinggi yang memberikan estetika mewah kayu alami atau marmer premium tanpa risiko lapuk, rayap, maupun jamur. Sangat ideal untuk ruang lobi perkantoran, ruang pertemuan dinas, dan koridor komersial.',
            'why_choose_text' => 'Instalasi bersih, cepat, ramah lingkungan, dan tidak memerlukan pengecatan berkala sehingga menghemat biaya perawatan gedung.',
            'specifications' => [
                ['label' => 'Komposisi Material', 'value' => 'Wood Plastic Composite (WPC) / PVC Sheet UV Coated'],
                ['label' => 'Ketahanan', 'value' => '100% Anti Rayap, Tahan Air, Flame Retardant (B1)'],
                ['label' => 'Dimensi Profil', 'value' => 'Panjang 290 cm, Lebar 16 cm, Tebal 24 mm'],
                ['label' => 'Pilihan Motif', 'value' => 'Teak Wood, Walnut, White Oak, Marble Glossy, Charcoal'],
            ],
            'advantages' => [
                ['point' => 'Estetika Elegan: Menghadirkan suasana mewah berkelas internasional'],
                ['point' => 'Perawatan Mudah: Cukup dibersihkan dengan lap basah tanpa bahan kimia khusus'],
                ['point' => 'Didukung tim aplikator dan konsultan tata ruang 3D berpengalaman'],
            ],
            'is_featured' => false,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 5,
        ]);

        // --- Produk 6: Oli & Grease Alat Berat ---
        Product::create([
            'product_category_id' => $catSparepart->id,
            'name' => 'Oli & Grease Heavy Duty Mesin Industri & Alat Berat',
            'slug' => 'oli-dan-grease-alat-berat-mesin-industri',
            'sub_badge' => 'Sparepart',
            'brand' => 'Pertamina / Shell / Mobil / Total',
            'availability_status' => ProductAvailability::TERSEDIA,
            'short_summary' => 'Pelumas mesin diesel beban berat, oli hidrolik, gear oil, dan gemuk kalsium/litium tahan tekanan ekstrem.',
            'description' => 'Penyediaan pelumas industri dan armada alat berat dalam kemasan drum (209L) maupun pail (20L). Dirancang khusus untuk menjaga performa mesin excavator, dump truck, bulldozer, dan peralatan pabrik dalam kondisi temperatur tinggi dan beban kerja tanpa henti.',
            'why_choose_text' => 'Jaminan produk 100% original bersertifikasi COA (Certificate of Analysis) resmi dari pabrikan dengan harga kompetitif dan pasokan berkelanjutan.',
            'specifications' => [
                ['label' => 'Varian Pelumas', 'value' => 'Engine Oil (SAE 15W-40 CI-4), Hydraulic Oil (ISO VG 46/68), Gear Oil'],
                ['label' => 'Varian Grease', 'value' => 'Lithium Complex EP-2, Calcium Sulfonate Grease'],
                ['label' => 'Kemasan', 'value' => 'Pail (18L - 20L), Drum (200L - 209L)'],
                ['label' => 'Standar Mutu', 'value' => 'API CI-4/CH-4, DIN 51524 Part 2, ISO 11158'],
            ],
            'advantages' => [
                ['point' => 'Jaminan 100% Asli dengan dokumen sertifikasi resmi'],
                ['point' => 'Melindungi komponen dari gesekan ekstrem dan memperpanjang umur mesin armada'],
                ['point' => 'Layanan pengiriman cepat ke lokasi proyek atau workshop se-Jawa Timur'],
            ],
            'is_featured' => true,
            'has_warranty_badge' => true,
            'has_eco_k3_badge' => true,
            'sort_order' => 6,
        ]);
    }
}

