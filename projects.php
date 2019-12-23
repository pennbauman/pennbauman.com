<?php 
	include_once "insert.php";
?>
<!DOCTYPE html><html>
	<head>
		<title>Projects - Penn Bauman</title>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php
			insertHTML("header_navbar");
		?>
		<div id="content">
			<h1>Projects</h1>
			<span style="text-align:center;font-size:1.2em">
				<p>
					<a href="/projects/monte-carlo">Monte-Carlo Pi Calculator</a>
					<br/>
					<br/>
					<a href="/projects/morse-code">Morse Code Typewriter</a>
					<br/>
					<br/>
					<a href="/projects/periodic-table">Interactive Periodic Table</a>
				</p>
			</span>
		</div>
		<?php
			insertHTML("footer");
		?>
	</body>
</html>
