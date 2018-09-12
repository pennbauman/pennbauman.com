<?php
	include "elements_array.php";

	function elem($num) {
		$elements = $GLOBALS["elements"];
		echo "<td onclick='element('".$elements[$num][0]."')' class='std_block ".$elements[$num][4]."'>".$num."<br/> <b>".$elements[$num][0]."</b><br/> <i>".$elements[$num][2]."</i> </td>\n";
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
<!DOCTYPE html>
	<head>
		<title> Periodic Table | Penn Bauman</title>
		<link rel="shortcut icon" href="h_favicon.png">
		<link rel='stylesheet' type='text/css' href='periodic-table.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='periodic-table.js'></script>
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
				<td class="num_left"> 1 </td>
				<?php elem(1); ?>
				<td> </td>
				<td colspan="2" rowspan="3">
				<td colspan="7" rowspan="3" > <!--style="border:1px solid red"-->
					<div id="big"><p>
						<span id="a_num">Number</span> | Mass<br/>
						<span id="a_sym">Sym</span> <br/>
						<span id="a_name">Name</span><br/>
						<span id="a_m">Type<br/>Electron Configuration</span>
					</p></div>
				</td>
				<td colspan="1" rowspan="3">
				<td colspan="5"> </td>
				<?php elem(2); ?>
			</tr>
			<tr class="elem_row"> <!--2ND ELEMENTS / SPACE-->
				<td class="num_left"> 2 </td>
				<?php elems(3, 10); ?>
			</tr>
			<tr class="elem_row"> <!--3RD ELEMENTS / SPACE-->
				<td class="num_left"> 3 </td>
				<?php elems(11, 18); ?>
			</tr>
			<tr class="elem_row"> <!--4TH ELEMENTS-->
				<td class="num_left"> 4 </td>
				<?php elems(19, 36); ?>
			</tr>
			<tr class="elem_row"> <!--5TH ELEMENTS-->
				<td class="num_left"> 5 </td>
				<?php elems(37, 54); ?>
			</tr>
			<tr class="elem_row"> <!--6TH ELEMENTS-->
				<td class="num_left" id="row6"> 6 </td>
				<?php elems(55, 56); ?>
				<td class="std_block lanthanide"> <span style="font-size:2.5vh"> 57-71 </span> </td>
				<?php elems(72, 86); ?>
			</tr>
			<tr class="elem_row"> <!--7TH ELEMENTS-->
				<td class="num_left" id="row7"> 7 </td>
				<?php elems(87, 88); ?>
				<td class="std_block actinide"> <span style="font-size:2.5vh"> 89-103 </span> </td>
				<?php elems(104, 118); ?>
			</tr>
			<tr> <!--GAP-->
				<td rowspan="3"> </td>
				<td> </td>
				<td colspan="17" style="height:5vh;"> </td>
			</tr>
			<tr class="elem_row "> <!--LANTHANDE SERIES-->
				<?php elems(57, 71); ?>
				<td rowspan="2"> </td>
			</tr>
			<tr class="elem_row"> <!--ACTINIDE SERIES-->

				<td onclick="element("");return fa''e;" class="series" colspan="2"> Actinide Series <br/> <i> 89 - 103 </i> </td></a>
				<?php elems(89, 103); ?>
			</tr>
		</table>
	</body>
</html>
