<!DOCTYPE html>
<html lang="en">
<head>
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
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <!--<link href="/css/app.css" rel="stylesheet">-->
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
<meta name="msapplication-TileColor" content="">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    </head>
<body>
<div id="header"> 
<nav  class="navbar navbar-default navbar-static-top">
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
                    <p class="logoText">BIDO</p>
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

@include('partials.errors')

    </nav>
</div>

    @yield('content')
      
        <div class="col-md-12">
        <hr/>
    <nav class="footer"><a href="{{url('/')}}">Home</a> |<a href="{{url('/terms')}}"> Terms </a>|<a href="{{url('/about')}}"> About us</a> | <a href="{{url('/contact')}}">Contact us</a></nav>
 <nav class="footer"><a title="The bido team" href="{{url('/')}}">Bido Team </a></nav>
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
    $('#commentID').load(" #commentID");
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


function postLike(event)
{   event.preventDefault();
    var target = event.target || event.srcElement;
    var id = event.target.id;
   $.ajax({
    url: "{{url('ajax-post-like')}}",
    type: 'GET',
    data: {id:id},
    success:function(){
   $('#likeBox').load(" #likeBox"); 
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



function countView(event)
{   var target = event.target || event.srcElement;
    var id = event.target.id;
   $.ajax({
    url: "{{url('count-view')}}",
    type: 'GET',
    data: {id:id},
     
    });
}

/**
* This method handles the autocomplete for 
* the home pages and search page
*
*/
function autocomplet(){
        var keyword = $('#search').val();

    if (keyword != '') {
        $.ajax({
            url: "{{ url('/autosuggest') }}",
            type: 'GET',
            data: {keyword:keyword, type:type},
            success:function(data){
            $('#content').show();
            $('#content').html(data);
            }
  });
       } else {

    $('#content').hide();
 }
     }


/**
* This method handles the autocomplete for check
* user name availabilty
* the home pages and search page
*
*/
function checkUnique(){
    var keyword = $('#user-name').val();
    if (keyword != '') {
        $.ajax({
            url: "{{ url('/check-availability') }}",
            type: 'GET',
            data: {keyword:keyword, type:type},
            success:function(data){
            $('#content').show();
            $('#content').html(data);
            }
  });
       } else {

    $('#content').hide();
 }
     }



$('#user-name').onkeyup(
var keyword = $('#user-name').val();

 if (keyword != '') {
    $.ajax({
            url: "{{ url('/check-availability') }}",
            type: 'GET',
            data: {keyword:keyword, type:type},
            success:function(data){
            $('#content').show();
            $('#content').html(data);
            }
  });
       } else {

    $('#content').hide();
 });

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
            data: {keyword:keyword, type:type},
            success:function(data){
            $('#content').show();
            $('#content').html(data);
            }
  });
       } else {

    $('#content').hide();
 });

</script>
</body>
</html>
