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
				break;
			}
		}
	}
?>
<html>
	<head>
		<title>Penn Bauman</title>
		<link rel='icon' href='/files/images/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/general.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
	<body>
		<?php
			//include "/home/valypfnd/php/pennbauman/std_header_navbar.php";
		?>
		<div id="header">
			<a href="/"><h1>Penn Bauman</h1></a>
			<div id="navbar">
				<a href="/pgm/">Programs</a>
				<a href="/games/">Games</a>
				<a href="/about/">About</a>
			</div>
		</div>

		<div id="content">
			Hello World
			<!--img src="/files/images/bella_wag.gif"/-->
			<?php 
				include "/home/valypfnd/php/lorem_ipsum.php";
			?>
		</div>
		<?php
			include "/home/valypfnd/php/pennbauman/std_footer.php";
		?>
	</body>
</html>