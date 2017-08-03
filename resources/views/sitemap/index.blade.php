<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($stores as $store)
        <sitemap>
            <loc>http://couponbooty.com/view/{{ $store->slug }}</loc>
            <lastmod>{{ $store->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endforeach
    @foreach($types as $type)
        <sitemap>
            <loc>http://couponbooty.com/types/{{ urlencode($type->label) }}</loc>
            <lastmod>{{ $type->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endforeach
    @foreach($blogs as $blog)
        <sitemap>
            <loc>http://couponbooty.com/blog/{{ urlencode($blog->title_slug) }}</loc>
            <lastmod>{{ $blog->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endforeach
    <sitemap>
        <loc>http://couponbooty.com/blog</loc>
        <lastmod>2017-07-10T07:09:37+00:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>http://couponbooty.com/expiring</loc>
        <lastmod>2017-07-10T07:09:37+00:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>http://couponbooty.com/about</loc>
        <lastmod>2017-07-10T07:09:37+00:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>http://couponbooty.com/terms</loc>
        <lastmod>2017-07-10T07:09:37+00:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>http://couponbooty.com/privacy</loc>
        <lastmod>2017-07-10T07:09:37+00:00</lastmod>
    </sitemap>
</sitemapindex>