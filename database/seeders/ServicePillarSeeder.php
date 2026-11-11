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
                'short_summary' => 'Solusi rekayasa mekanikal dan elektrikal industri (Box Panel, wiring panel, PLC, tangki BBM, ducting, silo, struktur baja, MEP, E&I, BAS) serta rancang bangun Interior & Exterior (3D render, built-in furniture, fasad, kanopi, pagar & carport).',
                'description' => 'Divisi rekayasa teknik PT. Multi Abadi Aksana yang melayani kebutuhan pabrik, fasilitas industri, hunian, dan ruang komersial: fabrikasi panel kelistrikan, tangki dan ducting, perbaikan mekanikal presisi (Impeller), instalasi MEP dan otomasi gedung, hingga desain interior, fasad arsitektur, dan konstruksi eksterior.',
                'sort_order' => 2,
                'scopes' => [
                    [
                        'type' => ServiceScopeType::BARANG,
                        'title' => 'Pengadaan Panel Elektrikal & Fabrikasi Mekanikal Industri',
                        'description' => 'Fabrikasi Box panel stainless/aluminium, wiring panel distribusi, tangki BBM, ducting BJLS, silo bahan baku, struktur baja, dan komponen mekanikal.',
                        'items' => [
                            'Fabrikasi Box Panel, Enclosure & Kabinet (Stainless Steel dan Aluminium menyesuaikan standar IEC & IP Rating)',
                            'Wiring Panel: Panel Distribusi (MDP/SDP), Panel Kontrol, Panel Sinkronisasi, MCC / Switchgear, dan Kapasitor Bank',
                            'Sistem Otomasi: Customize PLC Programming untuk panel kontrol mesin, panel otomasi industri, dan HMI',
                            'Fabrikasi Tangki BBM Genset (tangki harian / storage) dan Tangki Pendam BBM bawah tanah',
                            'Ducting & Exhaust Extention berbahan BJLS dan Carbon Steel untuk genset maupun tata udara HVAC',
                            'Fabrikasi Silo & Storage bahan baku industri, Conveyor System (belt, screw, roller bucket), dan Struktur Baja pabrik/tower (Custom Order tanpa MOQ)',
                            'Fabrikasi & Dynamic Balancing Impeller Industri Stainless Steel dan Centrifugal Blower',
                        ],
                        'sort_order' => 1,
                    ],
                    [
                        'type' => ServiceScopeType::JASA,
                        'title' => 'Jasa Konstruksi MEP, E&I, BAS, Instalasi & Maintenance',
                        'description' => 'Layanan konstruksi instalasi mechanical electrical plumbing, instrumentasi otomatis, otomasi gedung, testing commissioning, serta overhaul pabrik.',
                        'items' => [
                            'Konstruksi MEP (Mechanical, Electrical, Plumbing): Tata udara HVAC, ventilasi, pipa air bersih/buangan/drainase, dan distribusi daya gedung',
                            'E&I (Electrical dan Instrumental): Pemasangan sensor, aktuator, dan kalibrasi parameter kontrol mesin otomatis',
                            'BAS (Building Automation System): Sistem kendali terpadu pencahayaan, HVAC, keamanan, dan pemantauan energi real-time',
                            'Installation Service: Pemasangan presisi jalur kabel, panel, dan perpipaan dengan tahapan Testing, Adjusting, and Commissioning (TAC)',
                            'Maintenance and Retrofit: Perawatan rutin berkala, pencegahan downtime, dan modernisasi teknologi lama menjadi sistem hemat energi',
                            'Jasa overhaul, balancing dinamis impeller, dan preventive maintenance fasilitas industri di lokasi klien',
                        ],
                        'sort_order' => 2,
                    ],
                    [
                        'type' => ServiceScopeType::BARANG,
                        'title' => 'Pengadaan Built-In Furniture, Furnish & Material Eksterior',
                        'description' => 'Penyediaan furnitur kustom terintegrasi dinding, furnish interior lengkap, dan material fasad tahan cuaca ekstrem.',
                        'items' => [
                            'Built In Furniture Custom: Kitchen set, lemari full-ceiling, backdrop & panel TV, meja kerja, dan kabinet terintegrasi sudut ruang',
                            'Furnish Interior: Gordyn blind (blackout & sunscreen), pelapis wallpaper vinyl-backed, serta kaca film tolak panas penahan sinar UV/infra merah',
                            'Material Finishing Weather Resistant: Cat pelindung cuaca ekstrem, panel ACP (Aluminium Composite Panel), dan batu alam berpelapis proteksi',
                            'Furnish Eksterior: Kanopi baja/hollow modern, pagar teralis laser cutting/powder coating anti-karat, dan lantai carport anti-selip berbasis beban berat',
                        ],
                        'sort_order' => 3,
                    ],
                    [
                        'type' => ServiceScopeType::JASA,
                        'title' => 'Jasa Desain Arsitektur, 3D Render, Renovasi & Konstruksi Fisik',
                        'description' => 'Eksekusi perencanaan tata letak denah, pemodelan visual digital, pengerjaan konstruksi interior-eksterior, hingga paket All In One.',
                        'items' => [
                            'Lay Out Planning: Analisis teknis peletakan furnitur, arah sirkulasi gerak, dan zonasi fungsional dalam denah 2D berskala',
                            'Desain 3D Render: Pemodelan visual digital beresolusi tinggi dengan simulasi pencahayaan, tekstur material, dan perpaduan warna nyata',
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
