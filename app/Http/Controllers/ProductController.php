<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Products\GetPaginatedProductsWithPrices;
use App\Models\Product;
use Illuminate\Contracts\View\View as ContractView;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function index(GetPaginatedProductsWithPrices $action): ContractView
    {
        $products = $action->execute();

        return View::make('products.index', [
            'products' => $products,
        ]);
    }

    public function create(): ContractView
    {
        return View::make('products.create');
    }

    public function edit(Product $product): ContractView
    {
        return View::make('products.edit', [
            'product' => $product
        ]);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return Redirect::route('products.index');
    }
}
