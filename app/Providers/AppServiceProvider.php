<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
//        $mainCategories = Cache::remember('main_categories', 60 * 60 * 24 * 7, function () {
//            return Category::query()->with('childrenCategory.childrenCategory')->where(['parent_id' => 0])->get();
//        });

        $mainCategories = Category::query()->with('childrenCategory.childrenCategory')->where(['parent_id' => 0])->get();
        view()->share([
            'mainCategories' => $mainCategories
        ]);
    }
}
