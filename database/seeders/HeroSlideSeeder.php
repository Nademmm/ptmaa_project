<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        $targetDir = storage_path('app/public/hero-slides');
        File::ensureDirectoryExists($targetDir);

        $defaultImages = [
            'pju-k3-gempol-sidoarjo.webp',
            'pju-parabola-cabang-dua.webp',
            'pju-tiang-jalan-tol.webp',
            'pju-crane-erection.webp',
            'me-impeller-rotor-stainless.webp',
            'pju-solar-rest-area.webp',
        ];

        foreach ($defaultImages as $fileName) {
            $sourcePath = public_path('images/projects/' . $fileName);
            $destPath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destPath);
            }
        }

        $slides = [
            [
                'title' => 'Spesialis Penerangan Jalan Umum & Mechanical Electrical',
                'subtitle' => 'Mitra strategis pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta rekayasa Mechanical & Electrical industri di Indonesia.',
                'image_path' => 'hero-slides/pju-k3-gempol-sidoarjo.webp',
                'object_position' => 'center 15%',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Penerangan Jalan Umum Berstandar Mutu & K3',
                'subtitle' => 'Pengadaan dan instalasi Penerangan Jalan Umum All In One, Two In One, Konvensional, serta Tiang Hot Dip Galvanized untuk jalan nasional dan kawasan industri.',
                'image_path' => 'hero-slides/pju-parabola-cabang-dua.webp',
                'object_position' => 'center 30%',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Konstruksi Sipil & Pendirian Tiang Terintegrasi',
                'subtitle' => 'Pelaksanaan pengecoran pondasi beton, pemasangan angkur baseplate, hingga pendirian tiang menggunakan armada mobil crane berstandar K3.',
                'image_path' => 'hero-slides/pju-crane-erection.webp',
                'object_position' => 'center top',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Rekayasa Mechanical & Electrical Industri',
                'subtitle' => 'Layanan fabrikasi Impeller stainless steel, sistem blower pabrik, perakitan panel distribusi MDP/SDP/ATS, hingga instalasi daya industri.',
                'image_path' => 'hero-slides/me-impeller-rotor-stainless.webp',
                'object_position' => 'center 25%',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate(
                ['sort_order' => $slide['sort_order']],
                $slide
            );
        }
    }
}

