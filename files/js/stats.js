function htmlPrint(loc, text) {
	document.getElementById(loc).innerHTML = text;
	return false;
}

// Print an array of stats
function statOut(stats) {
	for (var q = 0; q < stats.length; q++) {
		for (var i = stats.length-2; i >= q; i--) {
			if (stats[i] < stats[i+1]) {
				var num = stats[i];
				stats[i] = stats[i+1];
				stats[i+1] = num;
			}
		}
	}
	htmlPrint("stat1", stats[0]);
	htmlPrint("stat2", stats[1]);
	htmlPrint("stat3", stats[2]);
	htmlPrint("stat4", stats[3]);
	htmlPrint("stat5", stats[4]);
	htmlPrint("stat6", stats[5]);
	return false;
}
function diceVisible() {
	document.getElementById("stat_box_dice").style.display = "block";
	document.getElementById("stat_box_points").style.display = "none";
}
function pointsVisible() {
	document.getElementById("stat_box_points").style.display = "block";
	document.getElementById("stat_box_dice").style.display = "none";
}

// Roll 4d6 and drop the lowest
function fourDice() {
	diceVisible();
	var stats = [0, 0, 0, 0, 0, 0];
	for (var w = 0; w < 6; w++) {
		var rolls = [0, 0, 0, 0];
		for (var q = 0; q < 4; q++) {
			rolls[q] = Math.floor((Math.random() * 6) + 1); 
		}
		var minNum = 7;
		var minIndex = -1; 
		for (var q = 0; q < 4; q++) {
			if (rolls[q] < minNum) {
				minNum = rolls[q];
				minIndex = q;
			}
		}
		rolls[minIndex] = 0;
		stats[w] = rolls[0] + rolls[1] + rolls[2] + rolls[3]; //*/
	} //*/

	statOut(stats);
	return false;
}
// Roll 1d20
function d20() {
	diceVisible();
	var stats = [0, 0, 0, 0, 0, 0];
	for (var w = 0; w < 6; w++) {
		stats[w] = Math.floor((Math.random() * 20) + 1); 
	}
	statOut(stats);
	return false;
}
// Use standard ability score array
function standard() {
	diceVisible();
	statOut([15, 14, 13, 12, 10, 8]);
	return false;
}
// Reset abilities
function reset() {
	statOut(["X", "X", "X", "X", "X", "X"]);
	return false;
}

// Statistics Variables
var stats = [4, 4, 4, 4, 4, 4];
var points = 27;
//            6   7  8  9 10 11 12 13 14 15
var costs = [-3, -1, 0, 1, 2, 3, 4, 5, 7, 9];

// Reset point buy points and make visible
function pointsReset() {
	pointsVisible();
	// Set all values to 8
	i = 0;
	for (var i = 0; i < 6; i++) {
		//$('#pstat' + i).val(8).change();
		pointChange(8, i);
		document.getElementById("pstat" + i).namedItem("pstat" + i + "_8").selected = 'selected';
	}
	// Reset global variabls
	stats = [8, 8, 8, 8, 8, 8];
	points = 27;
	htmlPrint("available_points", "27");
	return false;
}
function pointChange(newVal, num) {
	// Print new values to each option in changed list
	numID = "pstat" + num + "_";
	i = 6;
	while (i < 16) {
		htmlPrint(numID + i, valComp(i, newVal));
		i++;
	}
	// Apply points cost to total
	var cost = costs[stats[num] - 6] - costs[newVal - 6];
	stats[num] = newVal;
	points = points + cost;
	htmlPrint("available_points", points);
	possibleCheck();
	return false;
}
function valComp(target, current) {
	var fin = target.toString();
	// Find costs
	target = target - 6;
	current = current - 6;
	compCost = costs[current] - costs[target];
	// Generate text repersenation of cost to print
	if (compCost < 0 ) {
		fin = fin + " (" + compCost + ")";
	} else if (compCost > 0) {
		fin = fin + " (+" + compCost + ")";
	}
	return fin;
}
function possibleCheck() {
	// Iterate through each list, and each option on list
	var i = 0;
	while (i < 6) {
		var v = 0;
		while (v < 10) {
			// Check if cost is affordable
			if ((costs[v] - costs[stats[i] - 6]) > points) {
				 document.getElementById("pstat" + i).options[v].disabled = true;
			} else {
				document.getElementById("pstat" + i).options[v].disabled = false;
			}
			v++;
		}
		i++; 
	}
	return false;
}
function valueSetup() {
	// Iterate through lists
	var i = 0;
	while (i < 6) {
		// set values in global stats variable to viewed values
		var val = document.getElementById("pstat" + i);
		val = val.options[val.selectedIndex].value;
		pointChange(val, i);
		stats[i] = val;
		i++; 
	} 
	return false;
} 
