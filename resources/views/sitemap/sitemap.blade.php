<?xml version="1.0" encoding="utf-8"?>
<!--Created using XmlSitemapGenerator.org - Free HTML, RSS and XML sitemap generator-->
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

  <url>
    <loc>http://www.bido.com.ng/</loc>
    <lastmod>2018-10-08</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.0</priority>
  </url>
  <url>
    <loc>http://www.bido.com.ng/about</loc>
    <lastmod>2018-10-08</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.4</priority>
  </url>
    <url>
    <loc>http://www.bido.com.ng/contact</loc>
    <lastmod>2018-10-08</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.4</priority>
  </url>
  @foreach ($posts as $post)
  <url>
    <loc>http://www.bido.com.ng/post-full-view/{{$post->id}}/{{str_slug(strtolower($post->title), '-')}}</loc>
    <lastmod>{{$post->updated_at}}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.1</priority>
  </url>
  @endforeach
  @foreach ($pages as $page)
  <url>
    <loc>http://www.bido.com.ng/page/{{$page->name}}</loc>
    <lastmod>{{$page->updated_at}}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.2</priority>
  </url>
  @endforeach
</urlset>
google-site-verification: google53e62e4481fc45aa.html

<!--<guid value="9cb8a6ae-2045-4c2c-9239-ceb0544201d9" />-->
<!--Created using XmlSitemapGenerator.org - Free HTML, RSS and XML sitemap generator-->