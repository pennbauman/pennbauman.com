<?php ?>
<!DOCTYPE html><html lang='en-US'>
	<head>
		<title>Monte Carlo PI Generator - Penn Bauman</title>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name='description' content='Javascript Monte Carlo simulation of pi.'/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<link rel='shortcut icon' href='/files/img/pi_favicon.png'>
		<link rel='stylesheet' href='/files/css/monte-carlo.css'>
		<script src='/files/js/monte-carlo.js'></script>
	</head>
	<body onload="setup();return false;">
		<canvas id="draw"></canvas>
		<div id="display">
			<h1 id="title"> Monte Carlo PI Generator </h1> <!-- π -->
			<p>
				<b>PI: </b><span id="pi">0.0000000000000000</span> <br/>
				<b>Points Used: </b><span id="n_points">0</span> <br/>
			</p>
			<div id="buttons">
				<div onclick="runState()" id="run_button" class="button">RUN</div>
				<div onclick="reset()" class="button">RESET</div>
			</div>
			<p id="explination">
				The Monte Carlo method for calculating pi uses the proportion of points within a circle to the points within its curcumscribed square. This proportion is approximated using points that are randomly generated in the square, and then their distance from the center of the circle is calculated to determine if they are in the circle. This proportion becomes more accurate the more points are calculated. 
				<br/><br/>
				When actually calculated, this proportion is only one fourth of pi (proof below) and because its is a proportion it can be calucated using only a fraction of the circle, such as a quarter, as it is here. 
				<br/>

				<img id="proof" src="/files/img/monte_carlo_proof.png">

				<br/>
				C = number of points within the circle, S = the number of within the curcumscribed square, r = the radius of the circle
			</p>
		</div>
	</body>
</html>
