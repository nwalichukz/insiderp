<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
  


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    @if(!empty($pg))
        <meta name="description"
              content="{!!strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($trend->post, 150))))!!}">
    @else
        <meta name="description" content="">
    @endif
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="google-site-verification" content="r-KmW3txqodD-zMvufoJWY8MbPWnzqoHD1vjHoW5GV0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if(!empty($title))
            {{ title_case($title) }} - InsiderPerspective
        @elseif(!empty($fulltitle))
            {{ title_case($fulltitle) }} - InsiderPerspective
        @else
            InsiderPerspectiver

        @endif
    </title>
    <!-- Fonts -->
    <!-- Styles -->

    <link href="{{asset('css/swiper.min.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" type="text/Javascript"></script>

    <script src="{{ asset('js/swiper.min.js') }}" type="text/Javascript"></script>

    <script src="{{ asset('js/orientScript.js') }}" type="text/Javascript"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/b.css')  }}" type="text/css">
    <link href="{{ asset('css/bido.css') }}" rel="stylesheet">
    <link href="{{asset('css/orientStyle.css')}}" rel="stylesheet">
    <link href="{{asset('css/fonts.min.css')}}" rel="stylesheet">


    <!-- Fonts -->
   
<!-- PopAds.net Popunder Code for www.bido.com.ng | 2018-10-19,2926617,0,0 -->


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
                InsiderPerspective </a>
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

    @yield('content')

</div>

<div class="col-md-12">
    <hr/>
    <nav class="footer"><a href="{{url('/')}}">Home</a> |<!-- <a href="{{url('/terms')}}"> Terms </a>| --><a
                href="{{url('/about')}}"> About us</a> | <a href="{{url('/contact')}}">Contact us</a></nav>
    <nav class="footer"><a title="follow us of facebook" href="https://www.facebook.com/insiderperspective">Follow us facebook </a></nav>
</div>
<script type="text/x-template" id="dropdown-link-template">
    <div class="relative drop">
        <div role="button" class="inline-block select-none" @click="toggle">
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
        },
        methods: {
            toggle() {
                this.open = !this.open;
                let $dropdown = $('.drop');
                document.addEventListener('keydown', (e) => {
                    if (this.open && e.keyCode === 27) {
                        this.open = !this.open;
                    }
                });

            }
        },
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
<script src="{{ asset('js/modals.js') }}"></script>
<script>
    $('#flash-overlay-modal').modal();

    $('div.alert').not('.alert-important').delay(6000).fadeOut(350);
    (function ($) {

        $('.swipebox').swipebox();

    })(jQuery);

    function postComment(event) {
        event.preventDefault();
        var form = document.getElementById('commentForm');
        var formData = new FormData(form);
        var post_id = $('#postid').val();
        var comment = $('#commentarea').val();
        $.ajax({
            url: "{{ url('/ajax-post-comment') }}",
            method: 'GET',
            data: {post_id: post_id, comment: comment},
            success: function (data) {
                $('#commentID').load(" #commentID");
            },
            error: function (x, e) {
                if (x.status == 0) {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('You are offline!!\n Please Check Your Network.').fadeOut(600);
                } else if (x.status == 404) {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Requested URL not found.').fadeOut(6000);
                } else if (x.status == 500) {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Internel Server Error.').fadeOut(6000);
                } else if (e == 'parsererror') {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Error.\nParsing JSON Request failed.').fadeOut(6000);
                } else if (e == 'timeout') {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Request Time out.').fadeOut(6000);
                } else {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Unknow Error.\n' + x.responseText).fadeOut(50000);
                }
            },

        });
    }


    function postLike(event) {
        event.preventDefault();
        var target = event.target || event.srcElement;
        var id = event.target.id;
        $.ajax({
            url: "{{url('ajax-post-like')}}",
            type: 'GET',
            data: {id: id},
            success: function () {
                $('#likeBox').load(" #likeBox");
            },
            error: function (x, e) {
                if (x.status == 0) {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('You are offline!!\n Please Check Your Network.').fadeOut(6000);
                } else if (x.status == 404) {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Requested URL not found.').fadeOut(6000);
                } else if (x.status == 500) {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Internel Server Error.').fadeOut(6000);
                } else if (e == 'parsererror') {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Error.\nParsing JSON Request failed.').fadeOut(6000);
                } else if (e == 'timeout') {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Request Time out.').fadeOut(6000);
                } else {
                    $('.status').hide();
                    $('.successMsg').show();
                    $('.successMsg').html('Unknow Error.\n' + x.responseText).fadeOut(5000);
                }
            },

        });
    }

    function countView(event) {
        var target = event.target || event.srcElement;
        var id = event.target.id;
        $.ajax({
            url: "{{url('count-view')}}",
            type: 'GET',
            data: {id: id},

        });
    }

    /**
     * This method handles the autocomplete for
     * the home pages and search page
     *
     */
    function autocomplet() {
        $('#btnsearch').show();
        var keyword = $('#search').val();

        if (keyword != '') {
            $.ajax({
                url: "{{ url('/autosuggest') }}",
                type: 'GET',
                data: {keyword: keyword, type: type},
                success: function (data) {
                    $('#content').show();
                    $('#content').html(data);
                }
            });
        } else {

            $('#content').hide();
            $('#btnsearch').hide();
        }
    }


    /**
     * This method handles the autocomplete for check
     * user name availabilty
     * the home pages and search page
     *
     */
    function checkUnique() {
        var keyword = $('#user-name').val();
        if (keyword != '') {
            $.ajax({
                url: "{{ url('/check-availability') }}",
                type: 'GET',
                data: {keyword: keyword, type: type},
                success: function (data) {
                    $('#content').show();
                    $('#content').html(data);
                }
            });
        } else {

            $('#content').hide();
        }
    }


    $('#user-name').onkeyup(
        $('#btnsearch').show();
    var keyword = $('#user-name').val();

    if (keyword != '') {
        $.ajax({
            url: "{{ url('/check-availability') }}",
            type: 'GET',
            data: {keyword: keyword, type: type},
            success: function (data) {
                $('#content').show();
                $('#content').html(data);
            }
        });
    } else {

        $('#content').hide();
    }
    )
    ;

    /**
     * This function handles the set item for the autosuggest
     *  when clicked it sets the item to the input text used for the search
     */
    function set_item(item) {
        // change input value
        $("#search").val(item);
        // hide proposition list
        $("#content").hide();
    };

    // autocomplete

    $('#search').onkeyup(
    var keyword = $('#search').val();

    if (keyword != '') {
        $.ajax({
            url: "{{ url('/autosuggest') }}",
            type: 'GET',
            data: {keyword: keyword, type: type},
            success: function (data) {
                $('#content').show();
                $('#content').html(data);
            }
        });
    } else {

        $('#content').hide();
    }
    )
    ;

</script>
</body>
</html>
