<?php

namespace App\Providers;

use App\Services\Service;
use App\Services\BlogService;
use App\Services\LangService;
use App\Services\UserService;
use App\Services\BrandService;
use App\Services\OrderService;
use App\Services\BannerService;
use App\Services\ReviewService;
use App\Services\StatusService;
use App\Services\ContactService;
use App\Services\DesktopService;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\CurrencyService;
use App\Services\AttributeService;
use App\Services\DesktopFpsService;
use App\Repositories\BlogRepository;
use App\Repositories\LangRepository;
use App\Repositories\UserRepository;
use App\Services\DesktopTypeService;
use App\Services\ProductTypeService;
use App\Repositories\BrandRepository;
use App\Repositories\OrderReporitory;
use App\Repositories\OrderRepository;
use App\Services\NotificationService;
use App\Repositories\BannerRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\StatusRepository;
use App\Repositories\ContactRepository;
use App\Repositories\DesktopRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ServiceRepository;
use App\Services\DeliveryMethodService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\DesktopFpsRepository;
use App\Repositories\DesktopTypeRepository;
use App\Repositories\ProductTypeRepository;
use App\Interfaces\Services\ServiceInterface;
use App\Repositories\DeliveryMethodRepository;
use App\Interfaces\Services\BlogServiceInterface;
use App\Interfaces\Services\LangServiceInterface;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Services\BrandServiceInterface;
use App\Interfaces\Services\OrderServiceInterface;
use App\Interfaces\Services\BannerServiceInterface;
use App\Interfaces\Services\ReviewServiceInterface;
use App\Interfaces\Services\StatusServiceInterface;
use App\Interfaces\Services\ContactServiceInterface;
use App\Interfaces\Services\DesktopServiceInterface;
use App\Interfaces\Services\ProductServiceInterface;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Interfaces\Services\CurrencyServiceInterface;
use App\Interfaces\Services\AttributeServiceInterface;
use App\Interfaces\Services\DesktopFpsServiceInterface;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Interfaces\Repositories\LangRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Services\DesktopTypeServiceInterface;
use App\Interfaces\Services\ProductTypeServiceInterface;
use App\Interfaces\Repositories\BrandRepositoryInterface;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Services\NotificationServiceInterface;
use App\Interfaces\Repositories\BannerRepositoryInterface;
use App\Interfaces\Repositories\ReviewRepositoryInterface;
use App\Interfaces\Repositories\StatusRepositoryInterface;
use App\Interfaces\Repositories\ContactRepositoryInterface;
use App\Interfaces\Repositories\DesktopRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\ServiceRepositoryInterface;
use App\Interfaces\Services\DeliveryMethodServiceInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\CurrencyRepositoryInterface;
use App\Interfaces\Repositories\AttributeRepositoryInterface;
use App\Interfaces\Repositories\DesktopFpsRepositoryInterface;
use App\Interfaces\Repositories\DesktopTypeRepositoryInterface;
use App\Interfaces\Repositories\ProductTypeRepositoryInterface;
use App\Interfaces\Repositories\DeliveryMethodRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BannerServiceInterface::class, BannerService::class);
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
        $this->app->bind(BrandServiceInterface::class, BrandService::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(AttributeServiceInterface::class, AttributeService::class);
        $this->app->bind(AttributeRepositoryInterface::class, AttributeRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(LangServiceInterface::class, LangService::class);
        $this->app->bind(LangRepositoryInterface::class, LangRepository::class);
        $this->app->bind(StatusServiceInterface::class, StatusService::class);
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(CurrencyServiceInterface::class, CurrencyService::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductTypeServiceInterface::class, ProductTypeService::class);
        $this->app->bind(ProductTypeRepositoryInterface::class, ProductTypeRepository::class);
        $this->app->bind(DesktopTypeServiceInterface::class, DesktopTypeService::class);
        $this->app->bind(DesktopTypeRepositoryInterface::class, DesktopTypeRepository::class);
        $this->app->bind(BlogServiceInterface::class, BlogService::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(ServiceInterface::class, Service::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(DeliveryMethodServiceInterface::class, DeliveryMethodService::class);
        $this->app->bind(DeliveryMethodRepositoryInterface::class, DeliveryMethodRepository::class);
        $this->app->bind(ReviewServiceInterface::class, ReviewService::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(DesktopFpsServiceInterface::class, DesktopFpsService::class);
        $this->app->bind(DesktopFpsRepositoryInterface::class, DesktopFpsRepository::class);
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);
        $this->app->bind(DesktopServiceInterface::class, DesktopService::class);
        $this->app->bind(DesktopRepositoryInterface::class, DesktopRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
