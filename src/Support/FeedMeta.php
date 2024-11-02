<?php

namespace Paulund\RssFeed\Support;

class FeedMeta
{
    public function __construct(
        public string $title,
        public string $description,
        public string $link,
        public string $language = 'en',
        public string $copyright = '',
        public string $managingEditor = '',
        public string $webMaster = '',
        public string $pubDate = '',
        public string $lastBuildDate = '',
        public string $category = '',
        public string $generator = 'Paulund RSS Feed Generator',
        public string $ttl = '',
        public array $image = [],
        public array $cloud = [],
        public array $textInput = [],
        public array $skipHours = [],
        public array $skipDays = [],
        public ?string $stylesheet = null
    ) {}

    public function validate(): void
    {
        $requiredFields = ['title', 'description', 'link'];

        foreach ($requiredFields as $requiredField) {
            if (empty($this->$requiredField)) {
                throw new \OutOfBoundsException(sprintf('Meta %s is required', $requiredField));
            }
        }
    }
}
