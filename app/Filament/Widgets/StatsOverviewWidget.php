<?php

namespace App\Filament\Widgets;

use App\Models\ContactInquiry;
use App\Models\Gallery;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk Aktif', Product::where('is_active', true)->count())
                ->description('Etalase produk digital non-ecommerce')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),

            Stat::make('Galeri Projek On Duty', Gallery::count())
                ->description('Dokumentasi proyek lapangan nyata')
                ->descriptionIcon('heroicon-m-camera')
                ->color('info'),

            Stat::make('Konsultasi / Leads Masuk', ContactInquiry::count())
                ->description('Calon klien di pipeline bisnis')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
        ];
    }
}

