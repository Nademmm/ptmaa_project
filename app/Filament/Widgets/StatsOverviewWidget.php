<?php

namespace App\Filament\Widgets;

use App\Enums\InquiryPipelineStatus;
use App\Models\ContactInquiry;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Product;
use App\Models\ServicePillar;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $activeProducts = Product::where('is_active', true)->count();
        $totalProducts = Product::count();
        $totalGalleries = Gallery::count();
        $publishedPosts = Post::where('is_published', true)->count();
        $totalInquiries = ContactInquiry::count();
        $newInquiries = ContactInquiry::where('pipeline_status', InquiryPipelineStatus::KOMUNIKASI->value)->count();

        return [
            Stat::make('Produk & Material Aktif', "{$activeProducts} / {$totalProducts} Item")
                ->description(ServicePillar::count() . ' Divisi Fokus Bisnis Utama')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),

            Stat::make('Dokumentasi Projek On Duty', "{$totalGalleries} Proyek")
                ->description('Portofolio instalasi & pengerjaan lapangan')
                ->descriptionIcon('heroicon-m-camera')
                ->color('info'),

            Stat::make('Artikel & Publikasi Teknis', "{$publishedPosts} Artikel Tayang")
                ->description('Edukasi standar SNI, PUIL & TKDN')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),

            Stat::make('Permintaan & Konsultasi Klien', "{$totalInquiries} Pesan Masuk")
                ->description($newInquiries > 0 ? "{$newInquiries} permintaan baru menunggu tindak lanjut" : 'Seluruh permintaan telah ditindaklanjuti')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color($newInquiries > 0 ? 'warning' : 'success'),
        ];
    }
}
