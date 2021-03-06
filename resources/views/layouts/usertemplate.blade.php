<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
   

    <script src="{{url('ckeditor/ckeditor.js')}}"></script>

    <meta name="description" content="InsiderPerspective is the best you can get insider perspective of different topics.">
    <meta name="keywords" content="InsiderPerspective">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" size="50x50" href="{{ asset('images/favicon/favicon.ico') }}">
<link rel="apple-touch-icon" size="32x32" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
<link rel="apple-touch-icon" size="32x32" href="{{ asset('images/favicon/andriod-chrome.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!empty($title))
            {{ $title }}
        @else
            InsiderPerspective - @if(!empty(Auth::check())){{Auth::user()->name}} @else Dashboard @endif
        @endif</title>

    <!-- Styles -->
    <!-- Styles -->
    <link href="{{asset('css/swiper.min.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" type="text/Javascript"></script>

    <script src="{{ asset('js/swiper.min.js') }}" type="text/Javascript"></script>

    <script src="{{ asset('js/orientScript.js') }}" type="text/Javascript"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/b.css')  }}" type="text/css">
    <link href="{{ asset('css/bido.css') }}" rel="stylesheet">
    <link href="{{asset('css/orientStyle.css')}}" rel="stylesheet">
    <link href="{{asset('css/fonts.min.css')}}" rel="stylesheet">


    <!-- Scripts -->
   
    
    <meta name="msapplication-TileColor">
    <meta name="msapplication-TileImage">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

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
                <a href="{{ url('/') }}" class="logoText" style="font-size:2em; color:#000; font-family:cursive; font-weight:bold;">
                InsiderPerspective</a>
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
    <nav class="footer"><a title="Go to home page" href="{{url('/')}}"> </a></nav>
</div>
@include('partials.modals')

</body>
</html>
