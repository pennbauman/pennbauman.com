<!DOCTYPE html>
	<head>
		<title>Color Tester</title>
		<link rel='icon' href='/files/img/sys_favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
		<style type='text/css'>
			<?php
				//$color = $_GET("color");
				//if ($color != NULL) {
					//if (substr($color, 0, 1) != "#") {
						//echo "[[".substr($color, 0, 1)."]]";
						//$color = "#".$color;
					//}
					//echo "body { background:";
					//echo $color;
					//echo "} ";
				//}
			?>
			#content_box {
				position:fixed;
				top:0;
				left:0;
				width:100%;
				padding:2rem;
			}
		</style>
		<script>
			function colorPage() {
				console.log("colored");
				console.log(document.getElementById("color-code").value);
				console.log(document.body.style.backgroundColor);
				return false;
			}
		</script>
	</head>
	<body>
		<div id="content_box">
			<h1>Color Tester</h1>
			<form action="#" onsubmit="colorPage();return false">
				Hex Color: <br/>
				#<input autofocus id="color-code" type="text" name="color" value="">
				<br/><br/>
				<input type="submit" value="Enter">
			</form>
			<?php insertHTML("sys_footer"); ?>
		</div>
	</body>
</html>
