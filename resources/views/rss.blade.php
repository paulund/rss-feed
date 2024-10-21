<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <atom:link href="{{ $meta->link }}" rel="self" type="application/rss+xml" />
        <title><![CDATA[ {{ $meta->title }} ]]></title>
        <link><![CDATA[ {{ $meta->link }} ]]></link>
        @if(!empty($meta->image))
            <image>
                <url>{{ $meta->image['url'] }}</url>
                <title><![CDATA[ {{ $meta->title }} ]]></title>
                <link><![CDATA[ {{ $meta->link }} ]]></link>
            </image>
        @endif
        <description><![CDATA[ {{ $meta->description }} ]]></description>
        <language><![CDATA[{{ $meta->language }} ]]></language>
        <pubDate><![CDATA[{{ $meta->pubDate }} ]]></pubDate>

        @foreach($items as $item)
            <item>
                <title>{{ $item['title'] }}</title>
                <link>{{ $item['link'] }}</link>
                <description>{{ $item['description'] }}</description>
                <pubDate>{{ $item['pubDate'] }}</pubDate>
                <category>{{ $item['category'] }}</category>
                <guid>{{ $item['link'] }}</guid>
            </item>
        @endforeach
    </channel>
</rss>
