<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProductAvailability: string implements HasLabel, HasColor
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

    public function getLabel(): ?string
    {
        return $this->label();
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::TERSEDIA => 'success',
            self::PRE_ORDER => 'warning',
            self::CUSTOM => 'info',
        };
    }
}
