<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ServiceScopeType: string implements HasLabel, HasColor
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

    public function getLabel(): ?string
    {
        return $this->label();
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::BARANG => 'primary',
            self::JASA => 'success',
        };
    }
}
