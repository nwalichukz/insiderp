<!DOCTYPE html>
<head>
<title>Signup notification </title>
</head>
<body style="font-size:1.4em; align:center; background:#EEE;">
<center>
	<div style="width:800px; background:#fff; ">
		<h2 style="background:#0000CD; color:#FFF; height:38px; padding: 0 0 0 10px">Welcome {{name}}!!! </h2>
		<div style="padding: 0 10px 10px 10px;">
		<p style="text-align:justify;">
			Thanks for signing up on Bido.. <br/>
			 Please follow the link to verify your email address to enjoy
	        the full experience on Bido. Enjoy !!!
			</p>
			<hr/><strong><p style="text-align:justify;">Your password</strong>: {{$password}}</p> <hr/>
			<p>
				
			</p>
			<center><a href="http://www.bido.com.ng/verify-email/{{$id}}/{{$token}}" title="click to verify your account"><button style="background:#0000FF;">Click to verify your account</button> </a></center>
			<br/>
			<h3 style="font-style:italic; font-size:1.4em; text-align:left;">Bido Team</h3>
		</div>

	</div>
	</center>
</body>

</html>
	               
	    