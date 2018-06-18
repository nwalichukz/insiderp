<!DOCTYPE html>
<head>
<title>Signup notification </title>
</head>
<body style="font-size:1.4em; align:center; background:#EEE;">
<center>
	<div style="width:800px; background:#fff; ">
		<h2 style="background:#0000CD; color:#FFF; height:38px; padding: 0 0 0 10px">Job Offer Notification </h2>
		<div style="padding: 0 10px 10px 10px;">
		<p style="text-align:justify;">
			An offer for <strong> {{$job_name}} </strong> has been made to you for <strong>{{$amount}} </strong>. <br/>
			The job is expected to be completed within {{$duration}} . And we urge you examine it properly
			before taking any further step like accepting or declining. Thanks
			</p>
			
			<br/>
			<h3 style="font-style:italic; font-size:1.4em; text-align:center;">Bido Team</h3>
		</div>

	</div>
	</center>
</body>

</html>
