<?php

declare(strict_types=1);

namespace App\Helpers;

class BladeHelper
{
    public static function getSectionName(): string
    {
        $routeName = request()->route()->getName();

        return match (true) {
            str_contains($routeName, 'products') => 'Produkty',
            default => 'Produkty',
        };
    }
}
