<?php

declare(strict_types=1);

namespace App\Services;

use App\interfaces\MetalPriceServiceInterface;

class RealMetalPriceService implements MetalPriceServiceInterface
{
    public function getPrices(): array
    {
        throw new \Exception('Not implemented');
    }

    public function cachedGetPrices(): array
    {
        throw new \Exception('Not implemented');
    }
}
