<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('dashboard');

Route::resource('products', ProductController::class)->except(['show', 'store', 'update']);

Auth::routes();
