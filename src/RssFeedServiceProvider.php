<?php

namespace Paulund\RssFeed;

use Illuminate\Support\ServiceProvider;

class RssFeedServiceProvider extends ServiceProvider
{
    #[\Override]
    public function register() {}

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rss-feed');
        $this->publishes([
            __DIR__.'/../resources/views/rss-styling.xsl' => resource_path('views/vendor/rss-feed/rss-styling.xsl'),
        ], 'rss-feed');
    }
}
