<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Traits\{ProductFormTrait, ProductFormRulesTrait};
use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    use ProductFormTrait, ProductFormRulesTrait;

    public function saveProduct()
    {
        $this->validate($this->saveRules());

        Product::create([
            'name' => $this->name,
            'metal' => $this->metal,
            'weight' => $this->weight,
            'change_percent' => $this->change_percent,
        ]);

        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product-create');
    }
}
