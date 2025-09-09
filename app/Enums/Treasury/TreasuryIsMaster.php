<?php

namespace App\Enums\Treasury;

enum TreasuryIsMaster: int
{
    case Main = 1;
    case SubBranch = 2;

    public function label(): string
    {
        return match ($this) {
            self::Main => 'رئيسية',
            self::SubBranch => 'فرعية',
        };
    }
}
