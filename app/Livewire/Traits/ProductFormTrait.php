<?php

declare(strict_types=1);

namespace App\Livewire\Traits;

use App\Enums\Metal;
use App\interfaces\MetalPriceServiceInterface;

trait ProductFormTrait
{
    public string $name;
    public Metal $metal = Metal::GOLD;
    public float $weight = 0;
    public int $change_percent = 0;
    public float $base_price = 0;
    public float $change_value = 0;
    public float $final_price = 0;
    public $metalPrices = [];

    public function mount(MetalPriceServiceInterface $metalPriceService): void
    {
        $this->metalPrices = $metalPriceService->cachedGetPrices();
        $this->calculateFinalPrice();
    }

    public function loadMetalPrices(MetalPriceServiceInterface $metalPriceService): void
    {
        $this->metalPrices = $metalPriceService->cachedGetPrices();
        $this->calculateFinalPrice();
    }

    public function refreshPrices(MetalPriceServiceInterface $metalPriceService): void
    {
        $this->loadMetalPrices($metalPriceService);
    }

    public function updated($propertyName): void
    {
        $this->calculateFinalPrice();
    }

    public function calculateFinalPrice(): void
    {
        $this->validate($this->calculateRules());

        $metalPrice = $this->metalPrices[$this->metal->value] ?? 0;
        $this->base_price = $this->weight * $metalPrice;

        $this->change_value = $this->change_percent ? ($this->base_price * ($this->change_percent / 100)) : 0;
        $this->final_price = $this->base_price + $this->change_value;
    }
}
