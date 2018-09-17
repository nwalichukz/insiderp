<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124060018-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124060018-1');
</script>
 <script src="{{url('ckeditor/ckeditor.js')}}"></script>

<meta name="description" content="A social tool that allow users post news, opinions, articles, questions, share a story or an experience and get involved in discussing 
those issues that affect us and our society especially in Nigeria.">
<meta name="keywords" content="politics, share a stroy, latest news, sports news, discussion forum, entertainment, president buhari, carTalk,
religious news, wolrd news, Dating and romance, nigerian senate, local news, trending posts, newspaper review, daily sun, vanguard news paper
 Bido, jokes and comedy, Bido Debate, Bido articles, bido ask, bido answer, bido Share">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!empty($title))
	    {{ $title }}
		@else
		Bido - @if(!empty(Auth::check())){{Auth::user()->name}} @else Dashboard @endif
		@endif</title>

    <!-- Styles -->
    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}" type="text/Javascript"> </script>
    <script src="{{ asset('js/orientScript.js') }}" type="text/Javascript"> </script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/b.css')  }}" type="text/css">
    <link href="{{ asset('css/bido.css') }}" rel="stylesheet">
    <link href="{{asset('css/orientStyle.css')}}" rel="stylesheet">
    <link href="{{asset('css/fonts.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/ico" sizes="96x96" href="{{ asset('images/favicon/favicon.png')}}">
<link rel="icon" type="image/ico" sizes="32x32" href="{{ asset('images/favicon/favicon.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png')}}">
<link rel="icon" type="image/ico" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.ico')}}">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor">
<meta name="msapplication-TileImage">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
</head>
<body>
<div id="app">
    <div class="navbar navbar-fixed-top bg-white border-b border-grey py-2">
        <div class="container mx-auto flex items-center justify-between flex-wrap px-4">
            <div>
                <a href="{{ url('/') }}" class="logoText">BIDO</a>
            </div>
            <div class="block sm:hidden">
                <button @click="toggle" class="flex items-center px-3 py-2 border rounded">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div :class="open ? 'block w-full': 'hidden'" class="sm:flex sm:items-center sm:w-auto">
                <div> @include('partials.nav') </div>
            </div>

        </div>
    </div>

<div class="col-md-4 col-lg-4 center-block">
    @include('partials.errors')
</div>

@yield('content')

</div>
    <!-- Scripts -->
<script type="text/x-template" id="dropdown-link-template">
    <div class="relative">
        <div role="button" class="inline-block select-none" @click="open = !open">
            <slot name="link"></slot>
        </div>
        <div class="absolute pin-l mt-px" v-show="open">
            <slot name="dropdown"></slot>
        </div>
    </div>
</script>
<script>
    Vue.component('dropdown-link', {
        template: '#dropdown-link-template',
        data() {
            return {
                open: false
            }
        }
    });

    new Vue({
        el: "#app",
        data: {
            open: false,
        },

        methods: {
            toggle() {
                this.open = !this.open
            }
        },
    });
</script>

    <div class="col-md-12">
<hr/>
<nav class="footer"><a href="{{url('/')}}">Home</a> |<!-- <a href="{{url('/terms')}}"> Terms </a>| --><a href="{{url('/about')}}"> About us</a> |<a href="{{ URL('/logout') }}"> Logout</a> | <a href="{{url('/contact')}}">Contact us</a></nav>
 <nav class="footer"><a title="Go to letnote website" href="{{url('/')}}"> </a></nav>
   </div>
@include('partials.modals')

</body>
</html>
