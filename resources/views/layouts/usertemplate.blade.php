<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!empty($title))
	    {{ $title }}
		@else
		PenTalk-Dashboard
		@endif</title>

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
       $('.successMsg').html('You are offline!!\n Please Check Your Network.').fadeOut(600);
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
        $('.successMsg').html('Unknow Error.\n'+x.responseText).fadeOut(50000);
    }
        },


    });
}

/**
* This function post a like
*
*/
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
</head>
<body>
    <div id="header">
    <nav  class="navbar navbar-default navbar-static-top position-absolute">
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
                     <p class="logoText">BIDO<span style="color:#FFA500;"></span></p>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                @include('partials.nav')
                <!-- Right Side Of Navbar -->

            </div>
        </div>
<div class="successMsg col-md-4 col-lg-4 center-block">

</div>
@include('partials.errors')
    </nav>
</div>
<br/>

     <div id="sidediv" >
     <div id="panel" class="panel hidden-xs col-md-3">
      <ul>
         <nav class="footer1">  <a href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Trending <a/> </nav>
            <nav class="footer1">  <a href="#" data-toggle="modal" data-target="#addPostModal" data-placement="top" title="post to public">Add Post<a/> </nav>
           <nav class="footer1"> <a href="#" data-toggle="modal" data-target="#inviteFriendModal" data-placement="top" title="invite a friend to join pentalk">Invite a friend <a/></nav> 
           <nav class="footer1"> <a href="#" data-toggle="modal" data-target="#changePasswordModal" data-placement="top" title="change your password">change password <a/></nav> 
           <nav class="footer1"> <a href="{{url(Auth::user()->name.'/my-post/'.Auth::user()->id)}}" title="view all post by me">My Posts <a/></nav> 
              <nav class="footer1">   <a href="#" data-toggle="modal" data-target="#editProfileModal" data-placement="top" title="Edit your profile">Edit Profile<a/></nav>
                <nav class="footer1">   <a href="#" data-toggle="modal" data-target="#addUserImageModal" data-placement="top" title="Edit your profile">Add Profile Image<a/></nav>
                @if(Auth::check())
               @if(Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor')
                                <nav class="footer1"> <a href="{{url('/blocked-posts')}}">View blocked posts</a> </nav>
                                <nav class="footer1"> <a href="{{url('/view-users')}}">View users</a> </nav>
                                <nav class="footer1"> <a href="{{url('/view-blocked-users')}}">View blocked users</a> </nav>
                                 <nav class="footer1"> <a href="#" data-toggle="modal" data-target="#addPostModal" data-placement="top" title="post to public">Add Article</a> </nav>
                                <nav class="footer1">
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </nav>
                                @endif
                         @endif

             </ul>
             </div>
             </div>
             </div>
         </div>
        <div class="col-md-4 col-lg-4 center-block">
    @include('partials.errors')
        </div>

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <div class="col-md-12">
<hr/>
<nav class="footer"><a href="{{url('/')}}">Home</a> |<a href="{{url('/terms')}}"> Terms </a>|<a href="{{url('/about')}}"> About us</a> |<a href="{{ URL('/logout') }}"> Logout</a> | <a href="{{url('/contact')}}">Contact us</a></nav>
 <nav class="footer"><a title="Go to letnote website" href="{{url('/')}}"> </a></nav>
   </div>
@include('partials.modals')
    <script>
    $('#flash-overlay-modal').modal();

    $('div.alert').not('.alert-important').delay(6000).fadeOut(350);
    ( function( $ ) {

        $( '.swipebox' ).swipebox();

    } )( jQuery );

$('#commentForm').keydown(function(e) {
var key = e.which;
if (key == 13) {
// As ASCII code for ENTER key is "13"
$('#commentForm').submit(); // Submit form code
}
});

</script>
</body>
</html>
