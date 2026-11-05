<?php

namespace App\Enums;

enum ProductAvailability: string
{
    case TERSEDIA = 'tersedia';
    case PRE_ORDER = 'pre_order';
    case CUSTOM = 'custom';

    public function label(): string
    {
        return match ($this) {
            self::TERSEDIA => 'Tersedia / Siap Suplai',
            self::PRE_ORDER => 'Pre-Order (PO)',
            self::CUSTOM => 'Custom Fabrikasi',
        };
    }
}

