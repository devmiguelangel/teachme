<?php

namespace Teachme\Providers;

use Illuminate\Support\ServiceProvider;
use Teachme\Http\ViewComposers\TicketListComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['tickets.list'],
            TicketListComposer::class
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
