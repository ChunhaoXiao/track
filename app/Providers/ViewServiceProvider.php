<?php

namespace App\Providers;

use App\Models\Batch;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Company;
use App\Models\Product;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.product.create','admin.product.index'], function($view) {
            $companies = Company::pluck('name', 'id');
            $view->with('companies', $companies);
        });
        View::composer('admin.securitycode.create', function($view) {
            $products = Product::pluck('name', 'id');
            $companies = Company::pluck('name', 'id');
            $batches = Batch::pluck('name', 'id');
            $view->with('products', $products);
            $view->with('companies', $companies);
            $view->with('batches', $batches);
        });
    }
}
