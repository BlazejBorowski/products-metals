<?php

declare(strict_types=1);

namespace App\Services;

use App\interfaces\MetalPriceServiceInterface;
use Faker\Factory;
use Illuminate\Support\Facades\Cache;

class FakeMetalPriceService implements MetalPriceServiceInterface
{
    public function getPrices(): array
    {
        $faker = Factory::create();

        return [
            'Złoto' => $faker->randomFloat(2, 2, 2.5),
            'Srebro' => $faker->randomFloat(2, 2, 5),
            'Platyna' => $faker->randomFloat(2, 1, 1.5),
            'Pallad' => $faker->randomFloat(2, 1.5, 2),
        ];
    }

    public function GetCachedPrices(): array
    {
        return Cache::remember('metal_prices', 5, function () {
            return $this->getPrices();
        });
    }
}
