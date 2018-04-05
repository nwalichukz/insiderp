<div class="right-sideabr">
	<div class="inner-box">
		<h4>Account</h4>
		<ul class="lest item">
			<?php
			$user = Auth::user();
			$name = str_replace(' ', '-', strtolower($user->name));
			?>
			<li><a class="active" href="{{ url('user/'.$name) }}">Dashboard</a></li>
			<li><a href="#+">Ongoing Job</a></li>
			<li><a href="{{ url('offers') }}">Job Offers <span class="notinumber">3</span></a></li>
			<li><a href="{{ url('jobs-completed') }}">Jobs Completed</a></li>
			<li><a href="{{ url('messages') }}">Messages <span class="notinumber">10</span></a></li>
		</ul>
		<h4>Job</h4>
		<ul class="lest item">
			<li><a href="{{ url('service') }}">My Service<span class="notinumber"> 1</span></a></li>
			<li><a href="{{ url('manage-applications') }}">Manage Applications</a></li>
		</ul>
		<ul class="lest">
			<li><a href="">Change Password</a></li>
			<li><a href="">Sing Out</a></li>
		</ul>
	</div>
</div>