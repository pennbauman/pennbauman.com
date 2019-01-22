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
			include "/home/valypfnd/php/pennbauman/std_header_navbar.php";
		?>
		<div id="content">
			<!--img src="/files/images/bella_wag.gif"/-->
			<?php 
				include "/home/valypfnd/php/lorem_ipsum.php";
			?>
		</div>
		<div id='footer'>
			<!--table>
				<tr>
					<th>Pages</th>
					<th>Contact Information</th>
				</tr>
				<tr>
					<td><a href="/resume/">Resume</a></td>
					<td></td>
				</tr>
				<tr>
					<td><a href="/story/">My Story</a></td>
					<td>Phone: <a href='tel:703-963-2729'>703-963-2729</a></td>
				<tr>
				<tr>
					<td><a href="/projects/">Projects</a></td>
				<tr>
			</table-->
		</div>
		<?php
			include "/home/valypfnd/php/pennbauman/std_footer.php";
		?>
	</body>
</html>