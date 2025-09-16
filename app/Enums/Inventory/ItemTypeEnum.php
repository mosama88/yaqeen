<?php

namespace App\Enums\Inventory;

enum ItemTypeEnum: int
{
    case Stored = 1;
    case Consumed = 2;
    case Custody = 3;

    public function label(): string
    {
        return match ($this) {
            self::Stored => 'مخُزنة',
            self::Consumed => 'مستهلكة',
            self::Custody => 'عهدة',
        };
    }
}
