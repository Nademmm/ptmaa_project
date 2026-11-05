<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ServicePillarSeeder::class,
            ProductCatalogSeeder::class,
            GallerySeeder::class,
            CompanySettingsSeeder::class,
        ]);
    }
}

