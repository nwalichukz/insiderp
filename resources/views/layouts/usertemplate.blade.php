<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124060018-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-124060018-1');
    </script>
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>

    <meta name="description" content="Bido is a social tool that allow users post news, opinions, articles, questions, share a story or an experience and get involved in discussing
those issues that affect us and our society especially in Nigeria.">
    <meta name="keywords" content="Web forum, Bido forum, politics, share a stroy, latest news, sports news, discussion forum, entertainment, president buhari, carTalk,
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
    link href="{{asset('css/swiper.min.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" type="text/Javascript"></script>

    <script src="{{ asset('js/swiper.min.js') }}" type="text/Javascript"></script>

    <script src="{{ asset('js/orientScript.js') }}" type="text/Javascript"></script>
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
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon/android-icon-192x192.png') }}">
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
<!-- PopAds.net Popunder Code for www.bido.com.ng | 2018-10-19,2926617,0,0 -->
<script type="text/javascript" data-cfasync="false">
/*<![CDATA[/* */
/* Privet darkv. Each domain is 2h fox dead */
 (function(){ var n=window;n["\x5f\x70\x6f\x70"]=[["s\x69t\u0065\u0049\x64",2926617],["\u006d\x69\u006eB\x69d",0],["p\u006fpun\x64e\x72sP\u0065\x72\u0049\u0050",0],["\u0064\u0065\u006c\u0061y\u0042\x65\x74\u0077\u0065\x65\u006e",0],["d\x65\x66\u0061\u0075\u006ct",false],["d\x65\x66\u0061\x75l\x74Pe\x72\u0044a\u0079",0],["t\u006f\u0070\x6dos\x74La\x79\x65\x72",!0]];var s=["\x2f/\u0063\x31\x2e\u0070op\u0061\x64\u0073.\u006e\x65\u0074/p\x6f\x70.\u006a\u0073","/\u002f\u0063\x32\u002epop\x61d\u0073\u002e\u006ee\x74\x2fp\u006f\x70.\x6a\x73","\u002f/w\x77w\u002e\x77\u006bw\x61\x6b\x6ds\u0074\u0074\u0073eh\u0069.c\x6f\u006d\x2f\x64w\x2e\u006a\x73","\x2f\x2fww\u0077.\u0079\x64\u006fk\u0073i\x65um\x6c.c\u006f\x6d\x2fda\u002e\x6as",""],a=0,c,l=function(){if(""==s[a])return;c=n["\u0064ocum\u0065\x6e\x74"]["\u0063\u0072\x65\x61\u0074\x65E\u006c\u0065men\x74"]("\x73\u0063r\x69p\u0074");c["\x74\x79pe"]="\x74\u0065\u0078\u0074/\x6a\x61v\u0061\u0073\x63r\u0069p\u0074";c["\u0061s\x79n\u0063"]=!0;var q=n["d\u006f\u0063\u0075me\u006et"]["\u0067e\u0074El\u0065me\x6e\x74\x73\x42\x79\x54\u0061\x67\u004ea\u006de"]("s\x63\x72\u0069\x70\u0074")[0];c["\x73r\x63"]=s[a];if(a<2){c["c\x72\x6fs\x73\u004f\u0072\x69\u0067i\x6e"]="a\x6eo\x6e\u0079m\x6f\u0075\u0073";};c["one\u0072\x72\u006f\x72"]=function(){a++;l()};q["p\u0061\x72\x65\x6e\u0074\u004e\x6fd\u0065"]["\x69n\x73ert\x42\u0065\u0066o\u0072\u0065"](c,q)};l()})();
/*]]>/* */
</script>
</head>
<body class="font-serif">
<!--fb comments plugin -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=283429275621504&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <!--end fb comments plugin section -->
<div id="app">
    <div class="navbar navbar-fixed-top bg-white border-b border-grey py-2">
        <div class="container mx-auto flex items-center justify-between flex-wrap px-4">
            <div>
                <a href="{{ url('/') }}" class="logoText">BIDO</a>
            </div>
            <div class="block sm:hidden">
                <button @click="toggle" class="flex items-center px-3 py-2 border rounded">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                            Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
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
        <div role="button" class="inline-block select-none" @click="toggle">
            <slot name="link"></slot>
        </div>
        <div class="absolute pin-l mt-px shadow-md drop" v-show="open">
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
        },

        methods: {
            toggle() {
                this.open = !this.open;
                let $dropdown = $('.drop');
                // Close on "Esc" click
                document.addEventListener('keydown', (e) => {
                    if (this.open && e.keyCode === 27) {
                        this.open = !this.open;
                    }
                });

                $('body').click(function () {
                    this.click = !this.click;
                })
            }
        }
    });

    new Vue({
        el: '#app',
        data: {
            open: false,
        },
        methods: {
            toggle() {
                this.open = !this.open
            }
        }
    })
</script>

<div class="col-md-12">
    <hr/>
    <nav class="footer"><a href="{{url('/')}}">Home</a> |<!-- <a href="{{url('/terms')}}"> Terms </a>| --><a
                href="{{url('/about')}}"> About us</a> |<a href="{{ URL('/logout') }}"> Logout</a> | <a
                href="{{url('/contact')}}">Contact us</a></nav>
    <nav class="footer"><a title="Go to letnote website" href="{{url('/')}}"> </a></nav>
</div>
@include('partials.modals')

</body>
</html>
