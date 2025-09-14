<?php

namespace App\Enums;

enum UnitIsMaster: int
{
    case Master = 1;
    case Fragmentation = 2;

    public function label(): string
    {
        return match ($this) {
            self::Master => 'وحدة أب',
            self::Fragmentation => 'وحدة تجزئة',
        };
    }
}
