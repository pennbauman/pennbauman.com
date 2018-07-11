<?php 
	include $_SERVER["DOCUMENT_ROOT"]."/files/php/std.php";
?>
<!DOCTYPE html>
	<head>
		<title>Color Tester</title>
		<link rel='icon' href='/files/images/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<?php
			$color = URLVar("color");
			if ($color != NULL) {
				echo "<style type='text/css'> body { background:#";
				echo $color;
				echo "} </style>";
			}
		?>
	</head>
	<body>
		<div id="content_box">
			<h1>Color Tester</h1>
			<form onsubmit="color()">
				Hex Color: <br/>
				#<input type="text" name="color"> 
				<br/><br/>
				<input type="submit" value="Enter">
			</form>
		</div>
	</body>
</html>