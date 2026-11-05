<?php

namespace App\Enums;

enum InquiryPipelineStatus: string
{
    case KOMUNIKASI = 'komunikasi';
    case SURVEI = 'survei';
    case NEGOSIASI = 'negosiasi';
    case DEAL = 'deal';
    case BATAL = 'batal';

    public function label(): string
    {
        return match ($this) {
            self::KOMUNIKASI => '01. Komunikasi',
            self::SURVEI => '02. Survei',
            self::NEGOSIASI => '03. Negosiasi',
            self::DEAL => '04. Deal',
            self::BATAL => 'Batal / Ditolak',
        };
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
}

