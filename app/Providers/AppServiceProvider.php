<?php

namespace App\Providers;

use App\Repositories\Career\CareerRepository;
use App\Repositories\Career\EloquentCareer;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategory;
use App\Repositories\Page\EloquentPage;
use App\Repositories\Page\PageRepository;
use App\Repositories\Product\EloquentProduct;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Slideshow\EloquentSlideshow;
use App\Repositories\Slideshow\SlideshowRepository;
use App\Repositories\Team\EloquentTeam;
use App\Repositories\Team\TeamRepository;
use App\Repositories\Unit\EloquentUnit;
use App\Repositories\Unit\UnitRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SlideshowRepository::class, EloquentSlideshow::class);
        $this->app->singleton(ProductRepository::class, EloquentProduct::class);
        $this->app->singleton(CategoryRepository::class, EloquentCategory::class);
        $this->app->singleton(TeamRepository::class, EloquentTeam::class);
        $this->app->singleton(CareerRepository::class, EloquentCareer::class);
        $this->app->singleton(PageRepository::class, EloquentPage::class);
        $this->app->singleton(UnitRepository::class, EloquentUnit::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
