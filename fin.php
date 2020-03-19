<?php
	include_once "auth.php";

	if ($sys['user']['auth_level'] < 9) {
		//include "auth_error.php";
		//exit;
	}

	function monthCost($y, $m, $pdo) {
		$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=:m");
		if ($m == 1) {
			$query->execute(["y" => $y - 1, "m" => 12]);
		} else {
			$query->execute(["y" => $y, "m" => $m - 1]);
		}
		$row = $query->fetch();
		$sum = [
			'cash' => $row['cash'],
			'credit' => $row['credit'],
			'checking' => $row['checking']
		];
		while ($y <= (int)date("Y")) {
			$query = $pdo->prepare("SELECT * FROM fin_monthly WHERE year=:y AND month=:m");
			$query->execute(["y" => $y, "m" => $m]);
			foreach ($query as $row) {
				$sum['cash'] += $row['cash'];
				$sum['credit'] += $row['credit'];
				$sum['checking'] += $row['checking'];
			}
			$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=:m");
			$query->execute(["y" => $y, "m" => $m]);
			if ($query->rowCount() > 0) {
				$query = $pdo->prepare("UPDATE fin_yearly SET cash=:cash, credit=:credit, checking=:checking WHERE year=:y AND month=:m");
				$query->execute([
					'cash' => $sum['cash'],
					'credit' => $sum['credit'],
					'checking' => $sum['checking'],
					"y" => $y,
					"m" => $m
				]);
			} else {
				$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=:m");
				if ($m == 1) {
					$query->execute(["y" => $y - 1, "m" => 12]);
				} else {
					$query->execute(["y" => $y, "m" => $m - 1]);
				}
				$row = $query->fetch();
				$query = $pdo->prepare("INSERT INTO fin_yearly (cash, credit, checking, savings, stocks, year, month) VALUES (:cash, :credit, :checking, :savings, :stocks, :y, :m)");
				$query->execute([
					'cash' => $sum['cash'],
					'credit' => $sum['credit'],
					'checking' => $sum['checking'],
					'savings' => $row['savings'],
					'stocks' => $row['stocks'],
					"y" => $y,
					"m" => $m
				]);
			}
			if ($m == 12) {
				$y++;
				$m = 1;
			} else {
				$m++;
			}
		}
	}

	if (isset($_GET['del'])) {
		$query = $pdo->prepare("SELECT * FROM fin_monthly WHERE id=:id");
		$query->execute(["id" => $_GET['id']]);
		$row = $query->fetch();
		$query = $pdo->prepare("DELETE FROM fin_monthly WHERE id=:id");
		$query->execute(["id" => $_GET['id']]);
		monthCost($row['year'], $row['month'], $pdo);
		header("Location: /fin?y=".$row['year']."&m=".$row['month']);
	}

	if (isset($_POST)) {
		if (isset($_POST['id'])) {
			$query = $pdo->prepare("UPDATE fin_monthly SET year=:y, month=:m, day=:d, cash=:cash, credit=:credit, checking=:checking, type=:type, description=:desc WHERE id=:id");
			$query->execute([
				"y" => $_POST['year'],
				"m" => $_POST['month'],
				"d" => $_POST['day'],
				"cash" => $_POST['cash']*100,
				"credit" => $_POST['credit']*100,
				"checking" => $_POST['checking']*100,
				"type" => $_POST['type'],
				"desc" => $_POST['desc'],
				"id" => $_POST['id']
			]);
			if ($_POST['year'] == $_POST['old_year']) {
				if ($_POST['month'] == $_POST['old_month']) {
					monthCost($_POST['year'], $_POST['month'], $pdo);
				} else if ($_POST['month'] < $_POST['old_month']) {
					monthCost($_POST['year'], $_POST['month'], $pdo);
				} else {
					monthCost($_POST['year'], $_POST['old_month'], $pdo);
				}
			} else if ($_POST['year'] < $_POST['old_year']) {
				monthCost($_POST['year'], $_POST['month'], $pdo);
			} else {
				monthCost($_POST['old_year'], $_POST['old_month'], $pdo);
			}
		} else if (isset($_POST['year']) && isset($_POST['month'])) {
			if (isset($_POST['day'])) {
				$query = $pdo->prepare("INSERT INTO fin_monthly (id, year, month, day, cash, credit, checking, type, description) VALUES (:id, :y, :m, :d, :cash, :credit, :checking, :type, :desc)");
				$query->execute([
					"id" => time(),
					"y" => $_POST['year'],
					"m" => $_POST['month'],
					"d" => $_POST['day'],
					"cash" => $_POST['cash']*100,
					"credit" => $_POST['credit']*100,
					"checking" => $_POST['checking']*100,
					"type" => $_POST['type'],
					//"type" => "x",
					"desc" => $_POST['desc']
				]);
				monthCost($_POST['year'], $_POST['month'], $pdo);
			} else {
				$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=:m");
				$query->execute(["y" => $_POST['year'], "m" => $_POST['month']]);
				if ($query->rowCount() > 0) {
					$query = $pdo->prepare("UPDATE fin_yearly SET savings = :savings, stocks = :stocks WHERE year=:y AND month=:m");
					$query->execute([
						"savings" => $_POST['savings']*100,
						"stocks" => $_POST['stocks']*100,
						"y" => $_POST['year'],
						"m" => $_POST['month']
					]);
				} else {
					$query = $pdo->prepare("INSERT INTO fin_yearly (savings, stocks, year, month) VALUES (:savings, :stocks, :y, :m)");
					$query->execute([
						"savings" => $_POST['savings']*100,
						"stocks" => $_POST['stocks']*100,
						"y" => $_POST['year'],
						"m" => $_POST['month']
					]);
				}
			}
		}
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
			echo "<title>";
			if (isset($_GET['edit'])) {
				echo "Edit ";
			}
			if ($m == 0) {
				echo "Finances $y";
			} else {
				echo "Finances ".date("F", mktime(0, 0, 0, $m, 1, 0))." $y";
			}
			echo " - Penn Bauman</title>";
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
			if (isset($_GET['edit'])) {
				if (isset($_GET['y']) && isset($_GET['m'])) {
					echo "<h1>Edit ".date("F", mktime(0, 0, 0, $m, 1, 0))." $y</h1>";
					$query = $pdo->prepare("SELECT * FROM fin_yearly WHERE year=:y AND month=:m");
					$query->execute(["y" => $y, "m" => $m ]);
					$row = $query->fetch();

					echo "<form action='/fin?y=$y' method='post'>";
					echo "<input type='hidden' name='year' value='$y'>";
					echo "<input type='hidden' name='month' value='$m'>";
					echo "<b>Savings:</b> <br/> $<input type='number' name='savings' value='".($row['savings']/100)."' step='0.01'><br/><br/>";
					echo "<b>Stocks:</b> <br/> $<input type='number' name='stocks' value='".($row['stocks']/100)."' step='0.01'><br/><br/>";
					echo "<input type='submit' value='Enter'></form>";
					echo "</form>";
				
				} else if (isset($_GET['id'])) {
					echo "<h1>Edit Transaction: ".$_GET['id']."</h1>";
					$query = $pdo->prepare("SELECT * FROM fin_monthly WHERE id=:id");
					$query->execute(["id" => $_GET['id']]);
					$row = $query->fetch();

					echo "<form action='/fin?y=".$row['year']."&m=".$row['month']."' method='post' id='new_transaction'>";
					echo "<input type='hidden' name='id' value='".$_GET['id']."'>";
					echo "<input type='hidden' name='old_year' value='".$row['year']."'>";
					echo "<input type='hidden' name='old_month' value='".$row['month']."'>";

					echo "<b>Date:</b> <br/>";
					echo "<input style='width:3em' type='number' name='year' value='".$row['year']."' class='centered'> - ";
					echo "<input style='width:1.5em' type='number' name='month' value='".$row['month']."' class='centered'> - ";
					echo "<input style='width:1.5em' type='number' name='day' value='".$row['day']."' class='centered'><br/><br/>";
					echo "<b>Cash:</b> <br/> $<input type='number' name='cash' step='0.01' value='".($row['cash']/100)."'><br/>";
					echo "<b>Credit:</b> <br/> $<input type='number' name='credit' step='0.01' value='".($row['credit']/100)."'><br/>";
					echo "<b>Checking:</b> <br/> $<input type='number' name='checking' step='0.01' value='".($row['checking']/100)."'><br/><br/>";
					//echo "<b>Type:</b> <br/> <select name='type' form='new_transaction'>";
					echo "<b>Type:</b> <br/> <select name='type'>";
					$types = ["Personal", "Debt", "Transfer", "Pay", "Education", "Other"];
					foreach ($types as $t) {
						if ($row['type'] == $t) {
							echo "<option value='$t' selected>$t</option>";
						} else {
							echo "<option value='$t'>$t</option>";
						}
					}
					echo "</select><br><br/>";
					echo "<b>Description:</b> <br/> <input type='text' name='desc' value='".$row['description']."'><br/><br/>";
					echo "<input type='submit' value='Enter'></form>";
					echo "</form>";
					echo "<p></br></p>";
					echo "<form action='/fin?id=".$row['id']."&del' method='post' onsubmit='return confirm(\"Are you sure you want to delete this transaction?\");'>";
					echo "<input type='submit' value='Delete Transaction' class='error'></form>";
					echo "</form>";
				
				} else {
					echo "<h1 class='error'>Edit Error</h1>";
					echo "<p><a href='/fin'>Return</a></p>";
				}
			} else if (isset($_GET['new'])) {
				echo "<h1>New Transaction</h1>";
				if (isset($_GET['y']) && isset($_GET['m'])) {
					echo "<form action='/fin?y=$y&m=$m' method='post' id='new_transaction'>";
				} else {
					echo "<form action='/fin' method='post'>";
				}
				echo "<b>Date:</b> <br/>";
				if (isset($_GET['y']) && isset($_GET['m'])) {
					echo "<input style='width:3em' type='number' name='year' value='$y' class='centered'> - ";
					echo "<input style='width:1.5em' type='number' name='month' value='$m' class='centered'> - ";
				} else {
					echo "<input style='width:3em' type='number' name='year' class='centered'> - ";
					echo "<input style='width:1.5em' type='number' name='month' class='centered'> - ";
				}
				echo "<input style='width:1.5em' type='number' name='day' class='centered'><br/><br/>";
				echo "<b>Cash:</b> <br/> $<input type='number' name='cash' step='0.01' value='0'><br/>";
				echo "<b>Credit:</b> <br/> $<input type='number' name='credit' step='0.01' value='0'><br/>";
				echo "<b>Checking:</b> <br/> $<input type='number' name='checking' step='0.01' value='0'><br/><br/>";
				//echo "<b>Type:</b> <br/> <select name='type' form='new_transaction'>";
				echo "<b>Type:</b> <br/> <select name='type'>";
				echo "<option value='Personal' selected>Personal</option>";
				echo "<option value='Debt'>Debt</option>";
				echo "<option value='Transfer'>Transfer</option>";
				echo "<option value='Pay'>Pay</option>";
				echo "<option value='Education'>Education</option>";
				echo "<option value='Other'>Other</option>";
				//echo "<option value='Allowance'>Allowance</option>";
				//echo "<option value='Gift'>Gift</option>";
				echo "</select><br><br/>";
				echo "<b>Description:</b> <br/> <input type='text' name='desc'><br/><br/>";
				echo "<input type='submit' value='Enter'></form>";
				echo "</form>";
			} else if ($m == 0) {
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
					for ($m = 1; $m < 12; $m++) {
						$empty = true;
						for ($i = 1; $i < 8; $i++) {
							if ($money[$m][$i] != 0) {
								$empty = false;
								break;
							}
						}
						if ($empty) {
							break;
						}
					}
					$m--;
					for ($i = 1; $i < 8; $i++) {
						$money[13][$i] = $money[$m][$i];
					}

					echo "<table class='fin'>";
					echo "<tbody> <tr>";
					echo "<th style='width:7rem'>Date</th>";
					echo "<th>Cash</th>";
					echo "<th>Credit</th>";
					echo "<th>Checking</th>";
					echo "<th class='hideable'>Subtotal</th>";
					echo "<th class='hideable'>Savings</th>";
					echo "<th class='hideable'>Stocks</th>";
					echo "<th>Total</th>";
					echo "</tr><tr class='bold'>";

					echo "<td style='width:7rem'>Start</td>";
					for ($i = 1; $i < 8; $i++) {
						printCell($i, $money[0][$i], false);
					}
					echo "</tr><tr class='bold thick-bottom'>";

					echo "<td style='width:7rem'>End</td>";
					for ($i = 1; $i < 8; $i++) {
						printCell($i, $money[13][$i], false);
					}
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
						printCell($i, $money[13][$i] - $money[0][$i], true);
					}
					echo "</tr>";
					echo "</tbody></table>";
					echo "<p></br></p>";
				}
			} else {
				echo "<a href='/fin?y=$y'>";
				echo "<h1 class='hideable'>Finances ".date("F", mktime(0, 0, 0, $m, 1, 0))." $y</h1>";
				echo "<h1 class='showable'>".date("F", mktime(0, 0, 0, $m, 1, 0))." $y</h1>";
				echo "</a>";
				echo "<p class='centered'>";
				if ($m == 1) {
					echo "<a href='/fin?y=".($y-1)."&m=12'>prev</a>";
					echo " - ";
					echo "<a href='/fin?y=$y&m=".($m+1)."'>next</a>";
				} else if ($m == 12) {
					echo "<a href='/fin?y=$y&m=".($m-1)."'>prev</a>";
					echo " - ";
					echo "<a href='/fin?y=".($y+1)."&m=1'>next</a>";
				} else {
					echo "<a href='/fin?y=$y&m=".($m-1)."'>prev</a>";
					echo " - ";
					echo "<a href='/fin?y=$y&m=".($m+1)."'>next</a>";
				}
				echo "</p>";
				echo "<table class='fin'>";
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
					echo "<td class='hideable' style='width:7rem; font-weight:bold'><a href='/fin?id=".$row['id']."&edit'>".date("D j", mktime(0, 0, 0, $m, $row['day'], $y))."</a></td>";
					echo "<td class='showable' rowspan='2' style='width:7rem; font-weight:bold'><a href='/fin?id=".$row['id']."&edit'>".date("D j", mktime(0, 0, 0, $m, $row['day'], $y))."</a></td>";
					printCell(1, $row['cash'], true, "/fin?id=".$row['id']."&edit");
					printCell(2, $row['credit'], true, "/fin?id=".$row['id']."&edit");
					printCell(3, $row['checking'], true, "/fin?id=".$row['id']."&edit");
					echo "<td style='width:11rem'><a href='/fin?id=".$row['id']."&edit'>".$row['type']."</a></td>";
					echo "<td style='width:51rem; text-align:left' class='hideable'><a href='/fin?id=".$row['id']."&edit'>".$row['description']."</a></td>";
					echo "</tr class='showable'><tr>";
					echo "<td colspan='5' style='text-align:left' class='showable thick-left'><a href='/fin?id=".$row['id']."&edit'>".$row['description']."</a></td>";
				}

				echo "</tbody></table>";
				echo "<p class='centered'>";
				if ($m == 1) {
					echo "<a href='/fin?y=".($y-1)."&m=12'>prev</a>";
					echo " - ";
					echo "<a href='/fin?y=$y&m=".($m+1)."'>next</a>";
				} else if ($m == 12) {
					echo "<a href='/fin?y=$y&m=".($m-1)."'>prev</a>";
					echo " - ";
					echo "<a href='/fin?y=".($y+1)."&m=1'>next</a>";
				} else {
					echo "<a href='/fin?y=$y&m=".($m-1)."'>prev</a>";
					echo " - ";
					echo "<a href='/fin?y=$y&m=".($m+1)."'>next</a>";
				}
				echo "<form class='centered' action='/fin?y=$y&m=$m&new' method='post'>";
				echo "<input type='submit' value='New Transaction'>";
				echo "</form>";
				echo "<p></br></p>";
			}
		?>
	</body>
</html>
