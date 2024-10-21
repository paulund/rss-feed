<?php

namespace Paulund\RssFeed\Support;

class FeedItem
{
    public function __construct(
        public string $title,
        public string $description,
        public string $link,
        public string $author = '',
        public string $category = '',
        public string $comments = '',
        public string $enclosure = '',
        public string $guid = '',
        public string $pubDate = '',
        public string $source = '',
    ) {}

    public function validate(): void
    {
        $requiredFields = ['title', 'pubDate', 'description', 'link'];

        foreach ($requiredFields as $requiredField) {
            if (is_null($this->$requiredField)) {
                throw new \OutOfBoundsException(sprintf('Field %s is required', $requiredField));
            }
        }
    }
}
