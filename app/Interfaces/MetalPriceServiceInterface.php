<?php

declare(strict_types=1);

namespace App\Interfaces;

interface MetalPriceServiceInterface
{
    public function getPrices(): array;

    public function getCachedPrices(): array;
}
