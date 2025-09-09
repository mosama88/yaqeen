<?php

namespace App\Enums\Treasury;

enum TreasuryIsMaster: int
{
    case Master = 1;
    case SubBranch = 2;

    public function label(): string
    {
        return match ($this) {
            self::Master => 'رئيسية',
            self::SubBranch => 'فرعية',
        };
    }
}