<?php

declare(strict_types=1);

namespace App\interfaces;

interface MetalPriceServiceInterface
{
    public function getPrices(): array;

    public function GetCachedPrices(): array;
}
