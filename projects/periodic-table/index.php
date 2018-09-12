<?php
	include_once "elements_array.php";

	function elem($num) {
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
				<td onclick="element('Na');return false;" class="std_block alkali">11<br/> <b>Na</b><br/> <i>22.990</i> </td>
				<td onclick="element('Mg');return false;" class="std_block alkaline">12<br/> <b>Mg</b><br/> <i>24.305</i> </td>

				<td onclick="element('Al');return false;" class="std_block metal">13<br/> <b>Al</b><br/> <i>26.982</i> </td>
				<td onclick="element('Si');return false;" class="std_block metaloid">14<br/> <b>Si</b><br/> <i>28.086</i> </td>
				<td onclick="element('P');return false;" class="std_block non-metals">15<br/> <b>P</b><br/> <i>30.974</i> </td>
				<td onclick="element('S');return false;" class="std_block non-metals">16<br/> <b>S</b><br/> <i>32.066</i> </td>
				<td onclick="element('Cl');return false;" class="std_block holagens">17<br/> <b>Cl</b><br/> <i>35.453</i> </td>
				<td onclick="element('Ar');return false;" class="std_block noble-gas">18<br/> <b>Ar</b><br/> <i>39.948</i> </td>

			</tr>
			<tr class="elem_row"> <!--4TH ELEMENTS-->
				<td class="num_left"> 4 </td>
				<td onclick="element('K');return false;" class="std_block alkali">19<br/> <b>K</b><br/> <i>39.098</i> </td>
				<td onclick="element('Ca');return false;" class="std_block alkaline">20<br/> <b>Ca</b><br/> <i>40.078</i> </td>
				<td onclick="element('Sc');return false;" class="std_block trans-metal">21<br/> <b>Sc</b><br/> <i>44.956</i> </td>
				<td onclick="element('Ti');return false;" class="std_block trans-metal">22<br/> <b>Ti</b><br/> <i>47.880</i> </td>
				<td onclick="element('V');return false;" class="std_block trans-metal">23<br/> <b>V</b><br/> <i>50.942</i> </td>
				<td onclick="element('Cr');return false;" class="std_block trans-metal">24<br/> <b>Cr</b><br/> <i>51.996</i> </td>
				<td onclick="element('Mn');return false;" class="std_block trans-metal">25<br/> <b>Mn</b><br/> <i>54.938</i> </td>
				<td onclick="element('Fe');return false;" class="std_block trans-metal">26<br/> <b>Fe</b><br/> <i>55.933</i> </td>
				<td onclick="element('Co');return false;" class="std_block trans-metal">27<br/> <b>Co</b><br/> <i>58.933</i> </td>
				<td onclick="element('Ni');return false;" class="std_block trans-metal">28<br/> <b>Ni</b><br/> <i>58.693</i> </td>
				<td onclick="element('Cu');return false;" class="std_block trans-metal">29<br/> <b>Cu</b><br/> <i>63.546</i> </td>
				<td onclick="element('Zn');return false;" class="std_block trans-metal">30<br/> <b>Zn</b><br/> <i>65.390</i> </td>
				<td onclick="element('Ga');return false;" class="std_block metal">31<br/> <b>Ga</b><br/> <i>69.732</i> </td>
				<td onclick="element('Ge');return false;" class="std_block metaloid">32<br/> <b>Ge</b><br/> <i>72.610</i> </td>
				<td onclick="element('As');return false;" class="std_block metaloid">33<br/> <b>As</b><br/> <i>74.922</i> </td>
				<td onclick="element('Se');return false;" class="std_block non-metals">34<br/> <b>Se</b><br/> <i>78.090</i> </td>
				<td onclick="element('Br');return false;" class="std_block holagens">35<br/> <b>Br</b><br/> <i>79.904</i> </td>
				<td onclick="element('Kr');return false;" class="std_block noble-gas">36<br/> <b>Kr</b><br/> <i>84.800</i> </td>
			</tr>
			<tr class="elem_row"> <!--5TH ELEMENTS-->
				<td class="num_left"> 5 </td>
				<td onclick="element('Rb');return false;" class="std_block alkali">37<br/> <b>Rb</b><br/> <i>84.468</i> </td>
				<td onclick="element('Sr');return false;" class="std_block alkaline">38<br/> <b>Sr</b><br/> <i>87.620</i> </td>
				<td onclick="element('Y');return false;" class="std_block trans-metal">39<br/> <b>Y</b><br/> <i>88.906</i> </td>
				<td onclick="element('Zr');return false;" class="std_block trans-metal">40<br/> <b>Zr</b><br/> <i>91.224</i> </td>
				<td onclick="element('Nb');return false;" class="std_block trans-metal">41<br/> <b>Nb</b><br/> <i>92.906</i> </td>
				<td onclick="element('Mo');return false;" class="std_block trans-metal">42<br/> <b>Mo</b><br/> <i>95.940</i> </td>
				<td onclick="element('Tc');return false;" class="std_block trans-metal">43<br/> <b>Tc</b><br/> <i>98.907</i> </td>
				<td onclick="element('Ru');return false;" class="std_block trans-metal">44<br/> <b>Ru</b><br/> <i>101.070</i> </td>
				<td onclick="element('Rh');return false;" class="std_block trans-metal">45<br/> <b>Rh</b><br/> <i>102.906</i> </td>
				<td onclick="element('Pd');return false;" class="std_block trans-metal">46<br/> <b>Pd</b><br/> <i>106.420</i> </td>
				<td onclick="element('Ag');return false;" class="std_block trans-metal">47<br/> <b>Ag</b><br/> <i>107.868</i> </td>
				<td onclick="element('Cd');return false;" class="std_block trans-metal">48<br/> <b>Cd</b><br/> <i>112.411</i> </td>
				<td onclick="element('In');return false;" class="std_block metal">49<br/> <b>In</b><br/> <i>114.818</i> </td>
				<td onclick="element('Sn');return false;" class="std_block metal">50<br/> <b>Sn</b><br/> <i>118.710</i> </td>
				<td onclick="element('Sb');return false;" class="std_block metaloid">51<br/> <b>Sb</b><br/> <i>121.760</i> </td>
				<td onclick="element('Te');return false;" class="std_block metaloid">52<br/> <b>Te</b><br/> <i>127.600</i> </td>
				<td onclick="element('I');return false;" class="std_block holagens">53<br/> <b>I</b><br/> <i>126.904</i> </td>
				<td onclick="element('Xe');return false;" class="std_block noble-gas">54<br/> <b>Xe</b><br/> <i>131.290</i> </td>

			</tr>
			<tr class="elem_row"> <!--6TH ELEMENTS-->
				<td class="num_left" id="row6"> 6 </td>
				<td onclick="element('Cs');return false;" class="std_block alkali">55<br/> <b>Cs</b><br/> <i>132.905</i> </td>
				<td onclick="element('Ba');return false;" class="std_block alkaline">56<br/> <b>Ba</b><br/> <i>137.327</i> </td>

				<td class="std_block lanthanide"> <span style="font-size:2.5vh"> 57-71 </span> </td>

				<td onclick="element('Hf');return false;" class="std_block trans-metal">72<br/> <b>Hf</b><br/> <i>178.490</i> </td>
				<td onclick="element('Ta');return false;" class="std_block trans-metal">73<br/> <b>Ta</b><br/> <i>180.948</i> </td>
				<td onclick="element('W');return false;" class="std_block trans-metal">74<br/> <b>W</b><br/> <i>183.850</i> </td>
				<td onclick="element('Re');return false;" class="std_block trans-metal">75<br/> <b>Re</b><br/> <i>168.207</i> </td>
				<td onclick="element('Os');return false;" class="std_block trans-metal">76<br/> <b>Os</b><br/> <i>190.230</i> </td>
				<td onclick="element('Ir');return false;" class="std_block trans-metal">77<br/> <b>Ir</b><br/> <i>192.220</i> </td>
				<td onclick="element('Pt');return false;" class="std_block trans-metal">78<br/> <b>Pt</b><br/> <i>195.080</i> </td>
				<td onclick="element('Au');return false;" class="std_block trans-metal">79<br/> <b>Au</b><br/> <i>196.967</i> </td>
				<td onclick="element('Hg');return false;" class="std_block trans-metal">80<br/> <b>Hg</b><br/> <i>200.590</i> </td>
				<td onclick="element('Tl');return false;" class="std_block metal">81<br/> <b>Tl</b><br/> <i>204.383</i> </td>
				<td onclick="element('Pb');return false;" class="std_block metal">82<br/> <b>Pb</b><br/> <i>207.200</i> </td>
				<td onclick="element('Bi');return false;" class="std_block metal">83<br/> <b>Bi</b><br/> <i>208.980</i> </td>
				<td onclick="element('Po');return false;" class="std_block metaloid">84<br/> <b>Po</b><br/> <i>208.982</i> </td>
				<td onclick="element('At');return false;" class="std_block holagens">85<br/> <b>At</b><br/> <i>209.987</i> </td>
				<td onclick="element('Rn');return false;" class="std_block noble-gas">86<br/> <b>Rn</b><br/> <i>222.018</i> </td>

			</tr>
			<tr class="elem_row"> <!--7TH ELEMENTS-->
				<td class="num_left" id="row7"> 7 </td>
				<td onclick="element('Fr');return false;" class="std_block alkali"> 87 <br/> <b>Fr</b> <br/> <i>223.020</i> </td>
				<td onclick="element('Ra');return false;" class="std_block alkaline"> 88 <br/> <b>Ra</b> <br/> <i>226.025</i> </td>

				<td class="std_block actinide"> <span style="font-size:2.5vh"> 89-103 </span> </td>

				<td onclick="element('Rf');return false;" class="std_block trans-metal">104<br/> <b>Rf</b><br/> <i>[261]</i> </td>
				<td onclick="element('Db');return false;" class="std_block trans-metal">105<br/> <b>Db</b><br/> <i>[262]</i> </td>
				<td onclick="element('Sg');return false;" class="std_block trans-metal">106<br/> <b>Sg</b><br/> <i>[266]</i> </td>
				<td onclick="element('Bh');return false;" class="std_block trans-metal">107<br/> <b>Bh</b><br/> <i>[264]</i> </td>
				<td onclick="element('Hs');return false;" class="std_block trans-metal">108<br/> <b>Hs</b><br/> <i>[269]</i> </td>
				<td onclick="element('Mt');return false;" class="std_block trans-metal">109<br/> <b>Mt</b><br/> <i>[268]</i> </td>
				<td onclick="element('Ds');return false;" class="std_block trans-metal">110<br/> <b>Ds</b><br/> <i>[269]</i> </td>
				<td onclick="element('Rg');return false;" class="std_block trans-metal">111<br/> <b>Rg</b><br/> <i>[272]</i> </td>
				<td onclick="element('Cn');return false;" class="std_block trans-metal">112<br/> <b>Cn</b><br/> <i>[277]</i> </td>
				<td onclick="element('Uut');return false;" class="std_block metal">113<br/> <b>Uut</b><br/> <i>unknown</i> </td>
				<td onclick="element('Fl');return false;" class="std_block metal">114<br/> <b>Fl</b><br/> <i>[289]</i> </td>
				<td onclick="element('Uup');return false;" class="std_block metal">115<br/> <b>Uup</b><br/> <i>unknown</i> </td>
				<td onclick="element('Lv');return false;" class="std_block metal">116<br/> <b>Lv</b><br/> <i>[298]</i> </td>
				<td onclick="element('Uus');return false;" class="std_block holagens">117<br/> <b>Uus</b><br/> <i>unknown</i> </td>
				<td onclick="element('Uuo');return false;" class="std_block noble-gas">118<br/> <b>Uuo</b><br/> <i>unknown</i> </td>
			</tr>
			<tr> <!--GAP-->
				<td rowspan="3"> </td>
				<td> </td>
				<td colspan="17" style="height:5vh;"> </td>
			</tr>
			<tr class="elem_row "> <!--LANTHANDE SERIES-->

				<td onclick="element("");return false;" class="series" colspan="2"> Lanthanide Series <br/> <i> 57 - 71 </i> </td></a>
				<td onclick="element('La');return false;" class="std_block lanthanide">57<br/> <b>La</b><br/> <i>138.906</i> </td>
				<td onclick="element('Ce');return false;" class="std_block lanthanide">58<br/> <b>Ce</b><br/> <i>140.115</i> </td>
				<td onclick="element('Pr');return false;" class="std_block lanthanide">59<br/> <b>Pr</b><br/> <i>140.908</i> </td>
				<td onclick="element('Nd');return false;" class="std_block lanthanide">60<br/> <b>Nd</b><br/> <i>144.240</i> </td>
				<td onclick="element('Pm');return false;" class="std_block lanthanide">61<br/> <b>Pm</b><br/> <i>144.913</i> </td>
				<td onclick="element('Sm');return false;" class="std_block lanthanide">62<br/> <b>Sm</b><br/> <i>150.360</i> </td>
				<td onclick="element('Eu');return false;" class="std_block lanthanide">63<br/> <b>Eu</b><br/> <i>151.966</i> </td>
				<td onclick="element('Gd');return false;" class="std_block lanthanide">64<br/> <b>Gd</b><br/> <i>157.250</i> </td>
				<td onclick="element('Tb');return false;" class="std_block lanthanide">65<br/> <b>Tb</b><br/> <i>158.925</i> </td>
				<td onclick="element('Dy');return false;" class="std_block lanthanide">66<br/> <b>Dy</b><br/> <i>162.500</i> </td>
				<td onclick="element('Ho');return false;" class="std_block lanthanide">67<br/> <b>Ho</b><br/> <i>164.930</i> </td>
				<td onclick="element('Er');return false;" class="std_block lanthanide">68<br/> <b>Er</b><br/> <i>167.260</i> </td>
				<td onclick="element('Tm');return false;" class="std_block lanthanide">69<br/> <b>Tm</b><br/> <i>168.934</i> </td>
				<td onclick="element('Yb');return false;" class="std_block lanthanide">70<br/> <b>Yb</b><br/> <i>173.040</i> </td>
				<td onclick="element('Lu');return false;" class="std_block lanthanide">71<br/> <b>Lu</b><br/> <i>174.967</i> </td>

				<td rowspan="2"> </td>
			</tr>
			<tr class="elem_row"> <!--ACTINIDE SERIES-->

				<td onclick="element("");return fa''e;" class="series" colspan="2"> Actinide Series <br/> <i> 89 - 103 </i> </td></a>

				<td onclick="element('Ac');return false;" class="std_block actinide">89<br/> <b>Ac</b><br/> <i>227.028</i> </td>
				<td onclick="element('Th');return false;" class="std_block actinide">90<br/> <b>Th</b><br/> <i>232.038</i> </td>
				<td onclick="element('Pa');return false;" class="std_block actinide">91<br/> <b>Pa</b><br/> <i>231,036</i> </td>
				<td onclick="element('U');return false;" class="std_block actinide">92<br/> <b>U</b><br/> <i>238.029</i> </td>
				<td onclick="element('Np');return false;" class="std_block actinide">93<br/> <b>Np</b><br/> <i>237.048</i> </td>
				<td onclick="element('Pu');return false;" class="std_block actinide">94<br/> <b>Pu</b><br/> <i>244.064</i> </td>
				<td onclick="element('Am');return false;" class="std_block actinide">95<br/> <b>Am</b><br/> <i>243.061</i> </td>
				<td onclick="element('Cm');return false;" class="std_block actinide">96<br/> <b>Cm</b><br/> <i>247.070</i> </td>
				<td onclick="element('Bk');return false;" class="std_block actinide">97<br/> <b>Bk</b><br/> <i>247.070</i> </td>
				<td onclick="element('Cf');return false;" class="std_block actinide">98<br/> <b>Cf</b><br/> <i>251.080</i> </td>
				<td onclick="element('Es');return false;" class="std_block actinide">99<br/> <b>Es</b><br/> <i>[254]</i> </td>
				<td onclick="element('Fm');return false;" class="std_block actinide">100<br/> <b>Fm</b><br/> <i>257.095</i> </td>
				<td onclick="element('Md');return false;" class="std_block actinide">101<br/> <b>Md</b><br/> <i>258.100</i> </td>
				<td onclick="element('No');return false;" class="std_block actinide">102<br/> <b>No</b><br/> <i>258.101</i> </td>
				<td onclick="element('Lr');return false;" class="std_block actinide">103<br/> <b>Lr</b><br/> <i>[262]</i> </td>
			</tr>
		</table>
	</body>
</html>
