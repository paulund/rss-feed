<?php

namespace Paulund\RssFeed;

use Illuminate\Support\ServiceProvider;

class RssFeedServiceProvider extends ServiceProvider
{
    #[\Override]
    public function register() {}

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rss-feed');
    }
}
