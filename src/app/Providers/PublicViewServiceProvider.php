<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Language;
use App\Models\PaymentType;
use App\Models\SiteSeoSetting;
use Illuminate\Support\ServiceProvider;

class PublicViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $categories = Category::with('children')->withCount('children')->whereNull('category_id')->orderBy('order')->get();
        $seo_settings = SiteSeoSetting::first();
        $payment_types = PaymentType::all();
        $currencies = Currency::all();
        $languages = Language::all();
        view()->composer('*', function ($view) use ($languages, $currencies, $categories,$seo_settings,$payment_types){
            if(!request()->routeIs('admin.*')) {
                $view->with('categories',$categories);
                $view->with('currencies',$currencies);
                $view->with('languages',$languages);
            }else{
                $view->with('payment_types',$payment_types);
            }
            $view->with('seo_settings',$seo_settings);
        });
    }
}
