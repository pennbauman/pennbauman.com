<?php
	include "/home/valypfnd/php/std.php";
	$url = URLVar("s");
?>
<!DOCTYPE html><html>
	<head>
		<title>Statistics Generator - Penn's D&amp;D</title>
		<link rel='icon' href='/files/img/favicon.png'>
		<link rel='stylesheet' type='text/css' href='/files/css/hub.css'>
		<link rel='stylesheet' type='text/css' href='/files/css/stats.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<!--script src='/files/js/general.js'></script-->
		<script src='/files/js/stats.js'></script>
	</head>
		<?php
			if ($url == "d20") {
				echo "<body onload='d20();return false;'>";
			} elseif ($url == "4d6") {
				echo "<body onload='fourDice();return false;'>";
			} elseif ($url == "std") {
				echo "<body onload='standard();return false;'>";
			} elseif ($url =="point") {
				echo "<body onload='valueSetup();pointReset();return false;'>";
			} else {
				echo "<body onload='return false;'>";
			}
			insertHTML("header_navbar");
		?>
		<div id="content">
			<h1>D&amp;D Statistics Generator</h1>
			<div id="generator_box">
				<div id="stat_box">
					<?php
						if ($url == "point") {
							echo "<div id='points_display'>Available points: <span id='available_points'>27</span></div>";
							$i = 0;
							$statNames = ["Str", "Dex", "Con", "Int", "Wis", "Cha"];
							while ($i < 6) {
								echo "<div class='pstat'><p>".$statNames[$i]."</p><select id='pstat".$i."' onchange='pointChange(this.value, ".$i.")'>";
								$q = 6;
								while ($q < 16) {
									echo "<option id='pstat".$i."_".$q."' value='".$q."'";
									if ($q == 8) {
										echo " selected";
									}
									echo ">".$q."</option>";
									$q++;
								}
								echo "</select></div>\n";
								$i++;
							}
						} else {
							echo "<div id='stat1' class='stat'>X</div>";
							echo "<div id='stat2' class='stat'>X</div>";
							echo "<div id='stat3' class='stat'>X</div>";
							echo "<div id='stat4' class='stat'>X</div>";
							echo "<div id='stat5' class='stat'>X</div>";
							echo "<div id='stat6' class='stat'>X</div>";
						}
					?>
				</div>
				<div id="button_box">
					<div id='button_top'><p>Pick Generation Method</p></div>
					<?php
						if ($url == "point") {
							echo "<a href='/stats?s=d20' id='d20_button' class='type_button'> 1d20 </a>";
							echo "<a href='/stats?s=4d6' id='4d6_button' class='type_button'> Top 3 of 4d6 </a>";
							echo "<a href='/stats?s=std' id='std_button' class='type_button'> Standard Set </a>";
							echo "<div onclick='pointReset();return false;' id='point_button' class='type_button'> Reset Points </div>";
						} else {
							echo "<div onclick='d20();return false;' class='type_button'> 1d20 </div>";
							echo "<div onclick='fourDice();return false;' id='4d6_button' class='type_button'> Top 3 of 4d6 </div>";
							echo "<div onclick='standard();return false;' id='std_button' class='type_button'> Standard Set </div>";
							//echo "<div onclick='reset();return false;' id='point_button' class='type_button'> Reset </div>";
							echo "<a href='/stats?s=point' id='point_button' class='type_button'> Point Buy </a>";
						}
					?>
				 </div>
			</div>
		</div>
		<?php insertHTML("footer") ?>
	</body>
</html>
