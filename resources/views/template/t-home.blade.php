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


    <meta name="description" content="A social tool that allow users post news, opinions, articles, questions and get involved in discussing
those issues that affect us and our society especially in Nigeria">
    <meta name="keywords" content="politics, latest news, sports news, discussion forum, entertainment, president buhari, carTalk,
religious news, wolrd news, Dating and romance, nigerian senate, local news, trending posts, newspaper review, daily sun review,
 Bido, jokes and comedy, Bido Debate, Bido articles, bido ask, bido answer, bido Share">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@if(!empty($title))
            {{ $title }}
        @elseif(!empty($fulltitle))
            {{ $fulltitle }}
        @else
            Bido - Post news, opinions, articles, questions, get involved your views matter and help make our society better!
        @endif</title>
    <!-- Fonts -->
    <!-- Styles -->
    <script src="{{ URL('js/jquery.js') }}" type="text/Javascript"> </script>
    <script src="{{ URL('bootstrap/js/bootstrap.min.js') }}" type="text/Javascript"> </script>
    <script src="{{ URL('js/orientScript.js') }}" type="text/Javascript"> </script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/b.css')  }}" type="text/css">
    <link href="{{ asset('css/bido.css') }}" rel="stylesheet">
    <link href="{{asset('css/orientStyle.css')}}" rel="stylesheet">
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
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
</head>
<body class="bg-grey-light text-sm">
    <div id="app" class="">
        <div class="navbar navbar-fixed-top bg-white border-b border-grey shadow py-3">
            <div class="container mx-auto flex items-center justify-between">
                <div>
                    <p class="logoText">BIDO</p>
                </div>
                <div>
                    @include('template.nav')
                </div>
            </div>
        </div>
        <div class="mt-16">
            <div class="container mx-auto flex items-center">
                <div class="w-1/4"></div>
                <div class="w-1/2"></div>
                <div class="w-1/4"></div>
            </div>
        </div>
    </div>
</body>
</html>