<?php

namespace Paulund\RssFeed\Support;

use Illuminate\Support\Collection;

class Feed
{
    public function __construct(
        public FeedMeta $feedMeta,
        public Collection $items
    ) {}

    public function toResponse(): \Illuminate\Http\Response
    {
        $this->feedMeta->validate();

        $content = view('rss-feed::rss', [
            'meta' => $this->feedMeta,
            'items' => $this->items,
        ])->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml;charset=UTF-8');
    }
}
