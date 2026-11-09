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
            'pju-tiang-jalan-tol.webp',
            'pju-crane-erection.webp',
            'me-impeller-rotor-stainless.webp',
        ];

        foreach ($defaultImages as $fileName) {
            $sourcePath = public_path('images/projects/' . $fileName);
            $destPath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

            if (File::exists($sourcePath) && ! File::exists($destPath)) {
                File::copy($sourcePath, $destPath);
            }
        }

        if (HeroSlide::count() > 0) {
            return;
        }

        $slides = [
            [
                'title' => 'Spesialis Penerangan Jalan Umum & Mechanical Electrical',
                'subtitle' => 'Mitra strategis pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta rekayasa Mechanical & Electrical industri di Indonesia.',
                'image_path' => 'hero-slides/pju-k3-gempol-sidoarjo.webp',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Penerangan Jalan Umum Berstandar Mutu & K3',
                'subtitle' => 'Pengadaan dan instalasi Penerangan Jalan Umum All In One, Two In One, Konvensional, serta Tiang Hot Dip Galvanized untuk jalan nasional dan kawasan industri.',
                'image_path' => 'hero-slides/pju-tiang-jalan-tol.webp',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Konstruksi Sipil & Pendirian Tiang Terintegrasi',
                'subtitle' => 'Pelaksanaan pengecoran pondasi beton, pemasangan angkur baseplate, hingga pendirian tiang menggunakan armada mobil crane berstandar K3.',
                'image_path' => 'hero-slides/pju-crane-erection.webp',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Rekayasa Mechanical & Electrical Industri',
                'subtitle' => 'Layanan fabrikasi Impeller stainless steel, sistem blower pabrik, perakitan panel distribusi MDP/SDP/ATS, hingga instalasi daya industri.',
                'image_path' => 'hero-slides/me-impeller-rotor-stainless.webp',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }
    }
}

