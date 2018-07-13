<?php 
	include "/home/valypfnd/php/std/std.php";
	include "/home/valypfnd/php/auth.php";
	include "/home/valypfnd/php/file_path.php";
	include "/home/valypfnd/php/get_site.php";

	if ($auth > 8) {
		echo "<!DOCTYPE html><head>";
		echo "<title>Test</title>";
		echo "<link rel='icon' href='/files/images/sys_favicon.png'>";
		echo "<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		echo "<script src='/files/js/general.js'></script>";
		echo "</head>\n<body>";

		echo "user: ".$username." (<a href='/account/logout.php".$returnLink."'>logout</a>)";
		echo "<h1>Test</h1>";

		echo $_SERVER["DOCUMENT_ROOT"];
		echo "<br/>";
		echo $currentSite;
		echo "<br/><br/>";

		echo "<p>h1</p>";
		$array1 = ["one", "two", "three"];
		$array2 = ["", "one", "two"];
		$array3 = [null, "one", "two"];
		echo "1:".implode(" | ", $array1)."<br/>";
		echo "2:".implode(" | ", $array2)."<br/>";
		echo "3:".implode(" | ", $array3)."<br/>";
		
		echo "<select id='pstat1' class='pstat'>";
		echo "<option value='8'>8</option>";
		echo "<option value='9'>9 (-1)</option>";
		echo "<option value='10'>10 (-2)</option>";
		echo "<option value='11'>11 (-3)</option>";
		echo "<option value='12'>12 (-4)</option>";
		echo "<option value='13'>13 (-5)</option>";
		echo "<option value='14'>14 (-7)</option>";
		echo "<option value='15'>15 (-9)</option>";
		echo "</select>";

		echo '<br/><br/><br/><a href="/">Home</a> - <a href="/sys/">System</a>';
		echo "</body></html>";
	} else {
		include "/home/valypfnd/php/auth_error.php";
	}
?>