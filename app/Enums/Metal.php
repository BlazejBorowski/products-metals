<?php

declare(strict_types=1);

namespace App\Enums;

enum Metal: string
{
    case GOLD = 'Złoto';
    case SILVER = 'Srebro';
    case PLATINUM = 'Platyna';
    case PALLADIUM = 'Pallad';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
