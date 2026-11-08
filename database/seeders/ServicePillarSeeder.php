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
        // Hapus pilar lama di luar 2 fokus bisnis utama
        ServicePillar::whereNotIn('slug', ['penerangan-jalan-umum', 'mechanical-electrical'])->delete();

        $pillars = [
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
            [
                'name' => 'Mechanical & Electrical',
                'slug' => 'mechanical-electrical',
                'code' => 'Divisi 2',
                'icon' => 'bx-cog',
                'short_summary' => 'Solusi rekayasa mekanikal dan elektrikal industri mencakup fabrikasi Impeller & Blower, perakitan panel MDP/SDP/ATS, transformator, genset, serta instalasi daya pabrik.',
                'description' => 'Divisi rekayasa teknik PT. Multi Abadi Aksana yang melayani kebutuhan pabrik dan fasilitas industri, mulai dari fabrikasi komponen mekanikal presisi (Impeller), hingga instalasi dan pemeliharaan sistem kelistrikan tegangan rendah dan menengah.',
                'sort_order' => 2,
                'scopes' => [
                    [
                        'type' => ServiceScopeType::BARANG,
                        'title' => 'Pengadaan Perangkat Mechanical & Electrical Industri',
                        'description' => 'Suplai peralatan distribusi daya listrik, hasil fabrikasi mekanikal presisi, serta sistem kontrol dan otomasi industri.',
                        'items' => [
                            'Fabrikasi Impeller Industri (Centrifugal Blower, Rotor Blade Stainless Steel, Fan Housing & Ducting)',
                            'Panel Distribusi Utama (MDP), Sub Distribution Panel (SDP), Panel Otomatis ATS/AMF, dan Panel Kapasitor Bank',
                            'Komponen Proteksi & Distribusi: ACB, MCCB, MCB, Kontaktor, Kabel Industri (NYA, NYM, NYY, XLPE), dan Cable Tray/Ladder',
                            'Mesin & Peralatan Utama: Genset Industri, Transformator (Trafo), Motor Listrik 3 Phase, Pompa Industri, dan Sistem HVAC',
                            'Sistem Kontrol & Otomasi: Inverter VFD, PLC, Star Delta Starter, dan Instrumentasi Daya',
                        ],
                        'sort_order' => 1,
                    ],
                    [
                        'type' => ServiceScopeType::JASA,
                        'title' => 'Jasa Instalasi Mekanikal-Elektrikal, Fabrikasi & Overhaul',
                        'description' => 'Eksekusi instalasi kelistrikan pabrik, rekondisi komponen mekanikal, serta kontrak pemeliharaan rutin oleh teknisi bersertifikat K3.',
                        'items' => [
                            'Jasa fabrikasi kustom, rekondisi, penggantian shaft/blade, dan dynamic balancing Impeller blower industri',
                            'Instalasi jaringan kelistrikan pabrik, gudang logistik, dan fasilitas industri (terminasi panel, penarikan kabel, grounding & penangkal petir)',
                            'Pemasangan dan integrasi mesin produksi, sistem ventilasi blower/exhaust pabrik, perpipaan industri, dan pompa',
                            'Pengujian beban kelistrikan (commissioning), audit efisiensi daya, dan troubleshooting gangguan sistem kontrol',
                            'Jasa perawatan rutin berkala (preventive maintenance) dan overhaul mesin mekanikal-elektrikal di lokasi pabrik klien',
                        ],
                        'sort_order' => 2,
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
