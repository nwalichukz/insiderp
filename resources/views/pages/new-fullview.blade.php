@inject('Helper', 'App\HelperClass')
@extends('layouts.app')
@section('content')
<div id="wi-main" class="wi-main fox-main">
<article id="wi-content" class="wi-content post-1409 post type-post status-publish format-standard has-post-thumbnail 
hentry category-business tag-books tag-instagram tag-travel no-sidebar single-style-2 thumbnail-stretch-none main-content-narrow content-image-stretch content-image-stretch-bigger disable-dropcap disable-2-columns" itemscope itemtype="https://schema.org/CreativeWork">
<header class="single-header post-header entry-header single-big-section"
 itemscope itemtype="">
<div class="container">
<div class="post-item-header align-left">
<div style="font-size:1.4em; font-family:Times;" class="entry-categories meta-categories standalone-categories post-header-section">
<a href='{{ url("category/".$trend->category."/index")}}' rel="tag">{{$trend->category}} </a>
</div>
<h1 class="post-item-title wi-post-title fox-post-title post-header-section post-title size-normal" itemprop="headline">
{{title_case($Helper->get_title($trend->title, 30))}} 
</h1>
<!--<div class="post-item-subtitle post-header-section">
<p>Two in Los Angeles. The other in San Francisco. And they were each assigned very hazardous duties</p>
</div>-->
<div class="post-item-meta wi-meta fox-meta post-header-section ">
<div class="entry-date meta-time machine-time time-short">
	<time class="published" itemprop="datePublished" datetime="2018-05-16T00:00:00+00:00">{{$trend->created_at->diffForHumans()}}</time>
	
</div> 
<div class="fox-meta-author entry-author meta-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
@if(!empty($Helper->postAvatar($trend->user_id)->name))
<a class="meta-author-avatar" itemprop="url" rel="author" href="">
    <img style="width:40px; height:40px; border-radius: 50%; margin-right:10px;" alt='avatar' src='{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}' 
    
     class='avatar avatar-80 photo' height='80' width='80' />
    </a>
    <span class="byline"> by <span class="author vcard">
<a class="url fn" itemprop="url" rel="author" href="">
<span itemprop="name">
  @if(empty($trend->guest_name))

  {{ucfirst(strtolower($Helper->user($trend->user_id)->user_name))}}

 @else

  {{ $trend->guest_name}}

 @endif</span></a></span></span>
@else
<img src='{{asset("images/avatar/avatar.png")}}' style="width:40px; height:40px; border-radius: 50%; margin-right:10px;" class="h-10 rounded-full mr-3"
  alt="thumb"/>
  <span class="byline"> by <span class="author vcard">
<a class="url fn" itemprop="url" rel="author" href="">
<span itemprop="name">
  @if(empty($trend->guest_name))

  {{ucfirst(strtolower($Helper->user($trend->user_id)->user_name))}}

 @else

  {{ $trend->guest_name}}

 @endif
</span></a></span></span>
  @endif
</div>
</div>
</div>
</div>
</header>
<br>
<div class="thumbnail-wrapper single-big-section single-big-section-thumbnail">
<div class="thumbnail-container">
<div class="container">
<div class="thumbnail-main">
  @if(!empty($trend->postimage->name))
<figure class="fox-figure post-thumbnail post-thumbnail-standard hover-none thumbnail-acute" itemscope itemtype="https://schema.org/ImageObject">
<span class="image-element">

<img width="100%" max-height="500px" src='{{ asset("/images/post/".$trend->postimage->name)}}' class="attachment-full size-full" alt="" data-lazy="false"
  sizes="(max-width: 1440px) 100vw, 1440px" />
 
</span>
   
<figcaption class="fox-figcaption">
    {{$trend->postimage->description}}
<a href="#"> </a> </figcaption>
</figure>
@endif
</div>
</div>
</div>
</div>
<div class="single-big-section single-big-section-content">
<div class="container">
<div id="primary" class="primary content-area">
<div class="theiaStickySidebar">
<div class="single-body">
<div class="single-section single-main-content">
<div class="container entry-container">
<div style="font-size: 1.4em; padding: 13px; font-family: sans-serif;" class="dropcap-content columnable-content entry-content">

{!! ucfirst($trend->post)  !!}
<br>
</div>
</div>
</div>
<div class="single-section single-component single-share-section">
<div class="container">
<div class="fox-share share-style-custom  color-custom background-custom hover-color-custom hover-background-custom share-icons-shape-circle size-small">
<span class="share-label"><i class="fa fa-share-alt"></i>Share this</span>
<ul>
<li class="li-share-facebook">
<a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" title="Facebook" class="share share-facebook">
<i class="fab fa-facebook-f"></i>
<span>Facebook</span>
</a>
</li>

<li class="li-share-twitter">
<a href="https://twitter.com/home?status={{ url()->current() }}"  title="Twitter" class="share share-twitter">
<i class="fab fa-twitter"></i>
<span>Twitter</span>
</a>
</li>
<li class="li-share-pinterest">
<a href="https://pinterest.com/pin/create/button/?url={{ url($trend->id.'/'.str_slug(strtolower($trend->title), '-')) }} " target="blank" title="Pinterest" class="share share-pinterest">
<i class="fab fa-pinterest-p"></i>
<span>Pinterest</span>
</a>
</li>
<li class="li-share-linkedin">
<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ url($trend->id.'/'.str_slug(strtolower($trend->title), '-')) }}" target="blank" title="Linkedin" class="share share-linkedin">
<i class="fab fa-linkedin-in"></i>
<span>Linkedin</span>
</a>
</li>
<!--<li class="li-share-whatsapp">
<a href="https://api.whatsapp.com/send?phone=&amp;text=https%3A%2F%2Ffox.withemes.com%2Ftimes%2Fthe-first-thing-i-remember-liking-that-liked-me-back-was-food%2F" title="Whatsapp" class="share share-whatsapp">
<i class="fab fa-whatsapp"></i>
<span>Whatsapp</span>
</a>
</li>-->

<li class="li-share-reddit">
<a href="https://www.reddit.com/submit?url={{ url($trend->id.'/'.str_slug(strtolower($trend->title), '-')) }} " title="Reddit" class="share share-reddit">
<i class="fab fa-reddit-alien"></i>
<span>Reddit</span>
</a>
</li>
</ul>
</div>
</div>
</div>
<div class="single-section single-component single-tag-section">
<div class="container">
<div class="single-section single-component single-tags-section">
<div class="single-tags entry-tags post-tags">
<span class="single-heading tag-label">
<i class="feather-tag"></i>
Tags: </span>
<div class="fox-term-list">
                  <!--Fb comments goes in here -->
                  <div class="fb-comments" data-href="https://{{'www.southeastpost.com/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')}}"
                     data-numposts='10'>
<!--<ul><li><a href="" rel="tag">Books</a></li><li><a href="" rel="tag">Instagram</a></li><li><a href="l" rel="tag">Travel</a></li></ul>-->
</div>
</div>
</div>
</div>
</div>
@if(!empty($related))
<div class="single-section single-component single-related-section">
<div class="container">
<div class="single-section single-component single-related-section">
<div class="fox-related-posts">
<h3 class="single-heading related-label related-heading">
<i class="feather-file-plus"></i>
<span>You might be interested in</span>
</h3>
<div class="blog-container blog-container-grid">
<div class="wi-blog fox-blog blog-grid related-posts fox-grid column-3 spacing-normal">
    <br>
@foreach ($related as $relatedpost)
<article class="wi-post post-item post-grid fox-grid-item post-1407 post type-post status-publish 
format-standard has-post-thumbnail hentry category-business tag-article tag-instagram tag-science
 no-sidebar single-style-2 thumbnail-stretch-none main-content-narrow content-image-stretch 
 content-image-stretch-bigger disable-dropcap disable-2-columns" itemscope itemtype="https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail 
custom-thumbnail hover-logo hover-dark thumbnail-acute" itemscope itemtype="https://schema.org/ImageObject">
<span class="image-element">
    <a href="{{ url($relatedpost->id.'/'.str_slug(strtolower($relatedpost->title), '-')) }}" class="post-link">
    @if(!empty($relatedpost->postimage->name))
    <img width="480" height="384" src='{{asset("images/post/".$relatedpost->postimage->name)}}' class="attachment-thumbnail-medium size-thumbnail-medium" alt="" data-lazy="false" />
    @endif
    <span class="height-element" style="padding-bottom:80%;"></span><span class="image-overlay"></span>
    <span class="image-logo" style="width:40%">
    <img width="600" height="125" src="" class="attachment-full size-full" alt="" srcset="" sizes="(max-width: 600px) 100vw, 600px" /></span></a></span></figure>
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<h3 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-tiny" itemprop="headline">
<a href="{{ url($relatedpost->id.'/'.str_slug(strtolower($relatedpost->title), '-')) }}" rel="bookmark">
{{$Helper->get_title(title_case(strtolower($relatedpost->title)), 18)}}
</a>
</h3>
<div class="post-item-meta wi-meta fox-meta post-header-section related-posts">
<div class="entry-date meta-time machine-time time-short">
<time class="published" itemprop="datePublished" datetime="2018-04-23T00:00:00+00:00">{{$relatedpost->created_at->diffForHumans()}}</time>
<time class="updated" itemprop="dateModified" datetime="2019-10-03T02:46:58+00:00">{{$relatedpost->updated_at->diffForHumans()}}</time></div>
</div>
</div>
</div>
</div>
</article>
@endforeach

</div>
</div>
</div>
</div>
</div>
</div>
@endif

</div>
</div>
</div>
</div>
</div>
</article>
<div class="single-bottom-section single-bottom-posts-section">
<div class="fox-bottom-posts">
<div class="container">
<h3 id="posts-small-heading" class="bottom-posts-heading single-heading">
<span>Latest from {{$trend->category}}</span>
</h3>
<div class="blog-container blog-container-grid">
<div class="wi-blog fox-blog blog-grid fox-grid column-5 spacing-small">
@foreach($bycat as $cat)
<article class="wi-post post-item post-grid fox-grid-item post-1407 post type-post status-publish format-standard has-post-thumbnail hentry category-business tag-article tag-instagram tag-science no-sidebar single-style-2 thumbnail-stretch-none main-content-narrow content-image-stretch content-image-stretch-bigger disable-dropcap disable-2-columns" itemscope itemtype="../../../external.html?link=https://schema.org/CreativeWork">
<div class="post-item-inner grid-inner">
<figure class="fox-figure wi-thumbnail fox-thumbnail post-item-thumbnail grid-thumbnail custom-thumbnail hover-logo hover-dark thumbnail-acute" itemscope itemtype="../../../external.html?link=https://schema.org/ImageObject">
<span class="image-element">
<a href="{{ url($cat->id.'/'.str_slug(strtolower($cat->title), '-')) }}" class="post-link">
@if(!empty($cat->postimage->name))
<img width="480" height="384" src='{{ asset("images/post/".$cat->postimage->name)}}' class="attachment-thumbnail-medium size-thumbnail-medium" alt="" data-lazy="false" /><span class="height-element" style="padding-bottom:80%;"></span><span class="image-overlay"></span>
<span class="image-logo" style="width:40%">
<img width="600" height="125" src="" class="attachment-full size-full" alt="" srcset="" sizes="(max-width: 600px) 100vw, 600px" />
@endif
</span></a></span></figure>
<div class="grid-body post-item-body">
<div class="post-item-header grid-header">
<h3 class="post-item-title wi-post-title fox-post-title post-header-section grid-title size-tiny" itemprop="headline">
<a href="{{ url($cat->id.'/'.str_slug(strtolower($cat->title), '-')) }}" rel="bookmark">
{{$cat->title}}
</a>
</h3></div>
</div>
</div>
</article>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
@endsection