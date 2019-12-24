<?php 
	//include "/home/valypfnd/php/std.php";
?>
<!DOCTYPE html>
	<head>
		<title>Color Tester</title>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<style type='text/css'>
			<?php
				$color = URLVar("color");
				if ($color != NULL) {
					if (substr($color, 0, 1) != "#") {
						//echo "[[".substr($color, 0, 1)."]]";
						$color = "#".$color;
					}
					echo "body { background:";
					echo $color;
					echo "} ";
				}
			?>
			#content_box {
				position:fixed;
				top:0;
				left:0;
				width:100%;
				background:var(--black);
				padding:2rem;
			}
		</style>
	</head>
	<body>
		<div id="content_box">
			<h1>Color Tester</h1>
			<form>
				Hex Color: <br/>
				<input autofocus type="text" name="color" value="#"> 
				<br/><br/>
				<input type="submit" value="Enter">
			</form>
			<br/><a href="/">Home</a> - <a href="/sys/">System</a>
		</div>
	</body>
</html>
