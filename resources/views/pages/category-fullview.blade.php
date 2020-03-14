@inject('Helper', 'App\HelperClass')
@extends('layouts.app')
@section('content')
<div id="wi-main" class="wi-main fox-main">
<div id="titlebar" class="headline wi-titlebar post-header align-center">
<div class="container">
<div class="title-area">
<h1 class="page-title archive-title" itemprop="headline">
<span>
@if(!empty($latest->category))
{{$latest->category}}
@endif
</span>
</h1>
</div>
</div>
</div>
<div class="toparea">
<div class="container">
<div class="blog-container blog-container-group blog-container-group-2">
<div class="wi-blog fox-blog blog-group blog-group-2 post-group-row newsblock-2 post-group-row-1a-3-1b big-order-1 small-order-2 tall-order-3">
<div class="post-group-col post-group-col-big article-col-big">
    @if(!empty($latest->post))
<article class="wi-post post-item post-grid fox-grid-item article-big post-align-center post-1406 post type-post status-publish format-standard has-post-thumbnail hentry category-interview tag-books tag-elementor tag-facebook tag-fashion tag-science tag-wp disable-dropcap disable-2-columns" itemscope itemtype="https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
@if(!empty($latest->postimage->name))
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-none 
thumbnail-acute" itemscope itemtype="https://schema.org/ImageObject">
<span class="image-element">
<a href="{{ url($latest->id.'/'.str_slug(strtolower($latest->title), '-')) }}" class="post-link">
<img width="720" height="480" src='{{asset("images/post/".$latest->postimage->name)}}' class="attachment-thumbnail-large size-thumbnail-large" alt="" data-lazy="false" />
<span class="height-element" style="padding-bottom:66.666666666667%;"></span></a></span>
</figure>
@endif
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short">
    <time class="published" itemprop="datePublished" datetime="2016-04-11T00:00:00+00:00">{{date('d F \'y ', strtotime($latest->created_at))}}</time>
    <time class="updated" itemprop="dateModified" datetime="2019-10-03T03:15:40+00:00">{{date('d F \'y ', strtotime($latest->created_at))}}</time></div>
<div class="entry-categories meta-categories">
<a href="{{ url($latest->id.'/'.str_slug(strtolower($latest->title), '-')) }}" rel="tag">{{$latest->category}}</a>
</div>
</div>
<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-medium" itemprop="headline">
<a href="{{ url($latest->id.'/'.str_slug(strtolower($latest->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($latest->title)), 18)}}
</a>
</h2></div><div class="post-item-excerpt entry-excerpt excerpt-size-normal grid-content" itemprop="text">
{{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($latest->post, 35))))}}.
<a href="{{ url($latest->id.'/'.str_slug(strtolower($latest->title), '-')) }}" class="readmore fox-btn btn-tiny btn-fill">Keep Reading</a>
</div>
</div>
</div>
</article>
@endif
</div>
<div class="post-group-col post-group-col-tall article-col-tall">
@if(!empty($by_cat))
@foreach($by_cat as $lt)
<article class="wi-post post-item post-grid fox-grid-item article-tall article-medium post-1414 post type-post
 status-publish format-standard has-post-thumbnail hentry category-business category-interview tag-elementor 
 tag-fashion tag-travel disable-dropcap disable-2-columns" itemscope itemtype="../../../../external.html?link=https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
	@if(!empty($lt->postimage->name))
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail hover-none thumbnail-acute" 
itemscope itemtype="../../../../external.html?link=https://schema.org/ImageObject"><span class="image-element">
<a href="{{ url($lt->id.'/'.str_slug(strtolower($lt->title), '-')) }}" class="post-link">
<img width="300" height="200" src='{{asset("images/post/".$lt->postimage->name)}}' class="attachment-medium size-medium" alt="" data-lazy="false" srcset="" sizes="(max-width: 300px) 100vw, 300px" /></a></span>
</figure>
@endif
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short"><time class="published" itemprop="datePublished" datetime="2017-04-05T00:00:00+00:00">{{$lt->created_at->diffForhumans()}}</time><time class="updated" itemprop="dateModified" datetime="2019-10-03T02:46:58+00:00">{{$lt->updated_at->diffForhumans()}}</time></div>
</div>
<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-normal" itemprop="headline">
<a href="{{ url($lt->id.'/'.str_slug(strtolower($lt->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($lt->title)), 18)}}
</a>
</h2></div><div class="post-item-excerpt entry-excerpt excerpt-size-normal grid-content" itemprop="text">
{{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($lt->post, 26))))}}.
<a href="{{ url($lt->id.'/'.str_slug(strtolower($lt->title), '-')) }}" class="readmore">Keep Reading</a>
</div>
</div>
</div>
</article> 
@endforeach
@endif


</div>

<!--<div class="post-group-col post-group-col-small article-col-small">
<article class="wi-post post-item post-grid fox-grid-item article-small article-small-grid post-1427 post type-post status-publish format-standard has-post-thumbnail hentry category-arts category-interview tag-elementor tag-politics tag-wordpress disable-dropcap disable-2-columns" itemscope itemtype="../../../../external.html?link=https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">

<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-none 
thumbnail-acute" itemscope itemtype="../../../../external.html?link=https://schema.org/ImageObject">
<span class="image-element"><a href="../../cause-being-evil-has-a-price/index.html" class="post-link">
<img width="480" height="384" src="" class="attachment-thumbnail-medium size-thumbnail-medium" alt="" data-lazy="false" />
<span class="height-element" style="padding-bottom:80%;"></span></a></span>
</figure>

<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short"><time class="published" itemprop="datePublished" datetime="2015-10-31T00:00:00+00:00">October 31, 2015</time><time class="updated" itemprop="dateModified" datetime="2019-10-03T04:17:20+00:00">October 3, 2019</time></div>
</div>
<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-small" itemprop="headline">
<a href="../../cause-being-evil-has-a-price/index.html" rel="bookmark">
&#8216;Cause being evil has a price
</a>
</h2></div>
</div>
</div>
</article>

</div> -->
</div>
</div>
</div>
</div>
<div class="wi-content">
<div class="container">
<div class="content-area primary" id="primary" role="main">
<div class="theiaStickySidebar">
<div class="blog-container blog-container-list">
<div class="wi-blog fox-blog blog-list v-spacing-normal">

<br><br>

@if(!empty($more))
@foreach($more as $m)
<article class="wi-post post-item post-list post-thumbnail-align-right post-valign-top list-mobile-layout-grid post-1401 post type-post status-publish format-gallery has-post-thumbnail hentry category-interview tag-instagram tag-newspaper tag-publishing tag-travel tag-wordpress post_format-post-format-gallery disable-dropcap disable-2-columns" itemscope itemtype="../../../../external.html?link=https://schema.org/CreativeWork">
<div class="post-list-sep"></div>
<div class="post-item-inner post-list-inner">
	@if(!empty($m->postimage->name))
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail list-thumbnail custom-thumbnail hover-logo hover-dark thumbnail-acute" style="width:260px" itemscope itemtype="../../../../external.html?link=https://schema.org/ImageObject"><span class="image-element"><a 
	href="{{ url($m->id.'/'.str_slug(strtolower($m->title), '-')) }}" class="post-link"><img width="720" height="480" src='{{asset("images/post/".$m->postimage->name)}}' class="attachment-thumbnail-large size-thumbnail-large" alt="" data-lazy="false" /><span class="height-element" style="padding-bottom:66.666666666667%;">
	
</span><span class="post-format-indicator gallery-format-indicator"><i class="fa fa-clone"></i></span><span class="image-overlay"></span><span class="image-logo" style="width:40%"><img width="600" height="125"
 src="" class="attachment-full size-full" alt="" srcset="" sizes="(max-width: 600px) 100vw, 600px" /></span></a></span>
</figure>
@endif
<div class="post-body post-item-body post-list-body">
<div class="post-content">
<div class="post-item-header list-header">
<h2 class="post-item-title wi-post-title fox-post-title post-header-section list-title size-small" itemprop="headline">
<a href="{{ url($m->id.'/'.str_slug(strtolower($m->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($m->title)), 18)}}
</a>
</h2></div><div class="post-item-excerpt entry-excerpt excerpt-size-small excerpt-custom-color list-content" itemprop="text" style="color:#111111">
{{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($m->post, 40))))}}.
</div>
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short"><time class="published" itemprop="datePublished" datetime="2015-07-18T00:00:00+00:00">{{$m->created_at->diffForHumans()}}</time><time class="updated" itemprop="dateModified" datetime="2019-10-03T04:24:52+00:00">{{$m->updated_at->diffForHumans()}}</time></div>
<div class="entry-categories meta-categories">
<a href="index.html" rel="tag">{{$m->category}}</a>
</div>
</div>
</div>
</div>
</div>
</article>
@endforeach
@endif
<br><br>
</div>
</div>
</div>
</div>


</div>
</div>
</div>

@endsection