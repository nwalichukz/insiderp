@inject('Helper', 'App\HelperClass')
@extends('layouts.app')
@section('content')
<div id="wi-main" class="wi-main fox-main">
<article id="wi-content" class="wi-content post-775 page type-page status-publish hentry single-style-1 thumbnail-stretch-none main-content-full disable-dropcap disable-2-columns" itemscope itemtype="https://schema.org/CreativeWork">
<div class="container">
<div id="primary" class="primary content-area">
<div class="theiaStickySidebar">
<div class="single-body">
<div class="single-section single-main-content">
<div class="container entry-container">
<div class="dropcap-content columnable-content entry-content">
<div data-elementor-type="wp-post" data-elementor-id="775" class="elementor elementor-775" data-elementor-settings="[]">
<div class="elementor-inner">
<div class="elementor-section-wrap">

<section class="elementor-element elementor-element-34c92e74 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="34c92e74" data-element_type="section">
	<div class="elementor-container elementor-column-gap-wide">
	<div class="elementor-row">
	<div class="elementor-element elementor-element-11706b27 elementor-column elementor-col-66 elementor-top-column" data-id="11706b27" data-element_type="column">
	<div class="elementor-column-wrap  elementor-element-populated">
	<div class="elementor-widget-wrap">
	<div class="elementor-element elementor-element-7ee4887 elementor-widget elementor-widget-heading" data-id="7ee4887" data-element_type="widget" data-widget_type="heading.default">
	<div class="elementor-widget-container">
	<div class="fox-heading has-link link-position-right align-left">
	<div class="heading-section heading-title">
	<h2 class="heading-title-main size-supertiny">Latest News</h2> <a href="#" target="_self"> </a>
	</div>
	</div>
	</div>
	</div>
	<div class="elementor-element elementor-element-3925b12 elementor-widget elementor-widget-post-group-1" data-id="3925b12" data-element_type="widget" data-widget_type="post-group-1.default">
	<div class="elementor-widget-container">
	<div class="blog-container blog-container-group blog-container-group-1">
	<div class="wi-blog fox-blog blog-group blog-group-1 post-group-row wi-newsblock newsblock-1 big-post-right big-post-ratio-2-3 has-border v-spacing-normal">
	
	<div class="post-group-col post-group-col-big article-big-wrapper">
		@if(!empty($lead))
	<article class="wi-post post-item post-grid fox-grid-item article-big post-align-center post-1395 post type-post status-publish format-standard has-post-thumbnail hentry category-arts category-books tag-article tag-publishing tag-times tag-travel tag-wp disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
	<div class="post-item-inner grid-inner">
	<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail 
	hover-none thumbnail-acute" itemscope itemtype="../../external.html?link=https://schema.org/ImageObject">
	<span class="image-element">
		<a href="{{ url($lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" class="post-link">
		@if(!empty($lead->postimage->name))
		<img width="720" title="{{$lead->postimage->description}}" height="480" src='{{asset("/images/post/".$lead->postimage->name)}}' class="attachment-thumbnail-large size-thumbnail-large" alt="" data-lazy="false" sizes="(max-width: 720px) 100vw, 720px" />
		@endif
		<span class="height-element" style="padding-bottom:66.666666666667%;"></span></a></span></figure>
	
		<div class="grid-body post-item-body">
	<div class="post-item-header grid-header">
	<div class="post-item-meta wi-meta fox-meta post-header-section ">
	<div class="entry-date meta-time machine-time time-short">
	<time class="published" itemprop="datePublished" datetime="2018-02-01T00:00:00+00:00">{{$lead->created_at->diffForHumans()}}</time>
	<time class="updated" itemprop="dateModified" datetime="2019-10-03T02:46:58+00:00">{{$lead->updated_at->diffForHumans()}}</time></div>
	 <div class="fox-meta-author entry-author meta-author" itemprop="author" itemscope 
	 itemtype="../../external.html?link=https://schema.org/Person">
	 <a class="meta-author-avatar" itemprop="url" rel="author" href="{{ url($lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}">
	 <img alt='author' src='{{asset("images/avatar/avatar.png")}}' 
	 class='avatar avatar-80 photo' height='80' width='80' /></a><span class="byline"> By <span class="author vcard">
		 <a class="url fn" itemprop="url" rel="author" href="{{ url($lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}">
	<span itemprop="name">
	@if(empty($lead->guest_name))
	{{ucfirst(strtolower($Helper->user($lead->user_id)->user_name))}}
	@else
     {{$lead->guest_name}}
	@endif
	</span></a></span></span></div>
	</div>
	<h1 style="font-weight:bold;" class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-medium weight-300" itemprop="headline">
	<a href="{{ url($lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" rel="bookmark">
	{{$Helper->get_title(title_case(strtolower($lead->title)), 30)}}
	</a>
	</h1></div><div class="post-item-excerpt entry-excerpt excerpt-size-normal grid-content" itemprop="text">
	{{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($lead->post, 40))))}}.
	<a href="{{ url($lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" class="readmore fox-btn btn-tiny btn-primary">Read More</a>
	</div>
	</div>
	</div>
	</article>	
	@endif
	</div>


	<div class="post-group-col post-group-col-small article-small-wrapper">
		<!--the latest news -->
		@if(!empty($posts))
		@foreach($posts as $tr)
	<article class="wi-post post-item post-list article-small-list post-thumbnail-align-left post-valign-top 
	list-mobile-layout-list post-1400 post type-post status-publish format-standard has-post-thumbnail hentry
	 category-books category-opinion tag-facebook tag-magazine tag-politics tag-travel tag-wordpress disable-dropcap
	  disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
	<div class="post-list-sep"></div>
	<div class="post-item-inner post-list-inner">
	<div class="post-body post-item-body post-list-body">
	<div class="post-content">
	<div class="post-item-header list-header">
	<h2 class="post-item-title wi-post-title fox-post-title post-header-section list-title size-small" itemprop="headline">
	<a href="{{ url($tr->id.'/'.str_slug(strtolower($tr->title), '-')) }}" rel="bookmark">
	{{$Helper->get_title(title_case(strtolower($tr->title)), 30)}}
	</a>
	</h2>
	<div class="post-item-meta wi-meta fox-meta post-header-section ">
	<div class="entry-date meta-time machine-time time-short">
		<time class="published" itemprop="datePublished" datetime="2017-12-24T00:00:00+00:00">{{$tr->created_at->diffForHumans()}}</time>
		<time class="updated" itemprop="dateModified" datetime="2019-10-03T04:04:51+00:00">{{$tr->updated_at->diffForHumans()}}</time></div> 
	</div>
	</div><div class="post-item-excerpt entry-excerpt excerpt-size-normal list-content" itemprop="text">
	
	</div>
	</div>
	</div>
	</div>
	</article>
	@endforeach
    @endif
	</div>
	<div class="sep-border"></div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="elementor-element elementor-element-3843cefa elementor-column elementor-col-33 elementor-top-column" data-id="3843cefa" data-element_type="column">
	<div class="elementor-column-wrap  elementor-element-populated">
	<div class="elementor-widget-wrap">
	<div class="elementor-element elementor-element-4b350cb elementor-widget elementor-widget-heading" data-id="4b350cb" data-element_type="widget" data-widget_type="heading.default">
	<div class="elementor-widget-container">
	<div class="fox-heading align-left">
	<div class="heading-section heading-title">
	<h2 class="heading-title-main size-supertiny">Featured</h2>
	</div>
	</div>
	</div>
	</div>
	<div class="elementor-element elementor-element-8e17d25 elementor-widget elementor-widget-post-list" data-id="8e17d25" data-element_type="widget" data-widget_type="post-list.default">
	<div class="elementor-widget-container">
	<div class="blog-container blog-container-list">
	<div class="wi-blog fox-blog blog-list v-spacing-small">
	@if(!empty($featured))
	@foreach($featured as $fe)
	<article class="wi-post post-item post-list post-thumbnail-align-left post-valign-top list-mobile-layout-list post-1407 post type-post status-publish format-standard has-post-thumbnail hentry category-business tag-article tag-instagram tag-science disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
	<div class="post-list-sep"></div>
	<div class="post-item-inner post-list-inner">
		@if(!empty($fe->postimage->name))
	<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail list-thumbnail custom-thumbnail hover-none thumbnail-acute" style="width:90px" itemscope itemtype="../../external.html?link=https://schema.org/ImageObject">
	<span class="image-element">
	<a href="{{ url($fe->id.'/'.str_slug(strtolower($fe->title), '-')) }}" class="post-link">
	<img width="480" height="480" src='{{asset("images/post/".$fe->postimage->name)}}' class="attachment-thumbnail-square size-thumbnail-square" 
	alt="" data-lazy="false" srcset="" sizes="(max-width: 480px) 100vw, 480px" />
	<span class="height-element" style="padding-bottom:100%;"></span></a></span>
</figure>
@endif
	<div class="post-body post-item-body post-list-body">
	<div class="post-content">
	<div class="post-item-header list-header">
	<h2 class="post-item-title wi-post-title fox-post-title post-header-section list-title size-tiny" itemprop="headline">
	<a href="{{ url($fe->id.'/'.str_slug(strtolower($fe->title), '-')) }}" rel="bookmark">
	{{$Helper->get_title(title_case(strtolower($fe->title)), 30)}}
	</a>
	</h2>
</div>
<div class="post-item-excerpt entry-excerpt excerpt-size-small list-content" itemprop="text">
	
	
	</div>
	</div>
	</div>
	</div>
	</article>
	@endforeach
     @endif


	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</section>
	
	<section class="elementor-element elementor-element-ad3f50f elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="ad3f50f" data-element_type="section">
	<div class="elementor-container elementor-column-gap-default">
	<div class="elementor-row">
	<div class="elementor-element elementor-element-7c658d1 elementor-column elementor-col-100 elementor-top-column" data-id="7c658d1" data-element_type="column">
	<div class="elementor-column-wrap  elementor-element-populated">
	<div class="elementor-widget-wrap">
	<div class="elementor-element elementor-element-3f0de7d elementor-widget-divider--view-line elementor-widget-divider--separator-type-pattern elementor-widget elementor-widget-divider" data-id="3f0de7d" data-element_type="widget" data-widget_type="divider.default">
	<div class="elementor-widget-container">
	<div class="elementor-divider" style="--divider-pattern-url: url(_data_image/svg%2bxml%2c_svg%20xmlns%3d%27http_/www.w3.org/2000/svg%27%20preserveAspectRatio%3d%27none%27%20overflow%3d%27visible%27%20height%3d%27100%25%27%20viewBox%3d%270%200%2020%2016%27%20stroke%3d%27%23999999%27%20stroke-width%3d%27)&#039;%3E%3Cpath d=&#039;M28,0L10,18&#039;/%3E%3Cpath d=&#039;M18,0L0,18&#039;/%3E%3Cpath d=&#039;M48,0L30,18&#039;/%3E%3Cpath d=&#039;M38,0L20,18&#039;/%3E%3C/g%3E%3C/svg%3E&quot;);">
	<span class="elementor-divider-separator">
	</span>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</section>
<section class="elementor-element elementor-element-fafc48e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="fafc48e" data-element_type="section">
<div class="elementor-container elementor-column-gap-wider">
<div class="elementor-row">
<div class="elementor-element elementor-element-99e511e elementor-column elementor-col-66 elementor-top-column" data-id="99e511e" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-67f8e33 elementor-widget elementor-widget-heading" data-id="67f8e33" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<div class="fox-heading has-link link-position-right align-left">
<div class="heading-section heading-title">
<h2 class="heading-title-main size-supertiny">Business</h2> <a href="{{url('/category/Business')}}" target="_self">Sell All &raquo;</a>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-018cc3d elementor-widget elementor-widget-post-group-1" data-id="018cc3d" data-element_type="widget" data-widget_type="post-group-1.default">
<div class="elementor-widget-container">
<div class="blog-container blog-container-group blog-container-group-1">
<div class="wi-blog fox-blog blog-group blog-group-1 post-group-row wi-newsblock newsblock-1 big-post-left big-post-ratio-2-3 has-border v-spacing-small">
<div class="post-group-col post-group-col-big article-big-wrapper">
@if(!empty($busfront))
<article class="wi-post post-item post-grid fox-grid-item article-big post-align-left post-1409 post type-post status-publish format-standard has-post-thumbnail hentry category-business tag-books tag-instagram tag-travel disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
	@if(!empty($busfront->postimage->name))
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-none 
thumbnail-acute" itemscope itemtype=""><span class="image-element">
	<a href="{{ url($busfront->id.'/'.str_slug(strtolower($busfront->title), '-')) }}" class="post-link">
	<img width="720" height="480" src='{{asset("/images/post/".$busfront->postimage->name)}}' class="attachment-thumbnail-large size-thumbnail-large" alt="" data-lazy="false" />
	<span class="height-element" style="padding-bottom:66.666666666667%;"></span></a></span></figure>
	@endif
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short">
	<time class="published" itemprop="datePublished" datetime="2018-05-16T00:00:00+00:00">{{date('d F \'y ', strtotime($busfront->created_at))}}</time>
	<time class="updated" itemprop="dateModified" datetime="2019-10-03T02:46:07+00:00">{{date('d F \'y ', strtotime($busfront->updated_at))}}</time></div> <div class="fox-meta-author entry-author meta-author" itemprop="author" itemscope itemtype="../../external.html?link=https://schema.org/Person"><a class="meta-author-avatar" itemprop="url" rel="author" href="author/author2/index.html"><img alt='' src='' srcset='https://fox.withemes.com/times/wp-content/uploads/sites/23/2019/09/26010501877_94247f6c26_z-150x150.jpg 2x' class='avatar avatar-80 photo' height='80' width='80' /></a><span class="byline"> by <span class="author vcard"><a class="url fn" itemprop="url" rel="author" href="author/author2/index.html"><span itemprop="name">Southeast Post</span></a></span></span></div>
</div>
<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-normal weight-700" itemprop="headline">
<a href="{{ url($busfront->id.'/'.str_slug(strtolower($busfront->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($busfront->title)), 30)}}
</a>
</h2></div><div class="post-item-excerpt entry-excerpt excerpt-size-normal grid-content" itemprop="text">
 {{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($busfront->post, 30))))}}
<a href="{{ url($busfront->id.'/'.str_slug(strtolower($busfront->title), '-')) }}" class="readmore fox-btn btn-tiny btn-primary">Read More</a>
</div>
</div>
</div>
</article>
@endif
</div>
<div class="post-group-col post-group-col-small article-small-wrapper">
@if(!empty($businesspost))
@foreach($businesspost as $bpost)
<article class="wi-post post-item post-list article-small-list post-thumbnail-align-right post-valign-top list-mobile-layout-list post-1407 post type-post status-publish format-standard has-post-thumbnail hentry category-business tag-article tag-instagram tag-science disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
<div class="post-list-sep"></div>
<div class="post-item-inner post-list-inner">
<div class="post-body post-item-body post-list-body">
<div class="post-content">
<div class="post-item-header list-header">
<h2 class="post-item-title wi-post-title fox-post-title post-header-section list-title size-tiny" itemprop="headline">
<a href="{{ url($bpost->id.'/'.str_slug(strtolower($bpost->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($bpost->title)), 30)}}
</a>
</h2></div><div class="post-item-excerpt entry-excerpt excerpt-size-normal list-content" itemprop="text">

</div>
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short">
	<time class="published" itemprop="datePublished" datetime="2018-04-23T00:00:00+00:00">{{$bpost->created_at->diffForHumans()}} </time>
	<time class="updated" itemprop="dateModified" datetime="2019-10-03T02:46:58+00:00">{{$bpost->updated_at->diffForHumans()}}</time></div>

</div>
<hr>
</div>
</div>
</div>
</article>
@endforeach
@endif
</div>
<div class="sep-border"></div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-9500520 elementor-widget elementor-widget-heading" data-id="9500520" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<div class="fox-heading has-link link-position-right align-left">
<div class="heading-section heading-title">
<h2 class="heading-title-main size-supertiny">Around the world</h2> <a href="{{url('/category/Foreign')}}" target="_self">Sell All &raquo;</a>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-e588217 elementor-widget elementor-widget-post-group-1" data-id="e588217" data-element_type="widget" data-widget_type="post-group-1.default">
<div class="elementor-widget-container">
<div class="blog-container blog-container-group blog-container-group-1">
<div class="wi-blog fox-blog blog-group blog-group-1 post-group-row wi-newsblock newsblock-1 big-post-right big-post-ratio-2-3 has-border v-spacing-small">
@if(!empty($foreign))
<div class="post-group-col post-group-col-big article-big-wrapper">
<article class="wi-post post-item post-grid fox-grid-item article-big post-align-center post-1426 post type-post status-publish format-standard has-post-thumbnail hentry category-travel tag-fashion tag-newspaper tag-publishing disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
	@if(!empty($foreign->postimage->name))
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-none 
thumbnail-acute" itemscope itemtype=""><span class="image-element">
	<a href="{{ url($foreign->id.'/'.str_slug(strtolower($foreign->title), '-')) }}" class="post-link">
	<img width="720" height="480" src='{{ asset("/images/post/".$foreign->postimage->name)}}' class="attachment-thumbnail-large size-thumbnail-large" 
	alt="" data-lazy="false" srcset=" " sizes="(max-width: 720px) 100vw, 720px" />
	<span class="height-element" style="padding-bottom:66.666666666667%;"></span></a></span>
</figure>
@endif
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short">
	<time class="published" itemprop="datePublished" datetime="2017-02-11T00:00:00+00:00">{{date('d F \'y ', strtotime($foreign->updated_at))}}</time>
	<time class="updated" itemprop="dateModified" datetime="2019-10-03T02:46:58+00:00">{{date('d F \'y ', strtotime($foreign->updated_at))}}</time></div>
	 <div class="fox-meta-author entry-author meta-author" itemprop="author" itemscope itemtype="">
		 <a class="meta-author-avatar" itemprop="url" rel="author" href="">
		 <img alt='' src='' 
		 srcset='' class='avatar avatar-80 photo' height='80' width='80' /></a>
		 <span class="byline"> by <span class="author vcard">
	<a class="url fn" itemprop="url" rel="author" href="{{ url($foreign->id.'/'.str_slug(strtolower($foreign->title), '-')) }}">
			 <span itemprop="name">SEPOST</span></a></span></span></div>
</div>
<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-medium" itemprop="headline">
<a href="{{ url($foreign->id.'/'.str_slug(strtolower($foreign->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($foreign->title)), 30)}}
</a>
</h2></div><div class="post-item-excerpt entry-excerpt excerpt-size-normal grid-content" itemprop="text">
{{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($foreign->post, 40))))}}
<a href="{{ url($foreign->id.'/'.str_slug(strtolower($foreign->title), '-')) }}" class="readmore fox-btn btn-tiny btn-primary">Read More</a>
</div>
</div>
</div>
</article>
</div>
@endif
<div class="post-group-col post-group-col-small article-small-wrapper">
	@if(!empty($foreignpost))
	@foreach($foreignpost as $fpost)
<article class="wi-post post-item post-list article-small-list post-thumbnail-align-left post-valign-top 
list-mobile-layout-list post-1399 post type-post status-publish format-standard has-post-thumbnail hentry category-travel tag-blog tag-books tag-facebook tag-magazine tag-technology tag-wordpress disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
<div class="post-list-sep"></div>
<div class="post-item-inner post-list-inner">
<div class="post-body post-item-body post-list-body">
<div class="post-content">
<div class="post-item-header list-header">
<h2 class="post-item-title wi-post-title fox-post-title post-header-section list-title size-tiny" itemprop="headline">
<a href="{{ url($fpost->id.'/'.str_slug(strtolower($fpost->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($fpost->title)), 30)}}
</a>
</h2></div>
<div class="post-item-excerpt entry-excerpt excerpt-size-normal list-content" itemprop="text">


	
</div>
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short">
	<time class="published" itemprop="datePublished" datetime="2017-01-30T00:00:00+00:00">{{$fpost->created_at->diffForHumans()}}</time>
	<time class="updated" itemprop="dateModified" datetime="2019-10-03T04:12:32+00:00">{{$fpost->created_at->diffForHumans()}}</time></div>
</div>
</div>
</div>
</div>
</article>
@endforeach
@endif

</div>
<div class="sep-border"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-135674f elementor-column elementor-col-33 elementor-top-column" data-id="135674f" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-19b9d5f elementor-widget elementor-widget-heading" data-id="19b9d5f" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<div class="fox-heading align-left">
<div class="heading-section heading-title">
<h2 class="heading-title-main size-supertiny">Popular</h2>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-59fcef4 elementor-widget elementor-widget-post-grid" data-id="59fcef4" data-element_type="widget" data-widget_type="post-grid.default">
<div class="elementor-widget-container">
<div class="blog-container blog-container-grid">
<div class="wi-blog fox-blog blog-grid fox-grid column-1 spacing-normal">
	<!--Popular posts -->
@if(!empty($popularpost))
@foreach($popularpost as $popular)
<article class="wi-post post-item post-grid fox-grid-item post-1407 post type-post status-publish format-standard has-post-thumbnail hentry category-business tag-article tag-instagram tag-science disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
@if(!empty($popular->postimage->name))
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-none thumbnail-acute" itemscope itemtype="../../external.html?link=https://schema.org/ImageObject">
<span class="image-element">
<a href="{{ url($popular->id.'/'.str_slug(strtolower($popular->title), '-')) }}" class="post-link">

<img width="480" height="384" src='{{ asset("/images/post/".$popular->postimage->name)}}' 
class="attachment-thumbnail-medium size-thumbnail-medium" alt="" data-lazy="false" />

<span class="height-element" style="padding-bottom:80%;"></span>
<span class="thumbnail-index"> </span></a></span></figure>
@endif
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-small" itemprop="headline">

<a href="{{ url($popular->id.'/'.str_slug(strtolower($popular->title), '-')) }}" rel="bookmark">

{{$Helper->get_title(title_case(strtolower($popular->title)), 30)}}
</a>
</h2></div>

</div>
</div>
</article>
@endforeach
@endif
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-element elementor-element-b0bd9df elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="b0bd9df" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-element elementor-element-c4c779d elementor-column elementor-col-100 elementor-top-column" data-id="c4c779d" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-4ee6dc6 elementor-widget elementor-widget-heading" data-id="4ee6dc6" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<div class="fox-heading align-center">
<div class="heading-section heading-title">
<h2 style="color:#ffffff" class="heading-title-main custom-color size-normal">THE SOUTHEAST POST</h2>
</div>
<div class="heading-section heading-subtitle">
<h3 style="color:#ffffff" class="heading-subtitle-main custom-color">The resolve to defend the truth.</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-element elementor-element-42458006 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="42458006" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-element elementor-element-61832559 elementor-column elementor-col-100 elementor-top-column" data-id="61832559" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-4fee6f37 elementor-widget elementor-widget-heading" data-id="4fee6f37" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<div class="fox-heading align-left">
<div class="heading-section heading-title">
<h2 class="heading-title-main size-supertiny">Sports & Entertainment</h2>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-element elementor-element-b369d4b elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="b369d4b" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-element elementor-element-4573e57f elementor-column elementor-col-100 elementor-top-column" data-id="4573e57f" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-4e410f16 elementor-widget elementor-widget-post-grid" data-id="4e410f16" data-element_type="widget" data-widget_type="post-grid.default">
<div class="elementor-widget-container">
<div class="blog-container blog-container-grid">
<div class="wi-blog fox-blog blog-grid fox-grid column-5 spacing-small">
@if(!empty($sport))
@foreach($sport as $sp)
<article class="wi-post post-item post-grid fox-grid-item post-1438 post type-post status-publish format-standard has-post-thumbnail hentry category-arts category-blog tag-blog tag-fashion tag-newspaper disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
	@if(!empty($sp->postimage->name))
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-none thumbnail-acute" itemscope itemtype="../../external.html?link=https://schema.org/ImageObject">
<span class="image-element">
	<a href="{{ url($sp->id.'/'.str_slug(strtolower($sp->title), '-')) }}" class="post-link">
	<img width="480" height="384" src='{{ asset("/images/post/".$sp->postimage->name)}}' class="attachment-thumbnail-medium size-thumbnail-medium" alt="" data-lazy="false" />
	<span class="height-element" style="padding-bottom:80%;"></span></a></span>
</figure>
@endif
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-tiny" itemprop="headline">
<a href="{{ url($sp->id.'/'.str_slug(strtolower($sp->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($sp->title)), 30)}}
</a>
</h2></div>
<div class="post-item-excerpt entry-excerpt excerpt-size-small grid-content" itemprop="text">

</div>
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short">
	<time class="published" itemprop="datePublished" datetime="2014-11-24T00:00:00+00:00">{{$sp->created_at->diffForHumans()}}</time>
	<time class="updated" itemprop="dateModified" datetime="2019-10-03T02:47:00+00:00">{{$sp->updated_at->diffForHumans()}}</time></div> 
	<a href="the-post/index.html#comments" class="comment-link">
	<span class="comment-num"></span> <span class="">
		<i class="t"></i></span></a>
</div>
</div>
</div>
</article>
@endforeach
@endif

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="elementor-element elementor-element-42458006 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="42458006" data-element_type="section">
	<div class="elementor-container elementor-column-gap-default">
	<div class="elementor-row">
	<div class="elementor-element elementor-element-61832559 elementor-column elementor-col-100 elementor-top-column" data-id="61832559" data-element_type="column">
	<div class="elementor-column-wrap  elementor-element-populated">
	<div class="elementor-widget-wrap">
	<div class="elementor-element elementor-element-4fee6f37 elementor-widget elementor-widget-heading" data-id="4fee6f37" data-element_type="widget" data-widget_type="heading.default">
	<div class="elementor-widget-container">
	<div class="fox-heading align-left">
	<div class="heading-section heading-title">
	<h2 class="heading-title-main size-supertiny">Lifestyle and Featured</h2>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</section>
	<section class="elementor-element elementor-element-b369d4b elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="b369d4b" data-element_type="section">
	<div class="elementor-container elementor-column-gap-default">
	<div class="elementor-row">
	<div class="elementor-element elementor-element-4573e57f elementor-column elementor-col-100 elementor-top-column" data-id="4573e57f" data-element_type="column">
	<div class="elementor-column-wrap  elementor-element-populated">
	<div class="elementor-widget-wrap">
	<div class="elementor-element elementor-element-4e410f16 elementor-widget elementor-widget-post-grid" data-id="4e410f16" data-element_type="widget" data-widget_type="post-grid.default">
	<div class="elementor-widget-container">
	<div class="blog-container blog-container-grid">
	<div class="wi-blog fox-blog blog-grid fox-grid column-5 spacing-small">

	<!--sports and entertainment -->
	@if(!empty($lifestyle))
	@foreach($lifestyle as $style)
	<article class="wi-post post-item post-grid fox-grid-item post-1438 post type-post status-publish format-standard has-post-thumbnail hentry category-arts category-blog tag-blog tag-fashion tag-newspaper disable-dropcap disable-2-columns" itemscope itemtype="../../external.html?link=https://schema.org/CreativeWork">
	<div class="post-item-inner grid-inner">
		@if(!empty($style->postimage->name))
	<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-none thumbnail-acute" itemscope itemtype="../../external.html?link=https://schema.org/ImageObject">
	<span class="image-element"><a href="{{ url($style->id.'/'.str_slug(strtolower($style->title), '-')) }}" class="post-link">
	<img width="480" height="384" src='{{ asset("/images/post/".$style->postimage->name)}}' class="attachment-thumbnail-medium size-thumbnail-medium" alt="" data-lazy="false" />
	<span class="height-element" style="padding-bottom:80%;"></span></a></span></figure>
	@endif
	<div class="grid-body post-item-body">
	<div class="post-item-header grid-header">
	<h2 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-tiny" itemprop="headline">
	<a href="{{ url($style->id.'/'.str_slug(strtolower($style->title), '-')) }}" rel="bookmark">
	{{$Helper->get_title(title_case(strtolower($style->title)), 30)}}
	</a>
	</h2></div><div class="post-item-excerpt entry-excerpt excerpt-size-small grid-content" itemprop="text">
	
	</div>
	<div class="post-item-meta wi-meta fox-meta post-header-section ">
	<div class="entry-date meta-time machine-time time-short">
		<time class="published" itemprop="datePublished" datetime="2014-11-24T00:00:00+00:00">{{$style->created_at->diffForHumans()}}</time>
		<time class="updated" itemprop="dateModified" datetime="2019-10-03T02:47:00+00:00">{{$style->updated_at->diffForHumans()}}</time></div>
		 <a href="#" class="comment-link">
		 <span class="comment-num"></span> <span class="comment-icon">
		 	<i class=""></i></span></a>
	</div>
	</div>
	</div>
	</article>
	@endforeach
 @endif
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</section>

<br><br>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</article>
</div>
@endsection
