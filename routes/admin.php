<?php

use App\Http\Controllers\v1\Admin\GameController;
use App\Http\Controllers\v1\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Admin\AuthController;
use App\Http\Controllers\v1\Admin\BlogController;
use App\Http\Controllers\v1\Admin\LangController;
use App\Http\Controllers\v1\Admin\BrandController;
use App\Http\Controllers\v1\Admin\BannerController;
use App\Http\Controllers\v1\Admin\ReviewController;
use App\Http\Controllers\v1\Admin\StatusController;
use App\Http\Controllers\v1\Admin\ContactController;
use App\Http\Controllers\v1\Admin\DesktopController;
use App\Http\Controllers\v1\Admin\ProductController;
use App\Http\Controllers\v1\Admin\ServiceController;
use App\Http\Controllers\v1\Admin\CategoryController;
use App\Http\Controllers\v1\Admin\CurrencyController;
use App\Http\Controllers\v1\Admin\AttributeController;
use App\Http\Controllers\v1\Admin\DesktopFPSController;
use App\Http\Controllers\v1\Admin\DesktopTypeController;
use App\Http\Controllers\v1\Admin\ProductTypeController;
use App\Http\Controllers\v1\Admin\NotificationController;
use App\Http\Controllers\v1\Admin\DeliveryMethodController;

Route::prefix('admin')->group(function(){
    Route::middleware(['auth:sanctum', 'checkRole'])->group(function(){
        Route::apiResources([
            'brands' => BrandController::class,
            'categories' => CategoryController::class,
            'banners' => BannerController::class,
            'attributes' => AttributeController::class,
            'languages' => LangController::class,
            'statuses' => StatusController::class,
            'currencies' => CurrencyController::class,
            'products' => ProductController::class,
            'product-types' => ProductTypeController::class,
            'desktop-types' => DesktopTypeController::class,
            'blogs' => BlogController::class,
            'services' => ServiceController::class,
            'delivery-methods' => DeliveryMethodController::class,
            'reviews' => ReviewController::class,
            'desktop-fps' => DesktopFPSController::class,
            'contacts' => ContactController::class,
            'desktops' => DesktopController::class,
            'orders' => OrderController::class,
            'games' => GameController::class
        ], ['as' => 'admin']);
        Route::get('/dashboard', [AuthController::class, 'getUser']);
        Route::put('/update/profile/{id}', [AuthController::class, 'updateProfile']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/notifications', [NotificationController::class, 'index']);
        Route::get('/notifications/show/{id}', [NotificationController::class, 'show'])->name('notify');
    });
    Route::post('/login', [AuthController::class, 'login']);
});
