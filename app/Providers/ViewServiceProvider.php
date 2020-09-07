<?php

namespace App\Providers;

use App\Models\Batch;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Company;
use App\Models\History;
use App\Models\Product;
use App\Models\SecurityCode;

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
        View::composer(['admin.securitycode.create', 'admin.securitycode.index'], function($view) {
            $products = Product::pluck('name', 'id');
            $companies = Company::pluck('name', 'id');
            $batches = Batch::pluck('name', 'id');
            $view->with('products', $products);
            $view->with('companies', $companies);
            $view->with('batches', $batches);
        });
       // View::composer('admin.secu')
        View::composer('admin.index.index', function($view) {
            $view->with('product_count', Product::count());
            $view->with('batch_count', Batch::count());
            $view->with('security_count', SecurityCode::count());
            $view->with('query_count', History::count());
        });
    }
}
