<!DOCTYPE html>
<html>
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>@yield('title')</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="description" content="What do you want done? Find the skill that best suits your demand from the very
 selected best here!!!">
<meta name="keywords" content="web developer, graphic designer, tailors, dj, mc, dancers, writers, authors,
cooks, entrepreneur, programmer, logo designer, makeup artist, artists, plumbers, gen man,
 mechanic, electrician, technician, architects,
">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="assets/img/favicon.png">

<!-- CSS
================================================== -->

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/jasny-bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/material-kit.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/color-switcher.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/extras/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/extras/owl.carousel.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/extras/owl.theme.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/extras/settings.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors/red.css') }}" media="screen" />
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
<div id="wrapper">
	@yield('content')
    
<!-- Back To Top Button -->
<a href="#" class="back-to-top">
	<i class="ti-arrow-up"></i>
</a>
<div id="loading">
	<div id="loading-center">
		<div id="loading-center-absolute">
			<div class="object" id="object_one"></div>
			<div class="object" id="object_two"></div>
			<div class="object" id="object_three"></div>
			<div class="object" id="object_four"></div>
			<div class="object" id="object_five"></div>
			<div class="object" id="object_six"></div>
			<div class="object" id="object_seven"></div>
			<div class="object" id="object_eight"></div>
		</div>
	</div>
</div>

</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('assets/js/jquery-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/material.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/material-kit.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>

<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(6000).fadeOut(350);
</script>

</body>
</html>