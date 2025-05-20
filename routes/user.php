<?php

use App\Http\Controllers\v1\User\DesktopTypeController;
use App\Http\Controllers\v1\User\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\User\BlogController;
use App\Http\Controllers\v1\User\LangController;
use App\Http\Controllers\v1\User\BannerController;
use App\Http\Controllers\v1\User\ReviewController;
use App\Http\Controllers\v1\User\StatusController;
use App\Http\Controllers\v1\User\ContactController;
use App\Http\Controllers\v1\User\DesktopController;
use App\Http\Controllers\v1\User\ProductController;
use App\Http\Controllers\v1\User\ServiceController;
use App\Http\Controllers\v1\User\CategoryController;
use App\Http\Controllers\v1\User\CurrencyController;
use App\Http\Controllers\v1\User\ProductTypeController;
use App\Http\Controllers\v1\User\DeliveryMethodController;

Route::prefix('user')->group(function(){
    Route::apiResources([
        'blogs' => BlogController::class,
        'categories' => CategoryController::class,
        'contacts' => ContactController::class,
        'currencies' => CurrencyController::class,
        'banners' => BannerController::class,
        'delivery-methods' => DeliveryMethodController::class,
        'desktops' => DesktopController::class,
        'langs' => LangController::class,
        'products' => ProductController::class,
        'statuses' => StatusController::class,
        'reviews' => ReviewController::class,
        'services' => ServiceController::class,
        'orders' => OrderController::class,
        'desktop-types' => DesktopTypeController::class
    ], ['as' => 'user']);
    Route::get('/category-products/{slug}', [CategoryController::class, 'categoryWithProducts']);
    Route::get('/search-products', [ProductController::class, 'search']);
});
