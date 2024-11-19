<?php

declare(strict_types=1);

namespace App\Livewire;

use App\interfaces\MetalPriceServiceInterface;
use App\Livewire\Traits\ProductFormRulesTrait;
use App\Livewire\Traits\ProductFormTrait;
use App\Models\Product;
use Livewire\Component;

class ProductEdit extends Component
{
    use ProductFormTrait, ProductFormRulesTrait;
    public ?Product $product;

    public function mount(Product $product, MetalPriceServiceInterface $metalPriceService)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->metal = $product->metal;
        $this->weight = $product->weight;
        $this->change_percent = $product->change_percent;

        $this->metalPrices = $metalPriceService->getCachedPrices();
        $this->calculateFinalPrice();
    }

    public function saveProduct()
    {
        $this->validate($this->saveRules());

        $this->product->update([
            'name' => $this->name,
            'metal' => $this->metal,
            'weight' => $this->weight,
            'change_percent' => $this->change_percent,
        ]);

        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product-edit');
    }
}
