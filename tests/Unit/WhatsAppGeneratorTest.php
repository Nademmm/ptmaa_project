<?php

namespace Tests\Unit;

use App\Services\WhatsAppGeneratorService;
use PHPUnit\Framework\TestCase;

class WhatsAppGeneratorTest extends TestCase
{
    public function test_format_phone_number_converts_leading_zero_to_62(): void
    {
        $this->assertSame('6282342979898', WhatsAppGeneratorService::formatPhoneNumber('0823-4297-9898'));
        $this->assertSame('6282342979898', WhatsAppGeneratorService::formatPhoneNumber('+62 823-4297-9898'));
        $this->assertSame('6282342979898', WhatsAppGeneratorService::formatPhoneNumber(null));
    }
}

