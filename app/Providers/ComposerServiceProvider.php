<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
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
        // Using class based composers...
        View::composer(
            ['admin.product.create','admin.product.edit','layouts.header','layouts.footer'], 'App\Http\ViewComposers\CategoriesComposer'
        );

        View::composer(
            ['admin.order.index'], 'App\Http\ViewComposers\ShippersComposer'
        );
    }
}
