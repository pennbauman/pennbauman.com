<?php 
	include "/home/valypfnd/php/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";

	$linkCode = URLVar("l");
	if ($linkCode != NULL) {
		$links = file_get_contents("links.txt");
		$links = explode("\n", $links);
		for ($i = 0; $i < count($links); $i++) {
			$links[$i] = explode("~", $links[$i]);
			if ($links[$i][0] == $linkCode) {
				header("Location: ".$links[$i][1]);
			}
		}
	}
?>
<html>
	<head>
		<title>Penn Bauman</title>
		<link rel='icon' href='/files/images/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/hub.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/general.js'></script>
	</head>
	<body>
		<?php
			//include "/home/valypfnd/php/pennbauman/std_header_navbar.php";
		?>
		<div id="header">
			<h1>Penn Bauman</h1>
		</div>
		<div id="navbar">
			<a href="/pgm/">Programs</a>
			<a href="/games/">Games</a>
			<a href="/about/">About</a>

		</div>

		<div id="content">
			
			<!--img src="/files/images/bella_wag.gif"/-->
		</div>
		<?php
			//include "/home/valypfnd/php/pennbauman/std_footer.php";
		?>
		<div id="footer">
			<a href='https://gitlab.com/pennbauman/dnd-site'>\"Code\"</a> by <a href='http://pennbauman.com'>Penn Bauman</a> &copy; 2018 - <a href='mailto:penn.bauman@gmail.com'>Contact</a>
		</div>
	</body>
</html>