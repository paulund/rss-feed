<?php

namespace Paulund\RssFeed\Actions;

use Illuminate\Support\Collection;
use Paulund\RssFeed\Support\FeedItem;

class ArrayToFeedItems
{
    public function handle(array $data): Collection
    {
        return collect($data)
            ->map(fn ($item): FeedItem => new FeedItem(
                title: $item['title'],
                description: $item['description'],
                link: $item['link'],
                author: $item['author'] ?? '',
                category: $item['category'] ?? '',
                comments: $item['comments'] ?? '',
                enclosure: $item['enclosure'] ?? '',
                guid: $item['guid'] ?? '',
                pubDate: $item['pubDate'],
                source: $item['source'] ?? '',
            ));
    }
}
