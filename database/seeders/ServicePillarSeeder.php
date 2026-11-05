<?php

namespace Database\Seeders;

use App\Enums\ServiceScopeType;
use App\Models\ServicePillar;
use App\Models\ServiceScope;
use Illuminate\Database\Seeder;

class ServicePillarSeeder extends Seeder
{
    public function run(): void
    {
        // Pilar 1: Penerangan Jalan Umum (PJU)
        $pju = ServicePillar::create([
            'name' => 'Penerangan Jalan Umum (PJU)',
            'slug' => 'penerangan-jalan-umum',
            'code' => 'PJU',
            'icon' => 'heroicon-o-light-bulb',
            'short_summary' => 'Solusi penerangan jalan berbasis efisiensi energi (Solar Cell & PLN) dan konstruksi tiang penunjang.',
            'description' => 'PT. Multi Abadi Aksana menyediakan layanan pengadaan barang dan jasa terintegrasi untuk sistem Penerangan Jalan Umum (PJU), mulai dari lampu LED hemat energi, sistem mandiri tenaga surya (All In One, Two In One, Split System), tiang dan ornamen dekoratif, hingga pekerjaan sipil, instalasi, pengujian, dan pemeliharaan berkala.',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        ServiceScope::create([
            'service_pillar_id' => $pju->id,
            'type' => ServiceScopeType::BARANG,
            'title' => 'Pengadaan Barang (Hardware & Material) PJU',
            'description' => 'Penyediaan armature lampu, tiang penunjang, kontrol panel, dan sistem daya berkualitas tinggi.',
            'items' => [
                'Armature & Lampu PJU: Lampu LED hemat energi, sistem Solar Cell (All-in-One, Two-in-One, Split System), serta Lampu Sorot (Floodlight). Merek: COB, OSRAM, PHILIPS, ESTIKA.',
                'Tiang & Aksesori: Tiang PJU (Octagonal, Monopole, High Mast), tiang ornamen dekoratif, arm bracket (stang lampu), dan tiang lampu taman/pedestrian.',
                'Sistem Kontrol & Panel: Panel distribusi PJU, timer, photocell sensor, serta Smart Lighting Controller.',
                'Komponen Kelistrikan & Sistem Daya: Kabel distribusi (underground maupun udara), trafo penunjang, solar panel, baterai (Lithium / Gel), dan Solar Charge Controller.',
            ],
            'sort_order' => 1,
        ]);

        ServiceScope::create([
            'service_pillar_id' => $pju->id,
            'type' => ServiceScopeType::JASA,
            'title' => 'Pengadaan Jasa (Services & Execution) PJU',
            'description' => 'Pelaksanaan survei, pekerjaan sipil, instalasi, dan pemeliharaan berstandar K3.',
            'items' => [
                'Perencanaan & Survei Teknis: Evaluasi kebutuhan pencahayaan (lighting design), perhitungan kuat pencahayaan (lux level), survei lokasi, dan pemetaan jalur distribusi daya.',
                'Pekerjaan Sipil & Konstruksi: Penggalian tanah, pembuatan pondasi tiang PJU (pengecoran beton), dan pembuatan manhole/handhole jalur kabel bawah tanah.',
                'Jasa Instalasi & Pemasangan: Ereksi (pendirian) tiang, pemasangan armature lampu, penarikan kabel daya, penyambungan modul solar cell, dan perakitan panel distribusi.',
                'Pengujian & Komisioning (Testing & Commissioning): Pengujian kelistrikan, fungsi otomatisasi/sensor, dan verifikasi standar keselamatan jalan.',
                'Jasa Pemeliharaan & Perbaikan (Maintenance & Repair): Perawatan berkala, penggantian komponen rusak (lampu/baterai/panel), penggantian kabel, dan perbaikan darurat.',
            ],
            'sort_order' => 2,
        ]);

        // Pilar 2: Interior & Exterior
        $interior = ServicePillar::create([
            'name' => 'Interior & Exterior',
            'slug' => 'interior-exterior',
            'code' => 'INTERIOR',
            'icon' => 'heroicon-o-home-modern',
            'short_summary' => 'Perancangan tata ruang, finishing arsitektural, material dinding/lantai, furnitur, dan fasad modern.',
            'description' => 'Layanan pengadaan material dan pengerjaan konstruksi arsitektural interior dan eksterior untuk gedung perkantoran, komersial, perumahan, maupun fasilitas publik dengan penekanan pada estetika fungsional dan durabilitas tinggi.',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        ServiceScope::create([
            'service_pillar_id' => $interior->id,
            'type' => ServiceScopeType::BARANG,
            'title' => 'Pengadaan Barang (Material & Produk) Interior & Exterior',
            'description' => 'Material dinding, lantai, furnitur custom, dan elemen dekoratif berkualitas.',
            'items' => [
                'Penutup Dinding & Plafon: Gypsum board, panel PVC, wall panel WPC/UVP, acoustic tile, dan wallpaper.',
                'Material Lantai (Flooring): Parket kayu, vinyl, SPC flooring, karpet kantor, dan ubin granit/keramik.',
                'Furnitur & Partisi: Custom furniture (meja kerja, lemari, resepsionis), partisi gipsum/kaca, dan toilet cubicle system.',
                'Aksesori & Pencahayaan: Tirai/blinds, downlight decorative, dan elemen dekoratif interior lainnya.',
            ],
            'sort_order' => 1,
        ]);

        ServiceScope::create([
            'service_pillar_id' => $interior->id,
            'type' => ServiceScopeType::JASA,
            'title' => 'Pengadaan Jasa (Pekerjaan & Pelaksanaan) Interior & Exterior',
            'description' => 'Desain 3D, konstruksi partisi, finishing, fasad gedung, dan peremajaan ruang.',
            'items' => [
                'Perancangan & Konsultasi Desain: Pembuatan konsep tata ruang (layout design), visualisasi 3D, serta pemilihan skema material dan warna.',
                'Konstruksi & Finishing Interior: Pemasangan partisi, pengecatan dinding, instalasi plafon, penataan lantai, dan perakitan furnitur.',
                'Pekerjaan Aplikasi Eksterior: Pemasangan fasad ACP/kaca gedung tinggi, pembuatan serta perakitan rangka kanopi, dan pengerjaan elemen pagar/pintu utama.',
                'Renovasi & Pembenahan Ulang (Refurbishment): Pembongkaran struktur lama, perbaikan kerusakan tata ruang, dan peremajaan tampilan bangunan.',
                'Jasa Pemeliharaan (Maintenance): Perawatan berkala fasad luar, pembersihan dinding luar gedung (gondola work), serta perbaikan elemen dekoratif.',
            ],
            'sort_order' => 2,
        ]);

        // Pilar 3: Mechanical & Electrical (ME)
        $me = ServicePillar::create([
            'name' => 'Mechanical & Electrical (ME)',
            'slug' => 'mechanical-electrical',
            'code' => 'ME',
            'icon' => 'heroicon-o-bolt',
            'short_summary' => 'Panel daya, jalur kabel, genset, trafo, fabrikasi impeller industri, dan perawatan teknis.',
            'description' => 'Solusi keteknikan industri mencakup jaringan kelistrikan tegangan rendah-menengah, proteksi daya, sistem mekanikal pabrik, perpipaan, serta fabrikasi dan rekayasa suku cadang kritis seperti impeller.',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        ServiceScope::create([
            'service_pillar_id' => $me->id,
            'type' => ServiceScopeType::BARANG,
            'title' => 'Pengadaan Barang (Material & Produk) Mechanical & Electrical',
            'description' => 'Peralatan distribusi daya, panel proteksi, kabel, dan suku cadang mekanikal industri.',
            'items' => [
                'Sistem Elektrikal (Panel & Proteksi): Panel Utama (MDP/SDP), panel ATS/AMF, panel kontrol motor, circuit breaker (MCCB/MCB), dan capacitor bank.',
                'Kabel & Jalur Distribusi: Kabel listrik tegangan rendah dan menengah (NYA, NYM, NYY, XLPE), kabel kontrol, cable tray, ladder, dan conduit.',
                'Peralatan Utama & Industri: Transformator (trafo), genset, UPS (Uninterruptible Power Supply), stabilizer, armature sakelar/stopkontak, impeller industri, dan komponen perpipaan.',
            ],
            'sort_order' => 1,
        ]);

        ServiceScope::create([
            'service_pillar_id' => $me->id,
            'type' => ServiceScopeType::JASA,
            'title' => 'Pengadaan Jasa (Pekerjaan & Pelaksanaan) Mechanical & Electrical',
            'description' => 'Kalkulasi beban, instalasi kabel, fabrikasi impeller, uji beban, dan pemeliharaan.',
            'items' => [
                'Perancangan & Konsultasi Teknis: Perhitungan beban listrik dan desain skema jalur kelistrikan.',
                'Jasa Instalasi & Pemasangan: Penarikan kabel daya, perakitan panel listrik, dan instalasi penerangan interior/industri.',
                'Fabrikasi & Perbaikan Teknis: Jasa fabrikasi dan perbaikan komponen mekanikal industri khususnya impeller dan peralatan pabrik.',
                'Pengujian & Komisioning (Testing & Commissioning): Pengujian beban listrik, uji kebocoran perpipaan (hydrotest), uji tekanan sistem pemadam, dan otomatisasi panel & HVAC.',
                'Jasa Pemeliharaan & Perbaikan: Perawatan rutin berkala (preventive maintenance) pada panel, trafo, genset, dan unit HVAC.',
            ],
            'sort_order' => 2,
        ]);

        // Pilar 4: Sparepart & Equipment
        $sparepart = ServicePillar::create([
            'name' => 'Sparepart & Equipment',
            'slug' => 'sparepart-equipment',
            'code' => 'SPAREPART',
            'icon' => 'heroicon-o-wrench-screwdriver',
            'short_summary' => 'Penyediaan suku cadang dan pelumas armada kendaraan operasional, alat berat, dan mesin industri.',
            'description' => 'Divisi khusus pengadaan perlengkapan dan suku cadang alat berat, armada transportasi logistik, dan permesinan industri dengan jaminan orisinalitas, spesifikasi presisi, dan ketersediaan stok.',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        ServiceScope::create([
            'service_pillar_id' => $sparepart->id,
            'type' => ServiceScopeType::BARANG,
            'title' => 'Pengadaan Barang (Katalog Suku Cadang & Pelumas)',
            'description' => '13 Lini produk suku cadang untuk armada kendaraan operasional, alat berat, dan pabrik.',
            'items' => [
                'Oli (Lubricants) & Grease (Gemuk Pelumas) mutu tinggi',
                'Ban Luar & Ban Dalam untuk armada angkut dan alat berat',
                'Aki (Heavy Duty Battery) & Sistem Pengapian',
                'Filter (Oli, Udara, Bahan Bakar)',
                'Wiper, Baut Roda, Bearing Presisi, Kabel Mesin',
                'Kampas Kopling & Brake Shoe',
                'Lampu Kendaraan & Work Light Alat Berat',
                'Peralatan Mesin & Komponen Hidrolik Lainnya',
            ],
            'sort_order' => 1,
        ]);
    }
}

