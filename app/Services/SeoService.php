<?php

namespace App\Services;

class SeoService
{
    public const DEFAULT_TITLE = 'PT. Multi Abadi Aksana | General Trading, Supplier & Contractor';
    public const DEFAULT_DESC = 'Penyedia barang dan jasa terintegrasi untuk PJU (Penerangan Jalan Umum), Mekanikal-Elektrikal, Interior & Eksterior, serta Sparepart & Peralatan Industri di Sidoarjo, Jawa Timur.';

    public static function formatTitle(string $pageTitle): string
    {
        return "{$pageTitle} | PT. Multi Abadi Aksana";
    }
}

