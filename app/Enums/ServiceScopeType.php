<?php

namespace App\Enums;

enum ServiceScopeType: string
{
    case BARANG = 'barang';
    case JASA = 'jasa';

    public function label(): string
    {
        return match ($this) {
            self::BARANG => 'Pengadaan Barang (Hardware & Material)',
            self::JASA => 'Pengadaan Jasa (Services & Execution)',
        };
    }
}

