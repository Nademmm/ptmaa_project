<?php

use App\Enums\ServiceScopeType;
use App\Models\HeroSlide;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ServicePillar;
use App\Models\ServiceScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;

/**
 * Memperbarui copywriting layanan dan produk divisi Mechanical & Electrical
 * agar menegaskan kemampuan instalasi & maintenance listrik gedung (hotel,
 * apartemen, perkantoran, mall, rumah sakit) serta panel berkapasitas besar.
 */
return new class extends Migration
{
    public function up(): void
    {
        $mePillar = ServicePillar::where('slug', 'mechanical-electrical')->first();

        if ($mePillar) {
            $mePillar->update([
                'short_summary' => 'Solusi rekayasa mekanikal dan elektrikal gedung maupun industri: instalasi dan maintenance listrik gedung (hotel, apartemen, perkantoran, rumah sakit, pabrik), fabrikasi box & wiring panel berkapasitas besar (LVMDP, MDP/SDP, MCC/Switchgear, Kapasitor Bank, Sinkronisasi Genset), otomasi PLC, tangki BBM, ducting, silo, struktur baja, MEP, BAS, serta Desain Interior & Exterior.',
                'description' => 'Divisi rekayasa teknik PT. Multi Abadi Aksana untuk gedung bertingkat (hotel, apartemen, perkantoran, mall), fasilitas komersial, dan pabrik industri: instalasi serta maintenance kelistrikan gedung, perakitan panel daya berkapasitas besar (LVMDP, MDP/SDP, MCC, Switchgear), tangki dan ducting, perbaikan mekanikal presisi (Impeller), instalasi MEP dan otomasi gedung, hingga desain interior dan konstruksi eksterior.',
            ]);

            $barangScope = ServiceScope::where('service_pillar_id', $mePillar->id)
                ->where('type', ServiceScopeType::BARANG->value)
                ->orderBy('sort_order')
                ->first();

            if ($barangScope) {
                $barangScope->update([
                    'description' => 'Fabrikasi box panel kapasitas besar maupun custom, wiring panel daya & kontrol (LVMDP/MDP/SDP/MCC), tangki BBM, ducting BJLS, silo bahan baku, struktur baja, dan komponen mekanikal.',
                    'items' => [
                        'Fabrikasi Box Panel Kapasitas Besar & Custom Enclosure (Mild Steel Powder Coating, Stainless Steel, dan Aluminium menyesuaikan standar IEC & IP Rating)',
                        'Perakitan & Wiring Panel Besar: Panel Utama Tegangan Rendah (LVMDP), MDP, SDP, MCC / Switchgear, Panel Sinkronisasi Genset (ATS/AMF), dan Kapasitor Bank',
                        'Sistem Otomasi: Customize PLC Programming untuk panel kontrol mesin, panel otomasi industri, dan HMI',
                        'Fabrikasi Tangki BBM Genset (tangki harian / storage) dan Tangki Pendam BBM bawah tanah',
                        'Ducting & Exhaust Extention berbahan BJLS dan Carbon Steel untuk genset maupun tata udara HVAC',
                        'Fabrikasi Silo & Storage bahan baku industri, Conveyor System (belt, screw, roller bucket), dan Struktur Baja pabrik/tower (Custom Order tanpa MOQ)',
                        'Fabrikasi & Dynamic Balancing Impeller Industri Stainless Steel dan Centrifugal Blower',
                    ],
                ]);
            }

            $jasaScope = ServiceScope::where('service_pillar_id', $mePillar->id)
                ->where('type', ServiceScopeType::JASA->value)
                ->orderBy('sort_order')
                ->first();

            if ($jasaScope) {
                $jasaScope->update([
                    'description' => 'Layanan instalasi dan maintenance listrik gedung (hotel, apartemen, perkantoran, mall, rumah sakit) serta konstruksi MEP, E&I, otomasi gedung, testing commissioning, dan overhaul pabrik.',
                    'items' => [
                        'Instalasi & Maintenance Listrik Gedung: Penarikan kabel feeder daya, panel lantai & distribusi, sistem grounding, serta perawatan kelistrikan rutin hotel, apartemen, perkantoran, mall, rumah sakit, dan pabrik',
                        'Konstruksi MEP (Mechanical, Electrical, Plumbing): Tata udara HVAC, ventilasi, pipa air bersih/buangan/drainase, dan distribusi daya gedung bertingkat maupun industri',
                        'E&I (Electrical dan Instrumental): Pemasangan sensor, aktuator, dan kalibrasi parameter kontrol mesin otomatis',
                        'BAS (Building Automation System): Sistem kendali terpadu pencahayaan, HVAC, keamanan, dan pemantauan energi real-time',
                        'Installation Service: Pemasangan presisi jalur kabel, panel berkapasitas besar, dan perpipaan dengan tahapan Testing, Adjusting, and Commissioning (TAC)',
                        'Maintenance & Retrofit Kelistrikan: Inspeksi beban, perawatan rutin panel kapasitas besar, pencegahan downtime, serta modernisasi teknologi lama menjadi sistem hemat energi',
                        'Jasa overhaul, balancing dinamis impeller, dan preventive maintenance fasilitas industri di lokasi klien',
                    ],
                ]);
            }
        }

        if ($catPanel = ProductCategory::where('slug', 'panel-elektrikal-otomasi-plc')->first()) {
            $catPanel->update([
                'description' => 'Fabrikasi box panel kapasitas besar & custom, wiring panel distribusi (LVMDP, MDP, SDP), sinkronisasi genset, MCC/switchgear, kapasitor bank, dan customize PLC programming.',
            ]);
        }

        if ($catKonstruksi = ProductCategory::where('slug', 'konstruksi-mep-ei-bas')->first()) {
            $catKonstruksi->update([
                'description' => 'Instalasi dan maintenance listrik gedung bertingkat (hotel, apartemen, perkantoran, mall, rumah sakit), konstruksi MEP (HVAC, plumbing, daya), E&I instrumen sensor, BAS, serta Testing Commissioning (TAC).',
            ]);
        }

        if ($panelProduct = Product::where('slug', 'fabrikasi-box-panel-wiring-plc-industri')->first()) {
            $panelProduct->update([
                'name' => 'Fabrikasi Box Panel Besar, Wiring LVMDP/MDP & Otomasi PLC',
                'short_summary' => 'Fabrikasi box panel kapasitas besar (free-standing & wall-mount), perakitan wiring LVMDP, MDP, SDP, MCC/Switchgear, Sinkronisasi Genset, Kapasitor Bank, serta custom PLC programming untuk gedung dan industri.',
                'description' => 'Berdasarkan layanan Mechanical & Electrical PT. Multi Abadi Aksana, kami melayani fabrikasi box panel kapasitas besar (free-standing multi-kubikel maupun wall-mounted) berbahan mild steel powder coating, stainless steel, serta aluminium sesuai standar IEC dan IP Rating. Lingkup perakitan dan wiring mencakup Panel Utama Tegangan Rendah (LVMDP), MDP, SDP, MCC / Switchgear, Panel Sinkronisasi Genset (ATS/AMF), Kapasitor Bank untuk perbaikan faktor daya, serta panel otomasi berbasis PLC dan HMI untuk kebutuhan gedung bertingkat (hotel, apartemen, perkantoran, mall) maupun pabrik industri.',
                'why_choose_text' => 'Menyediakan spesifikasi material dan kapasitas arus yang disesuaikan secara presisi dengan beban daya gedung bertingkat maupun pabrik, rapi, dan sesuai regulasi keselamatan kelistrikan.',
                'specifications' => [
                    ['label' => 'Fabrikasi Box & Kabinet', 'value' => 'Box Panel Besar Free-Standing & Wall-Mount (Mild Steel, Stainless Steel, Aluminium), Standar IEC & IP Rating'],
                    ['label' => 'Panel Kapasitas Besar', 'value' => 'LVMDP, MDP, SDP, MCC / Switchgear, Panel Sinkronisasi Genset (ATS/AMF) & Kapasitor Bank'],
                    ['label' => 'Aplikasi Bangunan & Pabrik', 'value' => 'Gedung Bertingkat (Hotel, Apartemen, Perkantoran, Mall), Rumah Sakit & Kawasan Industri'],
                    ['label' => 'Pemrograman PLC & Komponen', 'value' => 'Customize PLC Otomasi & HMI dengan Komponen Schneider, ABB, Chint, Kabel NYAF & Busbar Tembaga Terstandar'],
                ],
                'advantages' => [
                    ['point' => 'Mampu merakit panel berkapasitas besar (multi-kubikel LVMDP/MDP/MCC) sesuai beban riil gedung maupun pabrik'],
                    ['point' => 'Wiring busbar dan instalasi komponen rapi, sistematis, dan lolos uji fungsi sebelum serah terima'],
                    ['point' => 'Dukungan pemrograman otomasi PLC & HMI untuk meningkatkan efisiensi operasional'],
                ],
            ]);
        }

        if ($mepProduct = Product::where('slug', 'konstruksi-mep-ei-bas-tac')->first()) {
            $mepProduct->update([
                'name' => 'Instalasi Listrik Gedung (Hotel, Apartemen), MEP, E&I & Maintenance',
                'short_summary' => 'Jasa instalasi dan maintenance listrik gedung bertingkat (hotel, apartemen, perkantoran, mall), konstruksi MEP, E&I instrumen sensor, BAS, serta Testing, Adjusting & Commissioning (TAC).',
                'description' => 'Layanan Mechanical & Electrical PT. Multi Abadi Aksana mencakup instalasi baru maupun maintenance rutin kelistrikan gedung bertingkat seperti hotel, apartemen, perkantoran, pusat perbelanjaan, rumah sakit, hingga kawasan pabrik. Pekerjaan meliputi penarikan kabel feeder daya utama, pemasangan panel LVMDP/MDP/SDP per lantai, sistem penerangan dan daya gedung, grounding penangkal petir, konstruksi MEP (HVAC, ventilasi, plumbing air bersih/drainase), Electrical & Instrumental (E&I), Building Automation System (BAS), perawatan berkala (preventive maintenance & troubleshooting), serta Testing, Adjusting, and Commissioning (TAC).',
                'why_choose_text' => 'Mengintegrasikan instalasi kelistrikan gedung, panel berkapasitas besar, pemeliharaan rutin, MEP, dan otomasi dalam satu pintu pelaksanaan sehingga gedung maupun pabrik beroperasi aman dan andal.',
                'specifications' => [
                    ['label' => 'Instalasi & Maintenance Gedung', 'value' => 'Hotel, Apartemen, Perkantoran, Mall, Rumah Sakit & Pabrik (Feeder Daya, Panel Lantai, Lighting & Grounding)'],
                    ['label' => 'Perawatan Berkala & Retrofit', 'value' => 'Preventive Maintenance Panel Besar, Pengecekan Beban Fasa, Pengencangan Terminasi & Troubleshooting'],
                    ['label' => 'Lingkup MEP & E&I', 'value' => 'Tata Udara HVAC, Ventilasi, Plumbing Air Bersih/Drainase, Sensor, Aktuator & Panel Kontrol Otomatis'],
                    ['label' => 'BAS & Komisioning (TAC)', 'value' => 'Building Automation System Terpadu serta Tahapan Testing, Adjusting, and Commissioning (TAC)'],
                ],
                'advantages' => [
                    ['point' => 'Tim teknisi K3 berpengalaman menangani instalasi listrik gedung bertingkat maupun maintenance rutin tanpa mengganggu operasional'],
                    ['point' => 'Sistem kendali otomatis (BAS) mempermudah pemantauan dan meningkatkan efisiensi energi gedung'],
                    ['point' => 'Tahapan Testing, Adjusting & Commissioning (TAC) serta layanan retrofit memastikan keandalan jaringan jangka panjang'],
                ],
            ]);
        }

        if ($meSlide = HeroSlide::where('sort_order', 4)->where('title', 'Rekayasa Mechanical & Electrical Industri')->first()) {
            $meSlide->update([
                'title' => 'Rekayasa Mechanical & Electrical Gedung & Industri',
                'subtitle' => 'Layanan instalasi dan maintenance listrik gedung (hotel, apartemen, perkantoran), perakitan panel berkapasitas besar (LVMDP, MDP/SDP, MCC, ATS/AMF), hingga fabrikasi Impeller industri.',
            ]);
        }

        Cache::forget('service_pillars_all');
        Cache::forget('service_pillar_mechanical-electrical');
        Cache::forget('hero_slides_active');
        Cache::forget('sitemap_xml_v2');
        ProductCategory::clearCatalogCache();
    }

    public function down(): void
    {
        // Pembaruan copy layanan bersifat non-struktural; tidak perlu rollback data teks.
    }
};
