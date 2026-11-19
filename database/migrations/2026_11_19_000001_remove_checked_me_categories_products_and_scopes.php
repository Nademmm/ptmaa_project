<?php

use App\Enums\ServiceScopeType;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ServicePillar;
use App\Models\ServiceScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;

/**
 * Menghapus kategori, produk, serta poin cakupan ME yang dicentang klien
 * untuk dihapus, menjaga database produksi selaras dengan seeder resmi.
 */
return new class extends Migration
{
    public function up(): void
    {
        $removedProductSlugs = [
            'fabrikasi-tangki-bbm-ducting-silo-baja',
            'desain-interior-3d-layout-builtin-furniture',
            'furnish-interior-gordyn-wallpaper-kaca-film',
            'desain-fasad-arsitektur-weather-resistant-all-in-one',
            'konstruksi-eksterior-kanopi-pagar-teralis-carport',
        ];

        Product::whereIn('slug', $removedProductSlugs)->delete();

        $removedCategorySlugs = [
            'fabrikasi-tangki-ducting-baja',
            'desain-pengerjaan-interior',
            'arsitektur-konstruksi-exterior',
        ];

        ProductCategory::whereIn('slug', $removedCategorySlugs)->delete();

        $categoryOrder = [
            'pju-tenaga-surya' => 1,
            'pju-pln-tiang' => 2,
            'panel-elektrikal-otomasi-plc' => 3,
            'mekanikal-blower-impeller' => 4,
            'konstruksi-mep-ei-bas' => 5,
        ];

        foreach ($categoryOrder as $slug => $sortOrder) {
            ProductCategory::where('slug', $slug)->update(['sort_order' => $sortOrder]);
        }

        Product::where('slug', 'fabrikasi-perbaikan-impeller-industri')->update([
            'is_featured' => true,
            'sort_order' => 7,
        ]);

        Product::where('slug', 'konstruksi-mep-ei-bas-tac')->update([
            'sort_order' => 8,
        ]);

        $mePillar = ServicePillar::where('slug', 'mechanical-electrical')->first();

        if ($mePillar) {
            $mePillar->update([
                'short_summary' => 'Solusi rekayasa mekanikal dan elektrikal gedung maupun industri: instalasi dan maintenance listrik gedung (hotel, apartemen, perkantoran, rumah sakit, pabrik), fabrikasi box & wiring panel berkapasitas besar (LVMDP, MDP/SDP, MCC/Switchgear, Kapasitor Bank, Sinkronisasi Genset), otomasi PLC, ducting BJLS, Impeller & Blower, MEP, BAS, serta pengerjaan fisik interior & fasad arsitektur.',
                'description' => 'Divisi rekayasa teknik PT. Multi Abadi Aksana untuk gedung bertingkat (hotel, apartemen, perkantoran, mall), fasilitas komersial, dan pabrik industri: instalasi serta maintenance kelistrikan gedung, perakitan panel daya berkapasitas besar (LVMDP, MDP/SDP, MCC, Switchgear), ducting BJLS, perbaikan mekanikal presisi (Impeller), instalasi MEP dan otomasi gedung, serta pengerjaan fisik interior & fasad arsitektur.',
            ]);

            $removedItemPrefixes = [
                'Fabrikasi Tangki BBM Genset',
                'Fabrikasi Silo & Storage bahan baku industri',
                'Furnish Interior:',
                'Material Finishing Weather Resistant:',
                'Furnish Eksterior:',
                'Lay Out Planning:',
                'Desain 3D Render:',
            ];

            $scopes = ServiceScope::where('service_pillar_id', $mePillar->id)
                ->orderBy('sort_order')
                ->get();

            foreach ($scopes as $scope) {
                $filteredItems = collect($scope->items ?? [])
                    ->reject(function (mixed $item) use ($removedItemPrefixes): bool {
                        $text = (string) $item;
                        foreach ($removedItemPrefixes as $prefix) {
                            if (str_starts_with(trim($text), $prefix)) {
                                return true;
                            }
                        }

                        return false;
                    })
                    ->values()
                    ->all();

                $updates = ['items' => $filteredItems];

                if ($scope->sort_order === 1 && $scope->type === ServiceScopeType::BARANG) {
                    $updates['description'] = 'Fabrikasi box panel kapasitas besar maupun custom, wiring panel daya & kontrol (LVMDP/MDP/SDP/MCC), ducting BJLS, dan komponen mekanikal.';
                } elseif ($scope->sort_order === 3 && $scope->type === ServiceScopeType::BARANG) {
                    $updates['title'] = 'Pengadaan Built-In Furniture Custom';
                    $updates['description'] = 'Penyediaan furnitur kustom terintegrasi dinding untuk ruang kerja, hunian, maupun komersial.';
                } elseif ($scope->sort_order === 4 && $scope->type === ServiceScopeType::JASA) {
                    $updates['title'] = 'Jasa Pengerjaan Fisik Interior & Desain Arsitektur';
                    $updates['description'] = 'Eksekusi pengerjaan fisik interior, desain fasad bangunan, hingga paket All In One arsitektur.';
                }

                $scope->update($updates);
            }
        }

        Cache::forget('service_pillars_all');
        Cache::forget('service_pillar_mechanical-electrical');
        Cache::forget('sitemap_xml_v2');
        ProductCategory::clearCatalogCache();
    }

    public function down(): void
    {
        // Penghapusan item layanan sesuai instruksi klien bersifat final pada alur migrasi ini.
    }
};
