<?php

namespace App\Enums;

enum StatusActiveEnum: int
{
    case Active = 1;
    case Inactive = 2;

    public function label(): string
    {
        return match ($this) {
            self::Active => 'مفعل',
            self::Inactive => 'غير مفعل',
        };
    }
}