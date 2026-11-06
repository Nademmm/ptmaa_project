<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum InquiryPipelineStatus: string implements HasLabel, HasColor
{
    case KOMUNIKASI = 'komunikasi';
    case SURVEI = 'survei';
    case NEGOSIASI = 'negosiasi';
    case DEAL = 'deal';
    case BATAL = 'batal';

    public function label(): string
    {
        return match ($this) {
            self::KOMUNIKASI => '01. Komunikasi Awal',
            self::SURVEI => '02. Survei Lapangan',
            self::NEGOSIASI => '03. Negosiasi Penawaran',
            self::DEAL => '04. Deal / Kontrak',
            self::BATAL => 'Batal / Ditunda',
        };
    }

    public function getLabel(): ?string
    {
        return $this->label();
    }

    public function color(): string
    {
        return match ($this) {
            self::KOMUNIKASI => 'info',
            self::SURVEI => 'warning',
            self::NEGOSIASI => 'primary',
            self::DEAL => 'success',
            self::BATAL => 'danger',
        };
    }

    public function getColor(): string | array | null
    {
        return $this->color();
    }
}
