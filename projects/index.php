<?php 
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";
?>
<html>
	<head>
		<title>Projects Penn Bauman</title>
		<link rel='icon' href='/files/images/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php
			include "/home/valypfnd/php/pennbauman/std_header_navbar.php";
		?>
		<div id="content">
			<h1>Projects</h1>
			<span style="align:center;font-size:1.5em">
				<p>
					<a href="/projects/monte-carlo/">Monte-Carlo Pi Calculator</a>
				</p>
				<p>
					<a href="/projects/morse-code/">Morse Code Typewriter</a>
				</p>
				<p>
					<a href="/projects/periodic-table/">Interactive Periodic Table</a>
				</p>
			</span>
		</div>
		<?php
			include "/home/valypfnd/php/pennbauman/std_footer.php";
		?>
	</body>
</html>