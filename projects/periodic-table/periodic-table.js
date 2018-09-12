var elements = {
	//"Sym":[Num, "Name", Mass, "Type", "Electron Configuration (Noble Gas Notation)", "Xval3"],
	"":["", "", "", "", ""],
	"H":[1, "Hydrogen", "1.008", "Nonmetal", "Xval2", "Xval3"],
	"He":[2, "Helium", "4.003", "Noble Gas", "Xval2", "Xval3"],

	"Li":[3, "Lithium", "6.941", "Alkali Metal", "Xval2", "Xval3"],
	"Be":[4, "Beryllium", "9.012", "Alkaline Earth Metal", "Xval2", "Xval3"],
	"B":[5, "Boron", "10.811", "Metaloid", "Xval2", "Xval3"],
	"C":[6, "Carbon", "12.011", "Nonmetal", "Xval2", "Xval3"],
	"N":[7, "Nitrogen", "14.007", "Nonmetal", "Xval2", "Xval3"],
	"O":[8, "Oxygen", "15.999", "Nonmetal", "Xval2", "Xval3"],
	"F":[9, "Flourine", "18.998", "Halogen", "Xval2", "Xval3"],
	"Ne":[10, "Neon", "20.180", "Noble Gas", "Xval2", "Xval3"],

	"Na":[11, "Sodium", "22.990", "Alkali Metal", "Xval2", "Xval3"],
	"Mg":[12, "Magnesium", "24.305", "Alkaline Earth Metal", "Xval2", "Xval3"],
	"Al":[13, "Aluminum", "26.982", "Basic Metal", "Xval2", "Xval3"],
	"Si":[14, "Silicon", "28.086", "Metaloid", "Xval2", "Xval3"],
	"P":[15, "Phosphorus", "30.974", "Nonmetal", "Xval2", "Xval3"],
	"S":[16, "Sulfur", "32.066", "Nonmetal", "Xval2", "Xval3"],
	"Cl":[17, "Chlorine", "35.453", "Halogen", "Xval2", "Xval3"],
	"Ar":[18, "Argon", "39.948", "Noble Gas", "Xval2", "Xval3"],

	"K":[19, "Potassium", "39.098", "Alkali Metal", "Xval2", "Xval3"],
	"Ca":[20, "Calcium", "40.078", "Alkaline Earth Metal", "Xval2", "Xval3"],
	"Sc":[21, "Scandium", "44.956", "Transition Metal", "Xval2", "Xval3"],
	"Ti":[22, "Titanium", "47.880", "Transition Metal", "Xval2", "Xval3"],
	"V":[23, "Vanadium", "50.942", "Transition Metal", "Xval2", "Xval3"],
	"Cr":[24, "Chromium", "51.996", "Transition Metal", "Xval2", "Xval3"],
	"Mn":[25, "Manganese", "54.938", "Transition Metal", "Xval2", "Xval3"],
	"Fe":[26, "Iron", "55.933", "Transition Metal", "Xval2", "Xval3"],
	"Co":[27, "Cobalt", "58.933", "Transition Metal", "Xval2", "Xval3"],
	"Ni":[28, "Nickel", "58.693", "Transition Metal", "Xval2", "Xval3"],
	"Cu":[29, "Copper", "63.546", "Transition Metal", "Xval2", "Xval3"],
	"Zn":[30, "Zinc", "65.390", "Transition Metal", "Xval2", "Xval3"],
	"Ga":[31, "Gallium", "69.732", "Basic Metal", "Xval2", "Xval3"],
	"Ge":[32, "Germanium", "72.610", "Metaloid", "Xval2", "Xval3"],
	"As":[33, "Arsenic", "74.922", "Metaloid", "Xval2", "Xval3"],
	"Se":[34, "Selenium", "78.090", "Nonmetal", "Xval2", "Xval3"],
	"Br":[35, "Bromine", "79.904", "Halogen", "Xval2", "Xval3"],
	"Kr":[36, "Krypton", "84.800", "Noble Gas", "Xval2", "Xval3"],

	"Rb":[37, "Rubidium", "84.468", "Alkali Metal", "Xval2", "Xval3"],
	"Sr":[38, "Strontium", "87.620", "Alkaline Earth Metal", "Xval2", "Xval3"],
	"Y":[39, "Yttrium", "88.906", "Transition Metal", "Xval2", "Xval3"],
	"Zr":[40, "Zirconium", "91.224", "Transition Metal", "Xval2", "Xval3"],
	"Nb":[41, "Niobium", "92.906", "Transition Metal", "Xval2", "Xval3"],
	"Mo":[42, "Molybdenum", "95.940", "Transition Metal", "Xval2", "Xval3"],
	"Tc":[43, "Technetium", "98.907", "Transition Metal", "Xval2", "Xval3"],
	"Ru":[44, "Ruthenium", "101.070", "Transition Metal", "Xval2", "Xval3"],
	"Rh":[45, "Rhodium", "102.906", "Transition Metal", "Xval2", "Xval3"],
	"Pd":[46, "Palladium", "106.420", "Transition Metal", "Xval2", "Xval3"],
	"Ag":[47, "Silver", "107.868", "Transition Metal", "Xval2", "Xval3"],
	"Cd":[48, "Cadmium", "112.411", "Transition Metal", "Xval2", "Xval3"],
	"In":[49, "Indium", "114.818", "Basic Metal", "Xval2", "Xval3"],
	"Sn":[50, "Tin", "118.710", "Basic Metal", "Xval2", "Xval3"],
	"Sb":[51, "Antimony", "121.760", "Metaloid", "Xval2", "Xval3"],
	"Te":[52, "Tellurium", "127.600", "Metaloid", "Xval2", "Xval3"],
	"I":[53, "Iodine", "126.904", "Halogen", "Xval2", "Xval3"],
	"Xe":[54, "Xenon", "131.290", "Noble Gas", "Xval2", "Xval3"],

	"Cs":[55, "Ceslium", "132.905", "Alkali Metal", "Xval2", "Xval3"],
	"Ba":[56, "Barium", "137.327", "Alkaline Earth Metal", "Xval2", "Xval3"],

	"La":[57, "Lanthanum", "138.906", "Lanthanide", "Xval2", "Xval3"],
	"Ce":[58, "Cerium", "140.115", "Lanthanide", "Xval2", "Xval3"],
	"Pr":[59, "Praseodymium", "140.908", "Lanthanide", "Xval2", "Xval3"],
	"Nd":[60, "Neodymium", "144.240", "Lanthanide", "Xval2", "Xval3"],
	"Pm":[61, "Promethium", "144.913", "Lanthanide", "Xval2", "Xval3"],
	"Sm":[62, "Samarium", "150.360", "Lanthanide", "Xval2", "Xval3"],
	"Eu":[63, "Europium", "151.966", "Lanthanide", "Xval2", "Xval3"],
	"Gd":[64, "Gadolinium", "157.250", "Lanthanide", "Xval2", "Xval3"],
	"Tb":[65, "Terbium", "158.925", "Lanthanide", "Xval2", "Xval3"],
	"Dy":[66, "Dysprosium", "162.500", "Lanthanide", "Xval2", "Xval3"],
	"Ho":[67, "Holmium", "164.930", "Lanthanide", "Xval2", "Xval3"],
	"Er":[68, "Erbium", "167.260", "Lanthanide", "Xval2", "Xval3"],
	"Tm":[69, "Thulium", "168.934", "Lanthanide", "Xval2", "Xval3"],
	"Yb":[70, "Ytterbium", "173.040", "Lanthanide", "Xval2", "Xval3"],
	"Lu":[71, "Lutetium", "174.", "Lanthanide", "Xval2", "Xval3"],

	"Hf":[72, "Hafnium", "178.490", "Transition Metal", "Xval2", "Xval3"],
	"Ta":[73, "Tantalum", "180.948", "Transition Metal", "Xval2", "Xval3"],
	"W":[74, "Tungsten", "183.850", "Transition Metal", "Xval2", "Xval3"],
	"Re":[75, "Rhenium", "168.207", "Transition Metal", "Xval2", "Xval3"],
	"Os":[76, "Osmium", "190.230", "Transition Metal", "Xval2", "Xval3"],
	"Ir":[77, "Iridium", "192.220", "Transition Metal", "Xval2", "Xval3"],
	"Pt":[78, "Platinum", "195.080", "Transition Metal", "Xval2", "Xval3"],
	"Au":[79, "Gold", "196.967", "Transition Metal", "Xval2", "Xval3"],
	"Hg":[80, "Mercury", "200.590", "Transition Metal", "Xval2", "Xval3"],
	"Tl":[81, "Thallium", "204.383", "Basic Metal", "Xval2", "Xval3"],
	"Pb":[82, "Lead", "207.200", "Basic Metal", "Xval2", "Xval3"],
	"Bi":[83, "Bismuth", "208.980", "Basic Metal", "Xval2", "Xval3"],
	"Po":[84, "Polonium", "208.982", "Metaloid", "Xval2", "Xval3"],
	"At":[85, "Astantine", "209.987", "Halogen", "Xval2", "Xval3"],
	"Rn":[86, "Radon", "222.018", "Noble Gas", "Xval2", "Xval3"],

	"Fr":[87, "Francium", "223.020", "Alkali Metal", "Xval2", "Xval3"],
	"Ra":[88, "Radium", "226.025", "Alkaline Earth Metal", "Xval2", "Xval3"],

	"Ac":[89, "Actinium", "227.028", "Actinide", "Xval2", "Xval3"],
	"Th":[90, "Thornium", "232.038", "Actinide", "Xval2", "Xval3"],
	"Pa":[91, "Protactinium", "231,036", "Actinide", "Xval2", "Xval3"],
	"U":[92, "Uranium", "238.029", "Actinide", "Xval2", "Xval3"],
	"Np":[93, "Neptunium", "237.048", "Actinide", "Xval2", "Xval3"],
	"Pu":[94, "Plutonium", "244.064", "Actinide", "Xval2", "Xval3"],
	"Am":[95, "Americium", "243.061", "Actinide", "Xval2", "Xval3"],
	"Cm":[96, "Curium", "247.070", "Actinide", "Xval2", "Xval3"],
	"Bk":[97, "Berkelium", "247.070", "Actinide", "Xval2", "Xval3"],
	"Cf":[98, "Californium", "251.080", "Actinide", "Xval2", "Xval3"],
	"Es":[99, "Einsteinium", "[254]", "Actinide", "Xval2", "Xval3"],
	"Fm":[100, "Fernium", "257.095", "Actinide", "Xval2", "Xval3"],
	"Md":[101, "Mendelevium", "258.100", "Actinide", "Xval2", "Xval3"],
	"No":[102, "Nobelium", "258.101", "Actinide", "Xval2", "Xval3"],
	"Lr":[103, "Lawrencium", "[262]", "Actinide", "Xval2", "Xval3"],

	"Rf":[104, "Rutherfordium", "[261]", "Transition Metal", "Xval2", "Xval3"],
	"Db":[105, "Dubnium", "[262]", "Transition Metal", "Xval2", "Xval3"],
	"Sg":[106, "Seaborgium", "[266]", "Transition Metal", "Xval2", "Xval3"],
	"Bh":[107, "Bohrium", "[264]", "Transition Metal", "Xval2", "Xval3"],
	"Hs":[108, "Hassium", "[269]", "Transition Metal", "Xval2", "Xval3"],
	"Mt":[109, "Meitnerium", "[268]", "Transition Metal", "Xval2", "Xval3"],
	"Ds":[110, "Darmstadium", "[269]", "Transition Metal", "Xval2", "Xval3"],
	"Rg":[111, "Roentgenium", "[272]", "Transition Metal", "Xval2", "Xval3"],
	"Cn":[112, "Copernicium", "[277]", "Transition Metal", "Xval2", "Xval3"],
	"Uut":[113, "Ununtrium", "unknown", "Basic Metal", "Xval2", "Xval3"],
	"Fl":[114, "Flerovium", "[289]", "Basic Metal", "Xval2", "Xval3"],
	"Uup":[115, "Ununpentium", "unknown", "Basic Metal", "Xval2", "Xval3"],
	"Lv":[116, "Livermorium", "[298]", "Basic Metal", "Xval2", "Xval3"],
	"Uus":[117, "Ununseptium", "unknown", "Halogen", "Xval2", "Xval3"],
	"Uuo":[118, "Ununoctium", "unknown", "Noble Gas", "Xval2", "Xval3"],
}
function htmlPrint(loc, text) {
	document.getElementById(loc).innerHTML = text;
	return false;
}
// Display new element details
function element(symbol) {
	var fin = "<div><p><span id=\"a_num\">" + elements[symbol][0] + "</span> | ";
	fin += "<span id=\"a_m\">" + elements[symbol][2];
	if (elements[symbol][2] == "unknown") {
		fin += "</span><br/>";
	} else {
		fin += " amu</span><br/>";
	}
	fin += "<span id=\"a_sym\"> " + symbol + "</span><br/>";
	fin += "<span id=\"a_name\">" + elements[symbol][1] + "</span><br/>";
	fin += "<span id=\"a_m\">" + elements[symbol][3] + "<br/>";
	//ELECTRON CONFIGURATION
	var num = elements[symbol][0];
	if (num <= 2) {
		var ec = "";
		var line = 1;
	} else if (num <= 10) {
		var ec = "[He]";
		var line = 2;
		num -= 2;
	} else if (num <= 18) {
		var ec = "[Ne]";
		var line = 3;
		num -= 10;
	} else if (num <= 36) {
		var ec = "[Ar]";
		var line = 4;
		num -= 18;
	} else if (num <= 54) {
		var ec = "[Kr]";
		var line = 5;
		num -= 36;
	} else if (num <= 86) {
		var ec = "[Xe]";
		var line = 6;
		num -= 54;
	} else if (num <= 118) {
		var ec = "[Rn]";
		var line = 7;
		num -= 86;
	}
	var shell = 1;
	while (num > 0) {
		ec += " ";
		if (shell == 1) {
			if (num == 1) {
				ec += line + "s<sup>1</sup>";
				num = 0;
			} else {
				ec += line + "s<sup>2</sup>";
				num -= 2;
			}
			shell++;
		} else if (shell == 2) {
			if (line <= 3) {
				ec += line + "p<sup>" + num + "</sup>";
				num -= num;
			} else if (line <= 5) {
				if (num <= 10) {
					ec += (line-1) + "d<sup>" + num + "</sup>";
					num -= num;
				} else {
					ec += (line-1) + "d<sup>10</sup>";
					num -= 10;
				}
			} else {
				if (num <= 14) {
					ec += (line-2) + "f<sup>" + num + "</sup>";
					num -= num;
				} else {
					ec += (line-2) + "f<sup>14</sup>";
					num -= 14;
				}
			}
			shell++;
		} else if (shell == 3) {
			if (line <= 5) {
				ec += line + "p<sup>" + num + "</sup>";
				num -= num;
			} else {
				if (num <= 10) {
					ec += (line-1) + "d<sup>" + num + "</sup>";
					num -= num;
				} else {
					ec += (line-1) + "d<sup>10</sup>";
					num -= 10;
				}
			}
		} else {
			ec += line + "p<sup>" + num + "</sup>";
			num -= num;
		}
	}
	fin += ec + "</span><br/>";
	fin += "</p></div>"
	htmlPrint("big", fin);
	return false;
}
// Reset display block to default dumb info
/*function reset() {
	htmlPrint("big", "<div ><p><span id=\"a_num\">Atomic Number</span> | Mass<br/><span id=\"a_sym\">Sym</span> <br/><span id=\"a_name\">Name</span><br/><span id=\"a_m\">Type<br/>Electron Configuration</span></p></div>");
	return false;
} //*/
$(document).ready(function () {
  $('.elem_row').find('.std_block').not(':first-child').on('mouseenter mouseleave', function () {
    var i = $(this).index();
	if ($(this).hasClass("lanthanide")) {
		$("row6").toggleClass("num_hl");
	} else if ($(this).hasClass("actinide")) {
		$("row7").toggleClass("num_hl");
	} else {
		$(this).closest('tr').find('td').first().toggleClass('num_hl');
	}

    //$(this).toggleClass('bg');

    $('.tops_nums td').eq(i).toggleClass('num_hl');
  });
});
