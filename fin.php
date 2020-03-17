<?php
	include_once "auth.php";

	if ($sys['user']['auth_level'] < 9) {
		include "auth_error.php";
		exit;
	}
/*
fin_yearly
	year (int)
	month (int)
	cash (int)
	credit (int)
	checking (int)
	savings (int)
	stocks (int)
fin_monthy
	id (int)
	year (int)
	month (int)
	day (int)
	cash (int)
	credit (int)
	checking (int)
	type (int)
	desc (str)
*/

	$y_max = (int)date("Y");
	$y_min = 2018;
	if (isset($_GET['y']) && is_numeric($_GET['y'])) {
		$y = (int)$_GET['y'];
		if ($y < $y_min || $y > $y_max) {
			$y = $y_max;
		}
	} else {
		$y = $y_max;
	}
	if (isset($_GET['m']) && is_numeric($_GET['m'])) {
		$m = (int)$_GET['m'];
		if ($m > 12 || $m < 0) {
			$m = 0;
		}
	} else {
		$m = 0;
	}

	function printCell($col, $i, $format, $link="", $class="") {
		echo "<td class='$class";
		if ($col == 1) {
			echo " thick-left";
		}
		if ($col == 4) {
			echo " thick-left";
		}
		if ($col == 5) {
			echo " thick-left";
		}
		if ($col == 7) {
			echo " thick-left";
		}
		if ($col > 4) {
			echo " hideable";
		}
		if ($i == 0) {
			echo "'><a href='$link'>\$0</a></td>";
		} else {
			if ($i > 0) {
				if ($format) {
					echo " pos";
				}
				echo "'><a href='$link'>\$".number_format((float)($i/100), 2, '.', ',');
			} else {
				if ($format) {
					echo " neg";
				}
				echo "'><a href='$link'>-\$".number_format((float)($i/-100), 2, '.', ',');
			}
			echo "</a></td>";
		}
	}
	if (isset($_GET['ex'])) {
		if ($_GET['ex'] == "y") {
			$query = $pdo->prepare("SELECT * FROM fin_yearly ORDER BY year, month");
			$query->execute();
			foreach ($query as $row) {
				echo '"'.$row['year'].'",';
				echo '"'.$row['month'].'",';
				echo '"'.$row['cash'].'",';
				echo '"'.$row['credit'].'",';
				echo '"'.$row['checking'].'",';
				echo '"'.$row['savings'].'",';
				echo '"'.$row['stocks'].'"';
				echo "\n";
			}
			exit;
		} elseif ($_GET['ex'] == "m") {
			$query = $pdo->prepare("SELECT * FROM fin_monthly ORDER BY year, month, day, id");
			$query->execute();
			foreach ($query as $row) {
				echo '"'.$row['id'].'",';
				echo '"'.$row['year'].'",';
				echo '"'.$row['month'].'",';
				echo '"'.$row['day'].'",';
				echo '"'.$row['cash'].'",';
				echo '"'.$row['credit'].'",';
				echo '"'.$row['checking'].'",';
				echo '"'.$row['type'].'",';
				echo '"'.$row['description'].'"';
				echo "\n";
			}
			exit;
		}
	}
?>
<!DOCTYPE html><html>
	<head>
		<?php
			if ($m == 0) {
				echo "<title>Finances $y - Penn Bauman</title>";
			} else {
				echo "<title>Finances ".date("F", mktime(0, 0, 0, $m, 1, 0))." $y - Penn Bauman</title>";
			}
		?>
		<meta charset="UTF-8">
		<link rel='icon' href='/files/img/favicon.png'>
		<!--link rel='stylesheet' type='text/css' href='/files/css/general.css'-->
		<link rel='stylesheet' type='text/css' href='/files/css/backend.css'>
		<link rel='stylesheet' type='text/css' href='/files/font/DejaVu_Font.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/general.js'></script>
	</head>
		<?php
			echo "<body onload='document.getElementById(\"$y\").scrollIntoView()'>";
			//echo "<p>m $m<br/>y $y</p>";
			if ($m == 0) {
				echo "<h1>Finances</h1>";
				for ($y_current = $y_max; $y_current >= $y_min; $y_current--) {
					echo "<h3 id='$y_current'>Finances $y_current</h3>";

					$money = array();
					$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=12");
					$query->execute(["y" => $y_current - 1]);
					$row = $query->fetch();
					$money[0][1] = $row['cash'];
					$money[0][2] = $row['credit'];
					$money[0][3] = $row['checking'];
					$money[0][4] = $row['cash'] + $row['credit'] + $row['checking'];
					$money[0][5] = $row['savings'];
					$money[0][6] = $row['stocks'];
					$money[0][7] = $money[0][4] + $row['savings'] + $row['stocks'];

					$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y");
					$query->execute(["y" => $y_current]);
					foreach ($query as $row) {
						$money[$row['month']][1] = $row['cash'];
						$money[$row['month']][2] = $row['credit'];
						$money[$row['month']][3] = $row['checking'];
						$money[$row['month']][4] = $row['cash'] + $row['credit'] + $row['checking'];
						$money[$row['month']][5] = $row['savings'];
						$money[$row['month']][6] = $row['stocks'];
						$money[$row['month']][7] = $money[$row['month']][4] + $row['savings'] + $row['stocks'];
					}

					echo "<table class='fin'>";
					//echo "<col style='width:7rem'><col span='4' class='main_col'><col span='3' class='main_col hideable'>";
					echo "<tbody> <tr>";
					echo "<th style='width:7rem'>Date</th>";
					echo "<th>Cash</th>";
					echo "<th>Credit</th>";
					echo "<th>Checking</th>";
					echo "<th>Subtotal</th>";
					echo "<th class='hideable'>Savings</th>";
					echo "<th class='hideable'>Stocks</th>";
					echo "<th class='hideable'>Total</th>";
					echo "</tr><tr class='bold'>";

					echo "<td style='width:7rem'>Start</td>";
					for ($i = 1; $i < 8; $i++) {
						//echo "<td>\$".$money[0][$i]."</td>";
						printCell($i, $money[0][$i], false);
					}
					echo "</tr><tr class='bold thick-bottom'>";

					echo "<td style='width:7rem'>End</td>";
					for ($i = 1; $i < 8; $i++) {
						//echo "<td>\$".$money[13][$i]."</td>";
						printCell($i, $money[12][$i], false);
					}
					//echo "</tr>";
					for ($m = 1; $m < 13; $m++) {
						echo "</tr><tr>";
						echo "<td style='width:7rem'><b><a href='/fin?y=$y_current&m=$m'>".date("M", mktime(0,0,0,$m,1,0))."</b></td>";
						$empty = true;
						for ($i = 1; $i < 8; $i++) {
							if ($money[$m][$i] != 0) {
								$empty = false;
								break;
							}
						}
						for ($i = 1; $i < 8; $i++) {
							//echo "<td>\$".$money[13][$i]."</td>";
							if ($empty) {
								$val = 0;
							} else {
								$val = $money[$m][$i] - $money[$m-1][$i];
							}
							if ($i < 5) {
								$link = "/fin?y=$y_current&m=$m";
							} else {
								$link = "/fin?y=$y_current&m=$m&edit";
							}
							printCell($i, $val, true, $link);
						}
					}
					echo "</tr><tr class='bold thick-top'>";
					echo "<td style='width:7rem'>Total</td>";
					for ($i = 1; $i < 8; $i++) {
						printCell($i, $money[12][$i] - $money[0][$i], true);
					}
					echo "</tr>";
					echo "</tbody></table>";
					echo "<p></br></p>";
				}
			} else {
				echo "<a href='/fin?y=$y'><h1>Finances ".date("F", mktime(0, 0, 0, $m, 1, 0))." $y</h1></a>";
				echo "<table class='fin'>";
				//echo "<col span='1' style='width:7rem'><col span='4' class='main_col'><col span='1' class='wide_col hideable'>";
				echo "<tbody> <tr>";
				echo "<th style='width:7rem'>Date</th>";
				echo "<th>Cash</th>";
				echo "<th>Credit</th>";
				echo "<th>Checking</th>";
				echo "<th style='width:11rem'>Type</th>";
				echo "<th class='hideable' style='text-align:left'>Description</th>";
				echo "</tr><tr class='bold'>";
				$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=:m");
				if ($m == 1) {
					$query->execute(["y" => $y - 1, "m" => 12]);
				} else {
					$query->execute(["y" => $y, "m" => $m - 1]);

				}
				$row = $query->fetch();
				echo "<td style='width:7rem'>Start</td>";
				printCell(1, $row['cash'], false);
				printCell(2, $row['credit'], false);
				printCell(3, $row['checking'], false);
				echo "<td class='hideable' style='width:11rem'>Total</td>";
				printCell(3, ($row['cash'] + $row['credit'] + $row['checking'])."</td>", false, "", "left-align hideable");
				printCell(3, ($row['cash'] + $row['credit'] + $row['checking'])."</td>", false, "", "showable");

				echo "</tr><tr class='bold thick-bottom'>";
				$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=:m");
				$query->execute(["y" => $y, "m" => $m]);
				$row = $query->fetch();
				echo "<td style='width:7rem'>End</td>";
				printCell(1, $row['cash'], false);
				printCell(2, $row['credit'], false);
				printCell(3, $row['checking'], false);
				echo "<td class='hideable' style='width:11rem'>Total</td>";
				printCell(3, ($row['cash'] + $row['credit'] + $row['checking'])."</td>", false, "", "left-align hideable");
				printCell(3, ($row['cash'] + $row['credit'] + $row['checking'])."</td>", false, "", "showable");
				$query = $pdo->prepare("SELECT * FROM fin_monthly WHERE year=:y AND month=:m ORDER BY day, id");
				$query->execute(["y" => $y, "m" => $m]);
				foreach ($query as $row) {
					echo "</tr><tr>";
					echo "<td class='hideable' style='width:7rem; font-weight:bold'>".date("D j", mktime(0, 0, 0, $m, $row['day'], $y))."</td>";
					echo "<td class='showable' rowspan='2' style='width:7rem; font-weight:bold'>".date("D j", mktime(0, 0, 0, $m, $row['day'], $y))."</td>";
					printCell(1, $row['cash'], true);
					printCell(2, $row['credit'], true);
					printCell(3, $row['checking'], true);
					echo "<td style='width:11rem'>".$row['type']."</td>";
					echo "<td style='width:51rem; text-align:left' class='hideable'>".$row['description']."</td>";
					echo "</tr class='showable'><tr>";
					echo "<td colspan='5' style='text-align:left' class='showable thick-left'>".$row['description']."</td>";
				}

				echo "</tbody></table>";
				echo "<p></br></p>";
			}
		?>
	</body>
</html>
