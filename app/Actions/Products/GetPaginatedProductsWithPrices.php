<?php

declare(strict_types=1);

namespace App\Actions\Products;

use App\Models\Product;
use App\interfaces\MetalPriceServiceInterface;

class GetPaginatedProductsWithPrices
{
    public function __construct(private MetalPriceServiceInterface $metalPriceService){}

    public function execute(): mixed
    {
        $metalPrices = $this->metalPriceService->getCachedPrices();

        $products = Product::paginate(10);

        $products->setCollection(
            $products->getCollection()->transform(function ($product) use ($metalPrices) {
                $metalPrice = $metalPrices[$product->metal->value] ?? 0;

                $basePrice = $product->weight * $metalPrice;
                $changePercent = $product->change_percent;
                $changeValue = $basePrice * ($changePercent / 100);
                $finalPrice = $basePrice + $changeValue;

                $product->base_price = $basePrice;
                $product->change_value = $changeValue;
                $product->final_price = $finalPrice;

                return $product;
            })
        );

        return $products;
    }
}
