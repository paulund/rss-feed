<?php

namespace Paulund\RssFeed\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RssStyledController extends Controller
{
    public function __invoke(Request $request)
    {
        $path = resource_path('views/vendor/rss-feed/rss-styling.xsl');
        $content = file_get_contents($path);

        return response($content, 200)
            ->header('Content-Type', 'application/xml');

    }
}
