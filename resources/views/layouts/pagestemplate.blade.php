<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="A community of users generate content news site and a discussion forum">
<meta name="keywords" content="news, politics, latest news, sports news, discussion forum, entertainment, president buhari, carTalk,
religious news, wolrd news, Dating and romance, nigerian senate, local news, trending posts, newspaper review, daily sun, vanguard news paper
 penTalk, jokes and comedy, penTalk Debate, penTalk articles, pentalk ask, penTalk answer, PenTalk Share">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title> 
    @if(!empty($title))
	    {{ $title }}
		@else
		Pentalk
		@endif
</title>
    <!-- Styles -->
     <script src="{{ URL('js/jquery.js') }}" type="text/Javascript"> </script>
     <script src="{{ URL('bootstrap/js/bootstrap.min.js') }}" type="text/Javascript"> </script>
      <script src="{{ URL('js/orientScript.js') }}" type="text/Javascript"> </script>
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <!--<link href="/css/app.css" rel="stylesheet">-->
     <link href="{{asset('css/orientStyle.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav id="header" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                <!--<img class="logoImg" src="{{asset('images/logo/orientLogo.jpg')}}" />-->
                 <p class="logoText">Pen<span style="color:#FFA500;">Talk</span></p>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
               @include('partials.nav')
            </div>
        </div>
    <div class="successMsg col-md-4 col-lg-4 center-block">

</div>

    </nav>

    @yield('content')

    <!-- Scripts -->
    <div class="col-md-12">
<hr/>
<nav class="footer"><a href="{{url('/')}}">Home</a> |<a href="{{url('/terms')}}"> Terms </a>|<a href="{{url('/about')}}"> About us</a> | <a href="{{url('/contact')}}">Contact us</a></nav>
 <nav class="footer"><a title="Go to letnote website" href="https://www.letnote.com.ng">Developed by Letnote </a></nav>
   </div>

    @include('partials.modals')
   <script>
    $('#flash-overlay-modal').modal();

    $('div.alert').not('.alert-important').delay(6000).fadeOut(350);
    ( function( $ ) {

        $( '.swipebox' ).swipebox();

    } )( jQuery );

    function postComment(event){
event.preventDefault();
var form = document.getElementById('commentForm');
var formData = new FormData(form);
var post_id = $('#postid').val();
var comment = $('#commentarea').val();
$.ajax({
    url: "{{ url('/ajax-post-comment') }}",
    method: 'GET',
    data: {post_id:post_id, comment:comment},
    success:function(data){
    $('#commentBox').load(" #commentBox");
    },
        error:function(x,e) {
    if (x.status==0) {
        $('.status').hide();
        $('.successMsg').show();
       $('.successMsg').html('You are offline!!\n Please Check Your Network.').fadeOut(7000);
    } else if(x.status==404) {
        $('.status').hide();
        $('.successMsg').show();
       $('.successMsg').html('Requested URL not found.').fadeOut(6000);
    } else if(x.status==500) {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Internel Server Error.').fadeOut(6000);
    } else if(e=='parsererror') {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Error.\nParsing JSON Request failed.').fadeOut(6000);
    } else if(e=='timeout'){
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Request Time out.').fadeOut(6000);
    } else {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Unknow Error.\n'+x.responseText).fadeOut(8000);
    }
        },


    });
}

function postLike(event)
{   event.preventDefault();
    var target = event.target || event.srcElement;
    var id = event.target.id;
   $.ajax({
    url: "{{url('ajax-post-like')}}",
    type: 'GET',
    data: {id:id},
    success:function(){
   $('#postBox').load(" #postBox"); 
    },
        error:function(x,e) {
    if (x.status==0) {
        $('.status').hide();
        $('.successMsg').show();
       $('.successMsg').html('You are offline!!\n Please Check Your Network.').fadeOut(6000);
    } else if(x.status==404) {
        $('.status').hide();
        $('.successMsg').show();
       $('.successMsg').html('Requested URL not found.').fadeOut(6000);
    } else if(x.status==500) {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Internel Server Error.').fadeOut(6000);
    } else if(e=='parsererror') {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Error.\nParsing JSON Request failed.').fadeOut(6000);
    } else if(e=='timeout'){
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Request Time out.').fadeOut(6000);
    } else {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Unknow Error.\n'+x.responseText).fadeOut(5000);
    }
        },


    });
}

</script>
</body>
</html>
