<?php

namespace Teachme\Providers;

use Collective\Html\HtmlServiceProvider as CollectiveHtmlServiceProvider;
use Teachme\Components\HtmlBuilder;

class HtmlServiceProvider extends CollectiveHtmlServiceProvider
{
    protected function registerHtmlBuilder()
    {
        $this->app->singleton('html', function ($app) {
            return new HtmlBuilder($app['url']);
        });
    }
}
