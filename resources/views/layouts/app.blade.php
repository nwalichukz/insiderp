<!DOCTYPE html>
<html lang="en-US" class="no-js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/favicon.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
    @if(!empty($pg))
        <meta name="description"
              content="{!!strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($trend->post, 150))))!!}">
    @else
        <meta name="description" content="The Southeast Post is a Nigerian based independent online news website, featuring opinions, Latest news, world news, political analysis... Discussing the issues that affect us and our society especially in Nigeria.">
    @endif

	@if(!empty($trend->postimage->name))
    <meta property="og:image" content='{{ asset("/images/post/".$trend->postimage->name)}}'>
    @endif
<!--[if lt IE 9]>
	<script src="https://fox.withemes.com/times/wp-content/themes/fox/js/html5.js"></script>
	<![endif]-->
<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
@if(!empty($fulltitle)) <title> {{title_case($fulltitle)}} - The Southeast Post </title>
@else
<title>The Southeast post &#8211; Breaking News, Nigeria News, Political Analysis, Business news, World news, Opinions and more</title>
@endif

<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/fox.withemes.com\/times\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.3.2"}};
			!function(e,a,t){var r,n,o,i,p=a.createElement("canvas"),s=p.getContext&&p.getContext("2d");function c(e,t){var a=String.fromCharCode;s.clearRect(0,0,p.width,p.height),s.fillText(a.apply(this,e),0,0);var r=p.toDataURL();return s.clearRect(0,0,p.width,p.height),s.fillText(a.apply(this,t),0,0),r===p.toDataURL()}function l(e){if(!s||!s.fillText)return!1;switch(s.textBaseline="top",s.font="600 32px Arial",e){case"flag":return!c([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])&&(!c([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!c([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]));case"emoji":return!c([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340])}return!1}function d(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(i=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},o=0;o<i.length;o++)t.supports[i[o]]=l(i[o]),t.supports.everything=t.supports.everything&&t.supports[i[o]],"flag"!==i[o]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[i[o]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(r=t.source||{}).concatemoji?d(r.concatemoji):r.wpemoji&&r.twemoji&&(d(r.twemoji),d(r.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>



<link rel='stylesheet' id='wp-block-library-css' href="{{ asset('wp-includes/css/dist/block-library/style.min9dff.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css' href="{{ asset('wp-content/plugins/contact-form-7/includes/css/stylesb62d.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='fox-demo-css' href="{{ asset('wp-content/plugins/fox-demo/style9dff.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wi-fonts-css' href="{{ asset('../../external.html?link=https://fonts.googleapis.com/css?family=Heebo%3A300%2C400%2C700%7CDM+Serif+Text%3A400%7CUltra%3A400')}}" type='text/css' media='all' />
<link rel='stylesheet' id='mediaelement-css' href="{{ asset('wp-includes/js/mediaelement/mediaelementplayer-legacy.minc270.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='wp-mediaelement-css' href="{{ asset('wp-includes/js/mediaelement/wp-mediaelement.min9dff.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='style-css' href="{{ asset('wp-content/themes/fox/stylef079.css') }}" type='text/css' media='all' />

<style id="style-inline-css" type="text/css">
.social-list.style-plain a:hover, .wi-pagination a.page-numbers:hover,
 .wi-mainnav ul.menu ul > li:hover > a, .wi-mainnav ul.menu ul li.current-menu-item > a,
  .wi-mainnav ul.menu ul li.current-menu-ancestor > a, .submenu-dark .wi-mainnav ul.menu ul li:hover > a,
   .submenu-dark .wi-mainnav ul.menu ul li.current-menu-item > a, .submenu-dark .wi-mainnav ul.menu ul
	li.current-menu-ancestor > a, .related-title a:hover, .page-links > a:hover, .widget_archive a:hover,
	.widget_nav_menu a:hover, .widget_meta a:hover, .widget_recent_entries a:hover, .widget_categories a:hover,
	 .tagcloud a:hover, .header-cart a:hover, .woocommerce .star-rating span:before, .null-instagram-feed .clear a:hover, .widget a.readmore:hover{color:#21759b}html .mejs-controls .mejs-time-rail .mejs-time-current, .dropcap-color, .style--dropcap-color .enable-dropcap .dropcap-content:first-letter, .style--dropcap-color p.has-drop-cap:not(:focus):first-letter, .fox-btn.btn-primary, button.btn-primary, input.btn-primary[type="button"], input.btn-primary[type="reset"], input.btn-primary[type="submit"], .social-list.style-black a:hover, .post-item-thumbnail:hover .video-indicator-solid, a.more-link:hover, .post-newspaper .related-thumbnail, .style--slider-navtext .flex-direction-nav a:hover, .review-item.overall .review-score, #respond #submit:hover, .wpcf7-submit:hover, #footer-search .submit:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce span.onsale, .woocommerce ul.products li.product .onsale, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce a.add_to_cart_button:hover, .woocommerce #review_form #respond .form-submit input:hover{background-color:#21759b}.review-item.overall .review-score, .partial-content, .null-instagram-feed .clear a:hover{border-color:#21759b}.reading-progress-wrapper::-webkit-progress-value{background-color:#21759b}.reading-progress-wrapper::-moz-progress-value{background-color:#21759b}.main-header.has-logo-center .container{height:100px}.sticky-header-background{opacity:1}.header-search-wrapper .search-btn{font-size:20px}#footer-logo img{width:120px}#backtotop{color:#111111;background-color:#f0f0f0;border-color:#f0f0f0}#backtotop:hover{color:#111111;background-color:#ffffff;border-color:#dddddd}body{color:#444444}h1, h2, h3, h4, h5, h6{color:#000000}a{color:#21759b}a:hover{color:#21759b}.fox-logo, .min-logo-text, .mobile-logo-text{color:#000000}.wi-mainnav ul.menu > li > a{color:#111111}.wi-mainnav ul.menu > li:hover > a{color:#999999}.wi-mainnav ul.menu > li.current-menu-item > a, .wi-mainnav ul.menu > li.current-menu-ancestor > a{color:#999999;background-color:#ffffff}.wi-mainnav ul.menu > li.menu-item-has-children > a:after, .wi-mainnav ul.menu > li.mega > a:after{color:#cccccc}.wi-mainnav ul.menu ul{background-color:#ffffff;color:#444444}.wi-mainnav ul.menu > li > ul > .caret{color:#eaeaea}.wi-mainnav ul.menu ul li:hover > a, .wi-mainnav ul.menu .post-nav-item-title:hover a, .wi-mainnav ul.menu > li.mega ul ul a:hover{color:#111111}.wi-mainnav ul.menu ul li:hover > a, .wi-mainnav ul.menu > li.mega ul ul a:hover{background-color:#f0f0f0}.wi-mainnav ul.menu ul > li, .mega-sep{border-color:#ffffff}.post-item-title a:hover{color:#595959;text-decoration:none}.post-item-meta{color:#aaaaaa}.post-item-meta a{color:#aaaaaa}.post-item-meta a:hover{color:#111111}.standalone-categories a{color:#111111}.single .single-main-content{color:#000000}.widget-title{text-align:left}table, td, th, .fox-input, input[type="color"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"], input:not([type]), textarea, textarea, select, .style--tag-block .fox-term-list a, .fox-slider-rich, .pagination-inner, .post-sep, .blog-related, .blog-related .line, .post-newspaper .related-area, .post-list-sep, .single-authorbox-section, .post-nav-simple, #footer-widgets, #footer-bottom, #offcanvas-bg, .commentlist ul.children, .offcanvas-element,  .hero-half,.commentlist li + li > .comment-body, .classic-main-header-top .container, .related-heading, .comments-title, .comment-reply-title, .style--header-sticky-element-border .header-sticky-element.before-sticky,
    .widget_archive ul, .widget_nav_menu ul, .widget_meta ul, .widget_recent_entries ul, .widget_categories ul,
    .widget_archive li, .widget_nav_menu li, .widget_meta li, .widget_recent_entries li, .widget_categories li
    {border-color:#cccccc}.share-style-custom a{width:28px}.fox-share.color-custom a{color:#111111}.fox-share.background-custom a{background-color:#f0f0f0}.fox-share.hover-color-custom a:hover{color:#111111}.fox-share.hover-background-custom a:hover{background-color:#fafafa}body .elementor-section.elementor-section-boxed>.elementor-container{max-width:1210px}@media (min-width: 1200px) {.container,.cool-thumbnail-size-big .post-thumbnail{width:1170px}body.layout-boxed .wi-wrapper{width:1230px}.thumbnail-stretch-bigger .thumbnail-container{width:1290px}}@media (min-width:1024px) {.secondary{width:22.649572649573%}.has-sidebar .primary{width:77.350427350427%}}body,.font-body,.fox-btn,button,input[type="button"],input[type="reset"],input[type="submit"],.post-item-meta,.standalone-categories,.wi-mainnav ul.menu > li > a,.footer-bottom .widget_nav_menu,#footernav,.offcanvas-nav,.wi-mainnav ul.menu ul,.header-builder .widget_nav_menu  ul.menu ul,.archive-title,.single .single-main-content,.single-heading,.widget-title,.heading-title-main,.article-big .readmore,.fox-input,input[type="color"],input[type="date"],input[type="datetime"],input[type="datetime-local"],input[type="email"],input[type="month"],input[type="number"],input[type="password"],input[type="search"],input[type="tel"],input[type="text"],input[type="time"],input[type="url"],input[type="week"],input:not([type]),textarea{font-family:"Heebo",sans-serif}.font-heading,h1,h2,h3,h4,h5,h6,.wp-block-quote.is-large cite,.wp-block-quote.is-style-large cite,.fox-term-list,.wp-block-cover-text,.title-label,.thumbnail-view,.readmore,a.more-link,.big-meta,.post-big a.more-link,.style--slider-navtext .flex-direction-nav a,.page-links-container,.authorbox-nav,.post-navigation .post-title,.review-criterion,.review-score,.review-text,.commentlist .fn,.reply a,.widget_archive,.widget_nav_menu,.widget_meta,.widget_recent_entries,.widget_categories,.widget_rss > ul a.rsswidget,.widget_rss > ul > li > cite,.widget_recent_comments,#backtotop,.view-count,.tagcloud,.slogan,.post-item-title,.single .post-item-title.post-title{font-family:"DM Serif Text",serif}.min-logo-text,.fox-logo,.mobile-logo-text,blockquote{font-family:"Ultra",serif}body, .font-body{font-size:16px;font-weight:400;font-style:normal;text-transform:none;letter-spacing:0px;line-height:1.8}h1, h2, h3, h4, h5, h6{font-weight:400;font-style:normal;text-transform:none;line-height:1.1}h2{font-size:2.0625em;font-style:normal}h3{font-size:1.625em;font-style:normal}h4{font-size:1.25em;font-style:normal}.fox-logo, .min-logo-text, .mobile-logo-text{font-size:32px;font-weight:400;font-style:normal;text-transform:none;letter-spacing:0px;line-height:1.3}.slogan{font-size:0.8125em;letter-spacing:8px}.wi-mainnav ul.menu > li > a, .footer-bottom .widget_nav_menu, #footernav, .offcanvas-nav{font-size:12px;font-weight:400;text-transform:uppercase;letter-spacing:0px}.wi-mainnav ul.menu ul, .header-builder .widget_nav_menu  ul.menu ul{font-size:12px;font-weight:400;text-transform:none;letter-spacing:0px}.post-item-title{font-style:normal;text-transform:none;letter-spacing:0px}.post-item-meta{font-size:13px;font-weight:400;font-style:normal;text-transform:none}.standalone-categories{font-size:13px;font-weight:700;font-style:normal;text-transform:uppercase;letter-spacing:1px}.archive-title{font-size:1.5em;font-weight:700;font-style:normal;text-transform:uppercase;letter-spacing:0px}.single .post-item-title.post-title{font-size:3.2em;font-weight:300;font-style:normal}.single .single-main-content{font-size:17px;font-style:normal}.single-heading{font-size:.9em;font-weight:700;text-transform:uppercase;letter-spacing:1px}.widget-title{font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px}.heading-title-main{font-weight:700;font-style:normal;text-transform:uppercase}.fox-btn, button, input[type="button"], input[type="reset"], input[type="submit"], .article-big .readmore{font-size:14px;font-weight:700;font-style:normal;text-transform:none;letter-spacing:0px}.fox-input, input[type="color"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"], input:not([type]), textarea{font-size:14px;font-weight:400;font-style:normal;text-transform:none}blockquote{font-size:1.1em;font-weight:400;font-style:normal;text-transform:none}.offcanvas-nav{font-size:16px;font-weight:400;font-style:normal;text-transform:none;letter-spacing:0px}@media only screen and (max-width: 1023px){.fox-logo, .min-logo-text, .mobile-logo-text{font-size:28px}.archive-title{font-size:1.3em}.single .post-item-title.post-title{font-size:1.9em}.single .single-main-content{font-size:15px}blockquote{font-size:1em}.offcanvas-nav{font-size:14px}}@media only screen and (max-width: 567px){body, .font-body{font-size:14px}.fox-logo, .min-logo-text, .mobile-logo-text{font-size:20px}.archive-title{font-size:1.1em}.single .post-item-title.post-title{font-size:1.5em}.single .single-main-content{font-size:14px}}#after-header .container{border-top-width:1px;border-bottom-width:1px;border-color:#eaeaea;border-style:solid}#footer-bottom{padding-top:20px;padding-bottom:20px;border-style:solid}#titlebar .container{margin-bottom:0px;padding-top:40px;padding-bottom:0px;border-style:solid}.single-authorbox-section, .related-heading, .comments-title, .comment-reply-title{border-top-width:1px;border-color:#eaeaea;border-style:solid}.wi-mainnav ul.menu ul{padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px;border-top-width:2px;border-right-width:2px;border-bottom-width:2px;border-left-width:2px;border-color:#eaeaea;border-top-left-radius:1px;border-top-right-radius:1px;border-bottom-right-radius:1px;border-bottom-left-radius:1px}.wi-mainnav ul.menu ul a{padding-top:6px;padding-bottom:6px}.widget-title{margin-bottom:16px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;border-color:#cccccc;border-style:solid}blockquote{padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px;border-top-width:3px;border-bottom-width:1px;border-style:solid}@media only screen and (max-width: 1023px){}@media only screen and (max-width: 567px){}#footer-widgets{background-size:cover;background-position:center center;background-repeat:no-repeat;background-attachment:scroll}#offcanvas-bg{background-color:#ffffff}.main-header .widget:nth-child(2){margin-left: auto;}body .wi-content{padding-top:20px;padding-bottom:0px}
</style>

<link rel='stylesheet' id='elementor-icons-css' href="{{asset('wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min4c7e.css') }}" type='text/css' media='all' />

<link rel='stylesheet' id='elementor-animations-css' href="{{ asset('wp-content/plugins/elementor/assets/lib/animations/animations.minab7d.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href="{{ asset('wp-content/plugins/elementor/assets/css/frontend.minab7d.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='elementor-global-css' href="{{ asset('wp-content/uploads/sites/23/elementor/css/global83eb.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-775-css' href="{{ asset('wp-content/uploads/sites/23/elementor/css/post-77583eb.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='google-fonts-1-css' href="{{ asset('../../external.html?link=https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;ver=5.3.2')}}" type='text/css' media='all' />
<script type='text/javascript' src= "{{ asset('wp-includes/js/jquery/jquery4a5f.js') }}"></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/jquery/jquery-migrate.min330a.js') }}"></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/fox-demo/js.cookie9dff.js') }}"></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/fox-demo/demo9dff.js') }}"></script>
<link rel='https://api.w.org/' href="{{ asset('wp-json/index.html')}}" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{{ asset('xmlrpc0db0.php')}}" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{{ asset('wp-includes/wlwmanifest.xml')}}" />
<meta name="generator" content="WordPress 5.3.2" />
<link rel="canonical" href="{{ url('/') }}" />
<link rel='shortlink' href="{{ url('/')}}" />
<link rel="alternate" type="application/json+oembed" href="{{ asset('wp-json/oembed/1.0/embedf7a8.json')}}" />
<link rel="alternate" type="text/xml+oembed" href="{{ asset('wp-json/oembed/1.0/embeda68a')}}" />
<style id="color-preview"></style>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151738156-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151738156-1');
        </script>


        <script data-ad-client="ca-pub-9051751424373663" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>

<body class="home page-template-default page page-id-775 no-sidebar layout-wide style--header-sticky-element-border
submenu-light style--dropcap-default dropcap-style-default style--tag-plain style--blockquote-no-icon style--link-2
elementor-default elementor-kit-1713 elementor-page elementor-page-775" itemscope itemtype="https://schema.org/WebPage">
<div id="wi-all" class="fox-outer-wrapper fox-all wi-all">
<div id="wi-wrapper" class="fox-wrapper wi-wrapper">
<div class="wi-container">
<header id="masthead" class="site-header header-builder" itemscope itemtype="https://schema.org/WPHeader">
<div class="main-header header-builder header-row has-logo-center valign-center" id="main-header">
<div class="container">
<div id="social-2" class="widget widget_social"><style type="text/css">#social-id-5e58cc1ecbfd7 a{color:#111111}#social-id-5e58cc1ecbfd7 a:hover{color:#111111}</style>
<div class="social-list widget-social style-plain shape-circle align-left icon-size-normal" id="social-id-5e58cc1ecbfd7">
<ul>
<li class="li-facebook">
<a href="https://www.facebook.com/Southeastpost" target="_blank" rel="alternate" title="Facebook">
<i class="fab fa-facebook-f"></i>
<span>Facebook</span>
</a>
 </li>
<!--<li class="li-twitter">
<a href="https://www.twitter.com" target="_blank" rel="alternate" title="Twitter">
<i class="fab fa-twitter"></i>
<span>Twitter</span>
</a>
</li>

<li class="li-whatsapp">
<a href="whatsapp.com" target="_blank" rel="alternate" title="WhatsApp">
<i class="fab fa-whatsapp"></i>
<span>WhatsApp</span>
</a>
</li>-->

</ul>
</div>
</div>

<style type="text/css">#button-id-5e58cc1ecd4bb{color:#ffffff;background:#1e73be}</style>
<div class="fox-button btn-inline">
<!--<a target="_blank" href="../../external.html?link=https://themeforest.net/item/the-fox-contemporary-magazine-theme-for-creators/11103012" class="fox-btn btn-black btn-tiny btn-round" id="button-id-5e58cc1ecd4bb"><span class="btn-main-text">Buy</span></a> -->
</div>
</div><div id="logo-1" class="widget widget_logo">
<div id="logo-area" class="fox-logo-area fox-header-logo">
<div id="wi-logo" class="fox-logo-container">
<h1 class="wi-logo-main fox-logo logo-type-text" id="site-logo" style="font-family: Times;">

<a href="{{ url('/') }}" rel="home">

<span class="text-logo">The Southeast Post</span>
</a>
</h1>
</div>
</div>
</div>
</div>
</div>


<br>
<div id="after-header" class="widget-area header-sidebar wide-sidebar header-row after-header align-center header-sticky-element">
<div class="container">
<div id="nav-1" class="widget widget_nav">
<nav id="wi-mainnav" class="navigation-ele wi-mainnav" role="navigation" itemscope itemtype="">
<div class="menu style-indicator-plus">
	<ul id="menu-primary" class="menu">
<li id="menu-item-986" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-775 current_page_item menu-item-has-children menu-item-986"><a href="{{url('/')}}" aria-current="page">Home</a>
<!--<ul class="sub-menu">
<li id="menu-item-1679" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1679"><a href="home-simple/index.html">Home Simple</a></li>
<li id="menu-item-1678" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1678"><a href="home-newspaper/index.html">Home Newspaper</a></li>
</ul>-->
</li>
<li id="menu-item-529" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-529 mega mega-item">
	<a href="{{url('/category/Politics/index')}}">Politics</a>
<!--<ul class="sub-menu">
<li id="menu-item-530" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-530"><a href="#">Example</a>
<ul class="sub-menu">
<li id="menu-item-1683" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1683"><a href="eventually-i-ran-to-minneapolis-where-its-cold-and-i-figured-id-keep-better/index.html">HERO Full</a></li>
<li id="menu-item-1684" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1684"><a href="we-got-a-right-to-pick-a-little-fight-bonanza-2/index.html">HERO Half</a></li>
<li id="menu-item-1685" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1685"><a href="my-name-is-rhoda-morgenstern/index.html">Sidebar Right</a></li>
<li id="menu-item-1686" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1686"><a href="ive-got-a-nasty-reputation/index.html">Sidebar Left</a></li>
<li id="menu-item-1688" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1688"><a href="i-decided-to-move-out-of-the-house-when-i-was-twenty-four/index.html">Fullscreen Image Stretch</a></li>
<li id="menu-item-1689" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1689"><a href="being-evil-has-a-price-2/index.html">Thumbnail Before Title</a></li>
</ul>
</li>
<li id="menu-item-531" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-531"><a href="#">Example</a>
<ul class="sub-menu">
<li id="menu-item-1694" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1694"><a href="in-dexters-laboratory-lives-the-smartest-boy-youve-ever-seen/index.html">Grid Gallery</a></li>
<li id="menu-item-1695" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1695"><a href="i-hear-a-lot-of-little-secrets/index.html">Image Carousel</a></li>
<li id="menu-item-1696" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1696"><a href="what-you-are-about-to-see-is-real/index.html">Image Slider</a></li>
<li id="menu-item-1697" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1697"><a href="if-anyone-fights-anyone-of-us-hes-gotta-fight-with-me-2/index.html">Metro Gallery</a></li>
</ul>
</li>
<li id="menu-item-670" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-670"><a href="#">Example</a>
<ul class="sub-menu">
<li id="menu-item-1692" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1692"><a href="cause-being-evil-has-a-price/index.html">Sponsored Post</a></li>
<li id="menu-item-1698" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1698"><a href="i-went-to-art-school/index.html">YouTube Video</a></li>
<li id="menu-item-688" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-688"><a href="author/withemes/index.html">Author Page</a></li>
<li id="menu-item-1690" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1690"><a href="one-for-four-four-for-one-this-we-guarantee/index.html">Load Next Post</a></li>
</ul>
</li>
</ul>-->
</li>
<li id="menu-item-22" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-22 mega mega-item"><a href="{{ url('category/Lifestyle/index')}}">Lifestyle</a></li>
<li id="menu-item-30" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-30 mega mega-item"><a href="{{ url('category/Interview/index')}}">Interview</a></li>
<li id="menu-item-23" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23 mega mega-item"><a href="{{ url('category/Opinion/index')}}">Opinion</a></li>
<li id="menu-item-24" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-24 mega mega-item"><a href="{{ url('category/Business/index')}}">Business</a></li>
<li id="menu-item-28" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-28 mega mega-item"><a href="{{ url('category/Sports/index')}}">Sports</a></li>
<li id="menu-item-31" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-31 mega mega-item"><a href="{{ url('category/Travel/index')}}">Travel</a></li>
@if (Auth::guest())
<li id="menu-item-31" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-31 mega mega-item"><a href="{{ url('/login') }}">login</a></li>
 <!--<li class="nav-li"><a href="{{ url('/register') }}">sign up</a></li> -->
	@else
	<li id="menu-item-31" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-31 mega mega-item"><a class="dropdown-item" style="font:blue;" href="{{url('/dashboard/'.Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Dashboard </a></li>

@endif
</ul></div>
</nav>
</div>
</div>
</div>
</header>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=283429275621504&autoLogAppEvents=1">
</script>
<div id="masthead-mobile" class="masthead-mobile">
<div class="container">
<div class="masthead-mobile-left masthead-mobile-part">
<a class="toggle-menu hamburger hamburger-btn">
<i class="feather-menu"></i>
<i class="feather-x"></i>
</a>
</div>
<h4 id="mobile-logo" class="mobile-logo mobile-logo-text">
<a href="{{url('/')}}" rel="home" style="font-family: Times;">
<span class="text-logo">THE SOUTHEAST POST</span>
</a>
</h4>
<div class="masthead-mobile-right masthead-mobile-part">
</div>
</div>
<div class="masthead-mobile-bg"></div>
</div>
<div id="masthead-mobile-height"></div>
<br>
<!--the body of the home page -->
@yield('content')
<!-- The end of the body -->

<footer id="wi-footer" class="site-footer" itemscope itemtype="../../external.html?link=https://schema.org/WPFooter">
<div id="footer-widgets" class="footer-widgets footer-sidebar footer-sidebar-1-2-1 skin-light stretch-content">
<div class="container">
<div class="footer-widgets-inner footer-widgets-row">
<aside class="widget-area footer-col col-1-4" itemscope itemptype="../../external.html?link=https://schema.org/WPSideBar">
<div id="footer-logo-1" class="widget widget_footer_logo">
<div id="footer-logo" class="footer-bottom-element">
<a href="{{ url('/')}}" rel="home">
<img src="{{ asset('images/logo/logo.png')}}" alt="Footer Logo" />
</a>
</div>
</div><div id="text-4" class="widget widget_text"> <div class="textwidget">
<p>The Southeast Post is a Nigerian based independent online news website, featuring Breaking News, Nigeria News, Political Analysis, Business news, World news, Opinions and more
And also Promoting discussions on the issues that affect us and our society especially in Nigeria.</p>
<p>Contact Us: <a href=" "><span class="__cf_email__" data-cfemail="23465b424e534f4663474c4e424a4d0d404c4e">[contactsepost@gmail.com]</span></a></p>
</div>
</div><div id="social-3" class="widget widget_social"><style type="text/css">#social-id-5e58cc1f7101e a{color:#111111;background:#f0f0f0;border-color:#f0f0f0}#social-id-5e58cc1f7101e a:hover{color:#111111;background:#ffffff;border-color:#eaeaea}</style>
<div class="social-list widget-social style-fill shape-circle align-left icon-size-small" id="social-id-5e58cc1f7101e">
<ul>
<li class="li-facebook">
<a href="https://facebook.com/Southeastpost" target="_blank" rel="alternate" title="Southeast Post's Facebook page">
<i class="fab fa-facebook-f"></i>
<span>Facebook</span>
</a>
</li>
<li class="li-twitter">
<a href="https://twitter.com/Southeastpost" target="_blank" rel="alternate" title="Twitter">
<i class="fab fa-twitter"></i>
<span>Twitter</span>
</a>
</li>



</ul>
</div>
</div>
<div class="footer-col-sep"></div>
</aside>
<aside class="widget-area footer-col col-1-2" itemscope itemptype="https://schema.org/WPSideBar">
<div id="wi-instagram-2" class="widget widget_instagram">
<div class="fox-instagram-wrapper">
<div class="fox-instagram-container">
<div class="fox-instagram fox-grid fox-grid-gallery icolumn-4 spacing-tiny">

<div class="fox-grid-item insta-item">
<figure class="fox-figure insta-item-inner custom-thumbnail" itemscope itemtype="https://schema.org/ImageObject">
<a href="../../external.html?link=http://instagram.com/p/B3pL_VjD0AP/" target="_blank" title="">
<span class="image-element">
	<img src='' alt="" sizes="(max-width: 480px) 100vw, 1080px" srcset="//scontent-lax3-1.cdninstagram.com/v/t51.2885-15/e35/s320x320/71117754_143089420294718_283047281468623131_n.jpg?_nc_ht=scontent-lax3-1.cdninstagram.com&amp;_nc_cat=102&amp;_nc_ohc=MMN5Ebd-VQ4AX9Un3r_&amp;oh=bf209b7be780ca198039a41ec5a25df3&amp;oe=5E839FC6 400w,//scontent-lax3-1.cdninstagram.com/v/t51.2885-15/e35/s150x150/71117754_143089420294718_283047281468623131_n.jpg?_nc_ht=scontent-lax3-1.cdninstagram.com&amp;_nc_cat=102&amp;_nc_ohc=MMN5Ebd-VQ4AX9Un3r_&amp;oh=4fdaf24d34a12955fc5b276aa7bc1fce&amp;oe=5E806CCB 600w,//scontent-lax3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/71117754_143089420294718_283047281468623131_n.jpg?_nc_ht=scontent-lax3-1.cdninstagram.com&amp;_nc_cat=102&amp;_nc_ohc=MMN5Ebd-VQ4AX9Un3r_&amp;oh=d3060297a4afcd5dfd133bb78a226193&amp;oe=5E80C22A 800w" /><span class="height-element"></span></span>
</a>
</figure>
</div>


</div>
</div>
<div class="follow-text fox-button">
<a href="https://www.facebook.com/Southeastpost" target="_blank" class="follow-us fox-btn btn-primary">Follow Us</a>
</div>
</div>
</div>
<div class="footer-col-sep"></div>
</aside>

<aside class="widget-area footer-col col-1-4" itemscope itemptype="https://schema.org/WPSideBar">
<div id="mc4wp_form_widget-2" class="widget widget_mc4wp_form_widget"><h3 class="widget-title"><span>Newsletter</span></h3><script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>(function() {
	window.mc4wp = window.mc4wp || {
		listeners: [],
		forms: {
			on: function(evt, cb) {
				window.mc4wp.listeners.push(
					{
						event   : evt,
						callback: cb
					}
				);
			}
		}
	}
})();
</script><form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-1067" method="post" data-id="1067" data-name="Homepage Form"><div class="mc4wp-form-fields"><p>
<input type="text" name="FNAME" placeholder="Your Name" required/>
</p>
<p>
<input type="email" name="EMAIL" placeholder="Your Email" required />
</p>
<p>
<input type="submit" disabled="true" value="Sign Up" />
</p></div><label style="display: none !important;">Leave this field empty if you're human: <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" /></label><input type="hidden" name="_mc4wp_timestamp" value="1582877727" /><input type="hidden" name="_mc4wp_form_id" value="1067" /><input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-2" /><div class="mc4wp-response"></div></form></div>
<div class="footer-col-sep"></div>
</aside>
</div>
</div>
</div>
<div id="footer-bottom" role="contentinfo" class="footer-bottom stretch-content skin-light">
<div class="container">
<div class="footer-bottom-stack align-center">
<div id="footer-nav-1" class="widget footer_widget_nav">
<nav id="footernav" class="footernav footer-bottom-element" role="navigation" itemscope itemtype="../../external.html?link=https://schema.org/SiteNavigationElement">
<div class="menu"><ul id="menu-footer-menu" class="menu"><li id="menu-item-985" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-775 current_page_item menu-item-985"><a href="{{url('/')}}" aria-current="page">Home</a></li>
<li id="menu-item-191" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-191"><a href="{{url('/about')}}">About</a></li>
<!--<li id="menu-item-193" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-193"><a href="#">Privacy</a></li>
<li id="menu-item-497" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-497"><a href="#">Advertisement</a></li> -->
<li id="menu-item-190" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-190"><a href="{{url('/contact')}}">Contact</a></li>
<li id="menu-item-498" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-498"><a target="_blank" rel="noopener noreferrer" href="{{url('/sitemap')}}">Site Map</a></li>
</ul></div>
</nav>
</div>
</div>
</div>
</div>
</footer>
</div>
<div class="wrapper-bg-element"></div>
</div>
</div>
<div id="offcanvas" class="offcanvas offcanvas-light">
<div class="offcanvas-inner">
<div class="offcanvas-search offcanvas-element">
<div class="searchform">
<form role="search" method="get" action="#" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction" class="form">
<input type="text" name="s" class="s search-field" value="" placeholder="Type &amp; hit enter" />
<button class="submit" role="button" title="Go">
<i class="feather-search"></i>
</button>
</form>
</div> </div>
<div class="social-list offcanvas-element style-plain shape-circle align-center icon-size-normal" id="social-id-5e58cc1f74501">
<ul>
<li class="li-facebook">
<a href="https://facebook.com/Southeastpost" target="_blank" rel="alternate" title="Facebook">
<i class="fab fa-facebook-f"></i>
<span>Facebook</span>
</a>
</li>
<li class="li-twitter">
<a href="https://twitter.com/Southeastpost" target="_blank" rel="alternate" title="Twitter">
<i class="fab fa-twitter"></i>
<span>Twitter</span>
</a>
</li>

</ul>
</div>
<nav id="mobilenav" class="offcanvas-nav offcanvas-element">
<div class="menu"><ul id="menu-primary-1" class="menu">
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-775 current_page_item menu-item-has-children menu-item-986">
	<a href="{{ url('/') }}" aria-current="page">Home</a><span class="indicator"></span>
<!--<ul class="sub-menu">
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1679">
	<a href="home-simple/index.html">Home Simple</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1678">
	<a href="home-newspaper/index.html">Home Newspaper</a><span class="indicator"></span></li>
</ul> -->
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-529 mega mega-item">

<!--<ul class="sub-menu">
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-530"><a href="#">Example</a><span class="indicator"></span>
<ul class="sub-menu">
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1683"><a href="eventually-i-ran-to-minneapolis-where-its-cold-and-i-figured-id-keep-better/index.html">HERO Full</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1684"><a href="we-got-a-right-to-pick-a-little-fight-bonanza-2/index.html">HERO Half</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1685"><a href="my-name-is-rhoda-morgenstern/index.html">Sidebar Right</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1686"><a href="ive-got-a-nasty-reputation/index.html">Sidebar Left</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1688"><a href="i-decided-to-move-out-of-the-house-when-i-was-twenty-four/index.html">Fullscreen Image Stretch</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1689"><a href="being-evil-has-a-price-2/index.html">Thumbnail Before Title</a><span class="indicator"></span></li>
</ul>-->
</li>

<!--<ul class="sub-menu">
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1694"><a href="in-dexters-laboratory-lives-the-smartest-boy-youve-ever-seen/index.html">Grid Gallery</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1695"><a href="i-hear-a-lot-of-little-secrets/index.html">Image Carousel</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1696"><a href="what-you-are-about-to-see-is-real/index.html">Image Slider</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1697"><a href="if-anyone-fights-anyone-of-us-hes-gotta-fight-with-me-2/index.html">Metro Gallery</a><span class="indicator"></span></li>
</ul>-->
</li>

<!--<ul class="sub-menu">
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1692"><a href="cause-being-evil-has-a-price/index.html">Sponsored Post</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1698"><a href="i-went-to-art-school/index.html">YouTube Video</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-688"><a href="author/withemes/index.html">Author Page</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1690"><a href="one-for-four-four-for-one-this-we-guarantee/index.html">Load Next Post</a><span class="indicator"></span></li>
</ul>-->
</li>
</ul>
</li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-22 mega mega-item"><a href="{{ url('category/Politics')}}">Politics</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-30 mega mega-item"><a href="{{url('category/Interview')}}">Interview</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23 mega mega-item"><a href="{{ url('category/Opinion')}}">Opinion</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-24 mega mega-item"><a href="{{ url('category/Business')}}">Business</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-28 mega mega-item"><a href="{{ url('category/Sports')}}">Sports</a><span class="indicator"></span></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-31 mega mega-item"><a href="{{url('category/Travel/index')}}">Travel</a><span class="indicator"></span></li>
</ul></div>
</nav>
</div>
</div>
<!--<div id="offcanvas-bg" class="offcanvas-bg"></div>
<div class="offcanvas-overlay" id="offcanvas-overlay"></div>
<div id="demo-panel">
<div id="demo-toggle">
<i class="fa fa-cog fa-spin"></i>
</div>
<div id="demos">
<div class="demo-info">
<a href="../../external.html?link=https://themeforest.net/item/the-fox-contemporary-magazine-theme-for-creators/11103012/" target="_blank" id="buy">Purchase FOX</a>
</div>
<div class="demos">

<figure class="demo">
<a href="../../external.html?link=https://fox.withemes.com/fashion/" target="_blank" title="Fashion">
<img width="800" height="600" src="wp-content/uploads/2019/10/fashion.jpg" class="attachment-full size-full wp-post-image" alt="" srcset="https://fox.withemes.com/times/wp-content/uploads/2019/10/fashion.jpg 800w, https://fox.withemes.com/times/wp-content/uploads/2019/10/fashion-300x225.jpg 300w, https://fox.withemes.com/times/wp-content/uploads/2019/10/fashion-768x576.jpg 768w, https://fox.withemes.com/times/wp-content/uploads/2019/10/fashion-60x45.jpg 60w, https://fox.withemes.com/times/wp-content/uploads/2019/10/fashion-480x360.jpg 480w" sizes="(max-width: 800px) 100vw, 800px" />
<span class="name">Fashion</span>
</a>
</figure>
<figure class="demo">
<a href="index.html" target="_blank" title="Times">
<img width="800" height="600" src="wp-content/uploads/2019/08/times-5.jpg" class="attachment-full size-full wp-post-image" alt="" srcset="https://fox.withemes.com/times/wp-content/uploads/2019/08/times-5.jpg 800w, https://fox.withemes.com/times/wp-content/uploads/2019/08/times-5-300x225.jpg 300w, https://fox.withemes.com/times/wp-content/uploads/2019/08/times-5-768x576.jpg 768w, https://fox.withemes.com/times/wp-content/uploads/2019/08/times-5-60x45.jpg 60w, https://fox.withemes.com/times/wp-content/uploads/2019/08/times-5-480x360.jpg 480w" sizes="(max-width: 800px) 100vw, 800px" />
<span class="name">Times</span>
</a>
</figure>
<figure class="demo">
<a href="../../external.html?link=https://fox.withemes.com/classic/" target="_blank" title="Classic">
<img width="600" height="300" src="wp-content/uploads/2019/08/classic-1.jpg" class="attachment-full size-full wp-post-image" alt="" srcset="https://fox.withemes.com/times/wp-content/uploads/2019/08/classic-1.jpg 600w, https://fox.withemes.com/times/wp-content/uploads/2019/08/classic-1-300x150.jpg 300w, https://fox.withemes.com/times/wp-content/uploads/2019/08/classic-1-60x30.jpg 60w, https://fox.withemes.com/times/wp-content/uploads/2019/08/classic-1-480x240.jpg 480w" sizes="(max-width: 600px) 100vw, 600px" />
<span class="name">Classic</span>
</a>
</figure>
<figure class="demo">
<a href="../../external.html?link=https://fox.withemes.com/science/" target="_blank" title="Science">
<img width="800" height="600" src="wp-content/uploads/2019/08/science-2.jpg" class="attachment-full size-full wp-post-image" alt="" srcset="https://fox.withemes.com/times/wp-content/uploads/2019/08/science-2.jpg 800w, https://fox.withemes.com/times/wp-content/uploads/2019/08/science-2-300x225.jpg 300w, https://fox.withemes.com/times/wp-content/uploads/2019/08/science-2-768x576.jpg 768w, https://fox.withemes.com/times/wp-content/uploads/2019/08/science-2-60x45.jpg 60w, https://fox.withemes.com/times/wp-content/uploads/2019/08/science-2-480x360.jpg 480w" sizes="(max-width: 800px) 100vw, 800px" />
<span class="name">Science</span>
</a>
</figure>
</div>
</div>
</div>-->
<script>(function() {function maybePrefixUrlField() {
	if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
		this.value = "http://" + this.value;
	}
}

var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
if (urlFields) {
	for (var j=0; j < urlFields.length; j++) {
		urlFields[j].addEventListener('blur', maybePrefixUrlField);
	}
}
})();</script> <div id="backtotop" class="backtotop fox-backtotop scrollup backtotop-circle backtotop-icon">
<span class="btt-icon"><i class="feather-arrow-up"></i></span>
</div>
<script type='text/javascript' src='wp-content/plugins/fox-framework/js/fox-elementor9dff.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/fox.withemes.com\/times\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script>
<script type='text/javascript' src=" {{ asset('wp-content/plugins/contact-form-7/includes/js/scriptsb62d.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-includes/js/imagesloaded.min55a0.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/themes/fox/js/jquery.magnific-popupf488.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/fox/js/tooltipster.bundle.min5462.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/themes/fox/js/jquery.easing.1.34e44.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/themes/fox/js/jquery.fitvids5152.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/themes/fox/js/jquery.flexslider-min5152.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/themes/fox/js/jquery.inview.min5152.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/fox/js/masonry.pkgd.min3a05.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/fox/js/matchMedia5152.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/fox/js/slick.minee8b.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/fox/js/theia-sticky-sidebare7f0.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/themes/fox/js/superfish97e9.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/fox/js/jquery.lazy.mina71a.js')}}"></script>
<script type='text/javascript'>
var mejsL10n = {"language":"en","strings":{"mejs.install-flash":"You are using a browser that does not have Flash player enabled or installed. Please turn on your Flash player plugin or download the latest version from https:\/\/get.adobe.com\/flashplayer\/","mejs.fullscreen-off":"Turn off Fullscreen","mejs.fullscreen-on":"Go Fullscreen","mejs.download-video":"Download Video","mejs.fullscreen":"Fullscreen","mejs.time-jump-forward":["Jump forward 1 second","Jump forward %1 seconds"],"mejs.loop":"Toggle Loop","mejs.play":"Play","mejs.pause":"Pause","mejs.close":"Close","mejs.time-slider":"Time Slider","mejs.time-help-text":"Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds.","mejs.time-skip-back":["Skip back 1 second","Skip back %1 seconds"],"mejs.captions-subtitles":"Captions\/Subtitles","mejs.captions-chapters":"Chapters","mejs.none":"None","mejs.mute-toggle":"Mute Toggle","mejs.volume-help-text":"Use Up\/Down Arrow keys to increase or decrease volume.","mejs.unmute":"Unmute","mejs.mute":"Mute","mejs.volume-slider":"Volume Slider","mejs.video-player":"Video Player","mejs.audio-player":"Audio Player","mejs.ad-skip":"Skip ad","mejs.ad-skip-info":["Skip in 1 second","Skip in %1 seconds"],"mejs.source-chooser":"Source Chooser","mejs.stop":"Stop","mejs.speed-rate":"Speed Rate","mejs.live-broadcast":"Live Broadcast","mejs.afrikaans":"Afrikaans","mejs.albanian":"Albanian","mejs.arabic":"Arabic","mejs.belarusian":"Belarusian","mejs.bulgarian":"Bulgarian","mejs.catalan":"Catalan","mejs.chinese":"Chinese","mejs.chinese-simplified":"Chinese (Simplified)","mejs.chinese-traditional":"Chinese (Traditional)","mejs.croatian":"Croatian","mejs.czech":"Czech","mejs.danish":"Danish","mejs.dutch":"Dutch","mejs.english":"English","mejs.estonian":"Estonian","mejs.filipino":"Filipino","mejs.finnish":"Finnish","mejs.french":"French","mejs.galician":"Galician","mejs.german":"German","mejs.greek":"Greek","mejs.haitian-creole":"Haitian Creole","mejs.hebrew":"Hebrew","mejs.hindi":"Hindi","mejs.hungarian":"Hungarian","mejs.icelandic":"Icelandic","mejs.indonesian":"Indonesian","mejs.irish":"Irish","mejs.italian":"Italian","mejs.japanese":"Japanese","mejs.korean":"Korean","mejs.latvian":"Latvian","mejs.lithuanian":"Lithuanian","mejs.macedonian":"Macedonian","mejs.malay":"Malay","mejs.maltese":"Maltese","mejs.norwegian":"Norwegian","mejs.persian":"Persian","mejs.polish":"Polish","mejs.portuguese":"Portuguese","mejs.romanian":"Romanian","mejs.russian":"Russian","mejs.serbian":"Serbian","mejs.slovak":"Slovak","mejs.slovenian":"Slovenian","mejs.spanish":"Spanish","mejs.swahili":"Swahili","mejs.swedish":"Swedish","mejs.tagalog":"Tagalog","mejs.thai":"Thai","mejs.turkish":"Turkish","mejs.ukrainian":"Ukrainian","mejs.vietnamese":"Vietnamese","mejs.welsh":"Welsh","mejs.yiddish":"Yiddish"}};
</script>
<script type='text/javascript' src="{{ asset('wp-includes/js/mediaelement/mediaelement-and-player.minc270.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/mediaelement/mediaelement-migrate.min9dff.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpmejsSettings = {"pluginPath":"\/times\/wp-includes\/js\/mediaelement\/","classPrefix":"mejs-","stretching":"responsive"};
/* ]]> */
</script>
<script type='text/javascript' src="{{ asset('wp-includes/js/mediaelement/wp-mediaelement.min9dff.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var WITHEMES = {"l10n":{"prev":"Previous","next":"Next"},"enable_sticky_sidebar":"","enable_sticky_header":"1","ajaxurl":"https:\/\/fox.withemes.com\/times\/wp-admin\/admin-ajax.php","nonce":"2aa7ba3524","resturl_v2":"https:\/\/fox.withemes.com\/times\/wp-json\/wp\/v2\/","resturl_v2_posts":"https:\/\/fox.withemes.com\/times\/wp-json\/wp\/v2\/posts\/","content_elements_stretch_full":"img.fullsize, img.full-size, .wp-block-image, .wp-block-cover"};
/* ]]> */
</script>
<script type='text/javascript' src="{{ asset('wp-content/themes/fox/js/mainbc19.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-includes/js/wp-embed.min9dff.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/mailchimp-for-wp/assets/js/forms.min66f2.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/elementor/assets/js/frontend-modules.minab7d.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/jquery/ui/position.mine899.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/plugins/elementor/assets/lib/dialog/dialog.minae9e.js')}}"></script>
<script type='text/javascript' src=" {{ asset('wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/elementor/assets/lib/swiper/swiper.min9a8d.js')}}"></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/elementor/assets/lib/share-link/share-link.minab7d.js')}}"></script>
<script type='text/javascript'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","downloadImage":"Download image"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"2.9.2","urls":{"assets":"https:\/\/fox.withemes.com\/times\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"general":{"elementor_global_image_lightbox":"yes","elementor_lightbox_enable_counter":"yes","elementor_lightbox_enable_fullscreen":"yes","elementor_lightbox_enable_zoom":"yes","elementor_lightbox_enable_share":"yes","elementor_lightbox_title_src":"title","elementor_lightbox_description_src":"description"},"editorPreferences":[]},"post":{"id":1722,"title":"The Fox Times &#8211; Just another The Fox Magazine Sites site","excerpt":"","featuredImage":false}};
</script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/elementor/assets/js/frontend.minab7d.js')}}"></script>
</body>

<!-- Mirrored from fox.withemes.com/times/ by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 28 Feb 2020 08:22:02 GMT -->
</html>
