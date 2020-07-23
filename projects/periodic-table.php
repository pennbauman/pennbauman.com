<?php
	include "elements_array.php";

	function elem($num) {
		$elements = $GLOBALS["elements"];
		echo "<td class='std_block ".$elements[$num][4]."' id='".$elements[$num][0]."'>".$num."<br/> <b>".$elements[$num][0]."</b><br/> <i>".$elements[$num][2]."</i> </td>\n";
		// onclick='element('".$elements[$num][0]."')'
		//<td onclick="element('H');return false;" class="std_block non-metals">1<br/> <b>H</b><br/> <i>1.008</i> </td>
	}
	function elems($numStart, $numEnd) {
		$i = $numStart;
		while ($i < $numEnd + 1) {
			elem($i);
			$i++;
		}
	}
?>
<!DOCTYPE html><html lang='en-US'>
	<head>
		<title> Periodic Table - Penn Bauman</title>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name='description' content='Interactive Periodic Table of Elements.'/>
		<meta name='author' content='Penn Bauman'>
		<meta name='robots' content='noindex, nofollow'/>
		<link rel='icon' href='/files/img/h_favicon.png'>
		<link rel='stylesheet' href='/files/css/periodic-table.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='/files/js/periodic-table.js'></script>
		<script>
			var elements = {
			<?php
				for ($i = 1; $i < count($elements); $i++) {
					//echo '"'.$elements[$i][0].'":['.$i.', "'.$elements[$i][1].'", "'.$elements[$i][2].'", "'.$elements[$i][3].'", "'.$elements[$i][4].'"], '."\n";
					echo "'".$elements[$i][0]."':[";
					echo $i.", ";
					echo "'".$elements[$i][1]."', ";
					echo "'".$elements[$i][2]."', ";
					echo "'".$elements[$i][3]."', ";
					echo "'".$elements[$i][4]."', ";
					echo "'".$elements[$i][5]."', ";
					echo "'".$elements[$i][6]."'";
					echo "], \n";
				}
			?>
			}
		</script>
	</head>
	<body>
		<!--h1>The Periodic Table of Elements</h1-->
		<table id="main_table">
			<tr>
				<th colspan="19">The Periodic Table of Elements</th>
			</tr>
			<tr class="tops_nums"> <!--TOP NUMBERS-->
				<td> </td>
				<?php
					$i = 1;
					while ($i < 19) {
						echo "<td class='num_top col".$i."_top'>".$i."</td>\n";
						$i++;
					}
				?>
			</tr>
			<tr class="elem_row"> <!--1ST ELEMETNS / SPACE-->
				<td class="num_left row1_left"> 1 </td>
				<?php elem(1); ?>
				<td class='std_block' id="Sym">Number<br/> <b>Sym</b><br/> <i>Mass</i> </td>
				<td colspan="3" rowspan="3" id="key">
					<p class="alkali">Alkali Metal</p>
					<p class="alkaline">Alkaline Earth Metal</p>
					<p class="transmetal">Transition Metal</p>
					<p class="metal">Basic Metal</p>
					<p class="metaloid">Metaloid</p>
					<p class="nonmetal">Nonmetal</p>
					<p class="halogen">Halogen</p>
					<p class="noble">Nobel Gas</p>
					<p class="lanthanide">Lanthanide</p>
					<p class="actinide">Actinide</p>
				</td>
				<td colspan="4" rowspan="3" id="big">
					<p>
						<span id="a_num">Number</span> | Mass<br/>
						<span id="a_sym">Sym</span> <br/>
						<span id="a_name">Name</span><br/>
						<span id="a_m">Type<br/>Electron Config</span>
					</p>
				</td>
				<td colspan="3" rowspan="3" id="details">
					<p>
						State at 0&deg;C<br/>
						Radioactivity<br/>
						<br/>
						<a href="http://wikipedia.org/wiki/Chemical_element">Wikipedia</a>
					</p>
				</td>
				<td colspan="5" id="details"><p>
					Information about the <a href='http://wikipedia.org/wiki/Periodic_table'>Periodic Table</a>. <br/>
					More detailed <a href="http://ptable.com">Interactive Table</a>.
				</p></td>
				<?php elem(2); ?>
			</tr>
			<tr class="elem_row"> <!--2ND ELEMENTS / SPACE-->
				<td class="num_left row2_left"> 2 </td>
				<?php elems(3, 10); ?>
			</tr>
			<tr class="elem_row"> <!--3RD ELEMENTS / SPACE-->
				<td class="num_left row3_left"> 3 </td>
				<?php elems(11, 18); ?>
			</tr>
			<tr class="elem_row"> <!--4TH ELEMENTS-->
				<td class="num_left row4_left"> 4 </td>
				<?php elems(19, 36); ?>
			</tr>
			<tr class="elem_row"> <!--5TH ELEMENTS-->
				<td class="num_left row5_left"> 5 </td>
				<?php elems(37, 54); ?>
			</tr>
			<tr class="elem_row"> <!--6TH ELEMENTS-->
				<td class="num_left row6_left"> 6 </td>
				<?php elems(55, 56); ?>
				<td class="std_block lanthanide row6"> 57-71 </td>
				<?php elems(72, 86); ?>
			</tr>
			<tr class="elem_row"> <!--7TH ELEMENTS-->
				<td class="num_left row7_left"> 7 </td>
				<?php elems(87, 88); ?>
				<td class="std_block actinide row7"> 89-103 </td>
				<?php elems(104, 118); ?>
			</tr>
			<tr> <!--GAP-->
				<td rowspan="3"> </td>
				<td> </td>
				<td colspan="17" style="height:1rem;"> </td>
			</tr>
			<tr class="elem_row "> <!--LANTHANDE SERIES-->
				<td class="series" colspan="2"> Lanthanide Series <br/> <i> 57 - 71 </i> </td></a>
				<?php elems(57, 71); ?>
				<td rowspan="2"> </td>
			</tr>
			<tr class="elem_row"> <!--ACTINIDE SERIES-->

				<td class="series" colspan="2"> Actinide Series <br/> <i> 89 - 103 </i> </td></a>
				<?php elems(89, 103); ?>
		</table>
	</tr>
	</body>
</html>
