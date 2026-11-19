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
        // Pastikan hanya 2 pilar bisnis resmi PT. Multi Abadi Aksana (Interior & Exterior menjadi bagian dari Mechanical & Electrical)
        ServicePillar::whereNotIn('slug', ['penerangan-jalan-umum', 'mechanical-electrical'])->delete();

        $pillars = [
            // ==========================================
            // PILAR 1: PENERANGAN JALAN UMUM
            // ==========================================
            [
                'name' => 'Penerangan Jalan Umum',
                'slug' => 'penerangan-jalan-umum',
                'code' => 'Divisi 1',
                'icon' => 'bx-bulb',
                'short_summary' => 'Spesialis pengadaan unit lampu PJU Tenaga Surya (All In One, Two In One, Konvensional), PJU PLN, Tiang Galvanis, beserta jasa konstruksi sipil dan instalasi terpadu.',
                'description' => 'Fokus utama PT. Multi Abadi Aksana dalam penyediaan infrastruktur Penerangan Jalan Umum (Solar Cell Mandiri maupun Listrik PLN) untuk jalan nasional, kawasan industri, hingga pedesaan dengan standar Keselamatan dan Kesehatan Kerja (K3).',
                'sort_order' => 1,
                'scopes' => [
                    [
                        'type' => ServiceScopeType::BARANG,
                        'title' => 'Pengadaan Material & Unit Penerangan Jalan Umum',
                        'description' => 'Penyediaan perangkat keras PJU Tenaga Surya, lampu PJU PLN hemat energi, dan tiang konstruksi Hot Dip Galvanized.',
                        'items' => [
                            'PJU Tenaga Surya All In One (Kontroler, baterai LiFePO4, dan solar panel menyatu dalam satu rumah lampu konkret)',
                            'PJU Tenaga Surya Two In One (Rumah lampu & baterai terintegrasi dengan solar panel terpisah berfitur klem lengan fleksibel)',
                            'PJU Tenaga Surya Konvensional / Split System (Lampu LED, modul solar panel, dan box baterai terpisah dengan struktur kokoh)',
                            'Lampu PJU PLN Hemat Energi: Seri COB, OSRAM, PHILIPS, dan ESTIKA berstandar IP65/IP66',
                            'Tiang PJU Hot Dip Galvanized (Octagonal, Hexagonal, Bulat, Lengan Parabola, High Mast & Tiang Dekoratif)',
                            'Komponen Pendukung: Panel Surya Monocrystalline/Polycrystalline, Baterai LiFePO4/VRLA Gel, Smart Controller MPPT, dan Angkur Baut Pondasi',
                        ],
                        'sort_order' => 1,
                    ],
                    [
                        'type' => ServiceScopeType::JASA,
                        'title' => 'Jasa Konstruksi Sipil, Erection & Pemeliharaan PJU',
                        'description' => 'Layanan terpadu mulai dari survei titik koordinat, pekerjaan pondasi sipil, erection tiang, hingga pemeliharaan berkala.',
                        'items' => [
                            'Survei teknis lapangan, pengukuran titik koordinat, dan perencanaan tata cahaya jalan',
                            'Pekerjaan galian tanah, pengecoran pondasi beton bertulang (baseplate), dan pemasangan angkur baut',
                            'Jasa erection (pendirian) tiang PJU menggunakan armada mobil crane dan skylift berstandar K3',
                            'Instalasi jaringan kabel bawah tanah / udara, perakitan box panel PJU, dan sistem grounding',
                            'Jasa pemeliharaan berkala (preventive maintenance), pembersihan modul surya, serta penggantian baterai dan komponen lampu',
                        ],
                        'sort_order' => 2,
                    ],
                ],
            ],

            // ==========================================
            // PILAR 2: MECHANICAL & ELECTRICAL
            // ==========================================
            [
                'name' => 'Mechanical & Electrical',
                'slug' => 'mechanical-electrical',
                'code' => 'Divisi 2',
                'icon' => 'bx-cog',
                'short_summary' => 'Solusi rekayasa mekanikal dan elektrikal gedung maupun industri: instalasi dan maintenance listrik gedung (hotel, apartemen, perkantoran, rumah sakit, pabrik), fabrikasi box & wiring panel berkapasitas besar (LVMDP, MDP/SDP, MCC/Switchgear, Kapasitor Bank, Sinkronisasi Genset), otomasi PLC, ducting BJLS, Impeller & Blower, MEP, BAS, serta pengerjaan fisik interior & fasad arsitektur.',
                'description' => 'Divisi rekayasa teknik PT. Multi Abadi Aksana untuk gedung bertingkat (hotel, apartemen, perkantoran, mall), fasilitas komersial, dan pabrik industri: instalasi serta maintenance kelistrikan gedung, perakitan panel daya berkapasitas besar (LVMDP, MDP/SDP, MCC, Switchgear), ducting BJLS, perbaikan mekanikal presisi (Impeller), instalasi MEP dan otomasi gedung, serta pengerjaan fisik interior & fasad arsitektur.',
                'sort_order' => 2,
                'scopes' => [
                    [
                        'type' => ServiceScopeType::BARANG,
                        'title' => 'Pengadaan Panel Elektrikal & Fabrikasi Mekanikal Industri',
                        'description' => 'Fabrikasi box panel kapasitas besar maupun custom, wiring panel daya & kontrol (LVMDP/MDP/SDP/MCC), ducting BJLS, dan komponen mekanikal.',
                        'items' => [
                            'Fabrikasi Box Panel Kapasitas Besar & Custom Enclosure (Mild Steel Powder Coating, Stainless Steel, dan Aluminium menyesuaikan standar IEC & IP Rating)',
                            'Perakitan & Wiring Panel Besar: Panel Utama Tegangan Rendah (LVMDP), MDP, SDP, MCC / Switchgear, Panel Sinkronisasi Genset (ATS/AMF), dan Kapasitor Bank',
                            'Sistem Otomasi: Customize PLC Programming untuk panel kontrol mesin, panel otomasi industri, dan HMI',
                            'Ducting & Exhaust Extention berbahan BJLS dan Carbon Steel untuk genset maupun tata udara HVAC',
                            'Fabrikasi & Dynamic Balancing Impeller Industri Stainless Steel dan Centrifugal Blower',
                        ],
                        'sort_order' => 1,
                    ],
                    [
                        'type' => ServiceScopeType::JASA,
                        'title' => 'Jasa Konstruksi MEP, E&I, BAS, Instalasi & Maintenance',
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
                        'sort_order' => 2,
                    ],
                    [
                        'type' => ServiceScopeType::BARANG,
                        'title' => 'Pengadaan Built-In Furniture Custom',
                        'description' => 'Penyediaan furnitur kustom terintegrasi dinding untuk ruang kerja, hunian, maupun komersial.',
                        'items' => [
                            'Built In Furniture Custom: Kitchen set, lemari full-ceiling, backdrop & panel TV, meja kerja, dan kabinet terintegrasi sudut ruang',
                        ],
                        'sort_order' => 3,
                    ],
                    [
                        'type' => ServiceScopeType::JASA,
                        'title' => 'Jasa Pengerjaan Fisik Interior & Desain Arsitektur',
                        'description' => 'Eksekusi pengerjaan fisik interior, desain fasad bangunan, hingga paket All In One arsitektur.',
                        'items' => [
                            'Pengerjaan Fisik Interior: Pembongkaran, finishing dinding & lantai, instalasi kelistrikan/sakelar/lighting, hingga perakitan furnitur',
                            'Desain Fasad Bangunan: Elemen tampilan luar arsitektural yang mengatur pencahayaan alami, sirkulasi udara, dan efisiensi energi',
                            'Paket All in One Arsitektur: Mulai dari konsep arsitektur, perhitungan struktur, perizinan (PBG/IMB), pengadaan material, hingga serah terima fisik bangunan',
                        ],
                        'sort_order' => 4,
                    ],
                ],
            ],
        ];

        foreach ($pillars as $pillarData) {
            $scopes = $pillarData['scopes'];
            unset($pillarData['scopes']);

            $pillar = ServicePillar::updateOrCreate(
                ['slug' => $pillarData['slug']],
                $pillarData
            );

            // Bersihkan scope lama agar selalu sinkron
            $pillar->scopes()->delete();

            foreach ($scopes as $scopeData) {
                ServiceScope::create([
                    'service_pillar_id' => $pillar->id,
                    'type' => $scopeData['type'],
                    'title' => $scopeData['title'],
                    'description' => $scopeData['description'],
                    'items' => $scopeData['items'],
                    'sort_order' => $scopeData['sort_order'],
                ]);
            }
        }
    }
}
