<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/products');

    Route::resource('products', ProductController::class)->except(['show', 'store', 'update']);
});

Auth::routes();
