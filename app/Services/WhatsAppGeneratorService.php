<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ServicePillar;
use App\Settings\CompanySettings;

class WhatsAppGeneratorService
{
    public const DEFAULT_MAIN_PHONE = '6282342979898';

    public static function getOfficialMainPhone(): string
    {
        try {
            $rawPhone = app(CompanySettings::class)->whatsapp_main ?? null;
            if (! empty($rawPhone)) {
                return self::formatPhoneNumber($rawPhone);
            }
        } catch (\Throwable) {
            // Fallback to default phone if settings table is not yet initialized
        }

        return self::DEFAULT_MAIN_PHONE;
    }

    /**
     * Clean phone number to international WhatsApp format (e.g. 628...)
     */
    public static function formatPhoneNumber(?string $phone): string
    {
        if (!$phone) {
            return self::DEFAULT_MAIN_PHONE;
        }

        $cleaned = preg_replace('/[^0-9]/', '', $phone);

        if (str_starts_with($cleaned, '0')) {
            $cleaned = '62' . substr($cleaned, 1);
        }

        return $cleaned ?: self::DEFAULT_MAIN_PHONE;
    }

    /**
     * Generate WhatsApp Click-to-Chat URL for a specific product
     */
    public static function forProduct(Product $product, ?int $quantity = null, ?string $unit = null): string
    {
        $category = $product->category;
        $rawPhone = $category?->contact_phone ?: self::getOfficialMainPhone();
        $formattedPhone = self::formatPhoneNumber($rawPhone);

        $productUrl = url("/products/{$product->slug}");
        $categoryName = $category?->name ?? 'Katalog';
        $qtyLine = ($quantity && $quantity > 0) ? "\nEstimasi Kebutuhan: *{$quantity} " . ($unit ?: 'Unit') . "*" : '';

        $message = "Halo Admin PT. Multi Abadi Aksana, saya ingin meminta informasi detail dan konsultasi penawaran mengenai produk: *{$product->name}* (Kategori: {$categoryName}).{$qtyLine}\n\nLink Referensi: {$productUrl}\n\nTerima kasih.";

        return 'https://wa.me/' . $formattedPhone . '?text=' . urlencode($message);
    }

    /**
     * Generate general consultation WhatsApp URL
     */
    public static function forConsultation(?ServicePillar $pillar = null): string
    {
        $formattedPhone = self::getOfficialMainPhone();

        if ($pillar) {
            $message = "Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai kebutuhan proyek/pengadaan untuk layanan: *{$pillar->name}*.\n\nMohon informasi lebih lanjut.";
        } else {
            $message = "Halo Tim PT. Multi Abadi Aksana, saya tertarik untuk berkonsultasi mengenai pengadaan barang dan jasa untuk kebutuhan proyek kami.\n\nMohon informasi lebih lanjut.";
        }

        return 'https://wa.me/' . $formattedPhone . '?text=' . urlencode($message);
    }
}
