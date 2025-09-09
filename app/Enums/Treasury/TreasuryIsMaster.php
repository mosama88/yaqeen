<?php

namespace App\Enums\Treasury;

enum TreasuryIsMaster: int
{
    case Yes = 1;
    case No = 2;

    public function label(): string
    {
        return match ($this) {
            self::Yes => 'رئيسية',
            self::No => 'ليست رئيسية',
        };
    }
}
