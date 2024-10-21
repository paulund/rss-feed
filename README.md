# RSS Feed Laravel Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/paulund/rss-feed.svg?style=flat-square)](https://packagist.org/packages/paulund/rss-feed)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/paulund/rss-feed/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/paulund/rss-feed/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/paulund/rss-feed/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/paulund/rss-feed/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/paulund/rss-feed.svg?style=flat-square)](https://packagist.org/packages/paulund/rss-feed)

---

A Laravel package that will allow you to generate an RSS feed from your website.

## Installation

Install the package via composer:

```bash
composer require paulund/rss-feed
```

## Usage

To use this package you need to create the controller that will generate the RSS feed.

This controller will then use the classes in this package to generate your RSS feed.

### Create Controller

```php
php artisan make:controller RssFeedController
```

### Add Route

Add a route to your `web.php` file that will point to the controller.

```php
Route::get('rss', 'RssFeedController@index');
```

### Create RSS Feed

In the controller you need to create a new instance of the `FeedMeta` class that will create your feed meta information.

```php
$feedMeta = new FeedMeta(
    title: 'RSS Feed Title',
    description: 'This RSS feed description',
    link: 'https://www.example.com/rss',
    pubDate: now()->format(\DateTime::RFC822),
    lastBuildDate: now()->toDateTimeString(),
    category: 'General',
    generator: 'Paulund RSS Feed Generator'
);
```

Then you can create a collection for the feed items you want to add to the feed.

```php
$feedItems = $blogPosts->map(function ($post): array {
    return [
        'title' => $post->title,
        'description' => $post->description,
        'link' => route('blog.show', $post->slug),
        'pubDate' => (new \DateTime($post->date))->format(\DateTime::RFC822),
        'category' => $post->category,
    ];
});
```

Then you can create a new instance of the `Feed` class and pass in the meta and the items.
Using the `toResponse` method you can return the RSS feed response.

```php
return (new Feed($feedMeta, $feedItems))->toResponse();
```

### Full Controller

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Paulund\RssFeed\Feed;
use Paulund\RssFeed\FeedMeta;

class RssFeedController extends Controller
{
    public function index()
    {
        $blogPosts = Post::all();

        $feedMeta = new FeedMeta(
            title: 'RSS Feed Title',
            description: 'This RSS feed description',
            link: 'https://www.example.com/rss',
            pubDate: now()->format(\DateTime::RFC822),
            lastBuildDate: now()->toDateTimeString(),
            category: 'General',
            generator: 'Paulund RSS Feed Generator'
        );

        $feedItems = $blogPosts->map(function ($post): array {
            return [
                'title' => $post->title,
                'description' => $post->description,
                'link' => route('blog.show', $post->slug),
                'pubDate' => (new \DateTime($post->date))->format(\DateTime::RFC822),
                'category' => $post->category,
            ];
        });

        return (new Feed($feedMeta, $feedItems))->toResponse();
    }
}
```

Now navigate to the `/rss` route on your website and you should see the RSS feed.

## Testing

```bash
composer test
```
