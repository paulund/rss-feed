<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="3.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9">
    <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="bg-white">
            <head>
                <title>RSS Feed</title>
                <meta charset="utf-8"/>
                <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <script src="https://cdn.tailwindcss.com"></script>
                <link rel="preconnect" href="https://fonts.googleapis.com" />
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true" />
                <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900" rel="stylesheet" />
                <style>
                    body {
                        font-family: 'Inter', sans-serif;
                    }
                </style>
            </head>
            <body class="flex items-center justify-center min-h-screen">
                <main class="container-sm mx-auto">
                    <div class="py-7">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="mr-5 text-4xl" style="flex-shrink: 0; width: 1em; height: 1em;" viewBox="0 0 256 256"><defs><linearGradient x1="0.085" y1="0.085" x2="0.915" y2="0.915" id="RSSg"><stop offset="0.0" stop-color="#E3702D"></stop><stop offset="0.1071" stop-color="#EA7D31"></stop><stop offset="0.3503" stop-color="#F69537"></stop><stop offset="0.5" stop-color="#FB9E3A"></stop><stop offset="0.7016" stop-color="#EA7C31"></stop><stop offset="0.8866" stop-color="#DE642B"></stop><stop offset="1.0" stop-color="#D95B29"></stop></linearGradient></defs><rect width="256" height="256" rx="55" ry="55" x="0" y="0" fill="#CC5D15"></rect><rect width="246" height="246" rx="50" ry="50" x="5" y="5" fill="#F49C52"></rect><rect width="236" height="236" rx="47" ry="47" x="10" y="10" fill="url(#RSSg)"></rect><circle cx="68" cy="189" r="24" fill="#FFF"></circle><path d="M160 213h-34a82 82 0 0 0 -82 -82v-34a116 116 0 0 1 116 116z" fill="#FFF"></path><path d="M184 213A140 140 0 0 0 44 73 V 38a175 175 0 0 1 175 175z" fill="#FFF"></path></svg>
                            <h1 class="text-4xl mb-16">
                                RSS Feed
                            </h1>
                        </div>


                        <h2 class="text-2xl mb-4">Recent Blog Posts</h2>
                        <xsl:for-each select="/rss/channel/item">
                            <div class="pb-7">
                                <h3 class="text-xl">
                                    <xsl:value-of select="title"/>
                                </h3>
                                <div class="text-4 font-bold text-blue-600">
                                    <a>
                                        <xsl:attribute name="href">
                                            <xsl:value-of select="link"/>
                                        </xsl:attribute>
                                        <xsl:value-of select="link"/>
                                    </a>
                                </div>
                                <div class="text-2 text-offset">
                                    <p class="my-2">
                                        <xsl:value-of select="description"/>
                                    </p>
                                </div>
                                <div class="text-2 text-offset">
                                    Published on <xsl:value-of select="substring(pubDate, 0, 12)" />
                                </div>
                            </div>
                        </xsl:for-each>
                    </div>
                </main>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
