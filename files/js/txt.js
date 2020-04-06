var changed = false;
var txtFile = "";
var txtPass = "";

function txtReady(file, pass) {
	txtFile = file;
	txtPass = pass;
	//console.log("f: " + file + " p: " + pass);
	setInterval(function(){ txtUpdate(false); }, 1000);
	document.getElementById("textarea").addEventListener("click", function(){ changed = true });
}


function txtUpdate(forced) {
	//console.log("f: " + forced + " c: " + changed);
	if (forced || changed) {
		var body = document.getElementById("textarea").value.replace(/\n/g, "%0A");
		var url = "/txt?f=" + txtFile + "&pass=" + txtPass + "&body=" + body + "&js=set";
		//console.log(url);
		xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
		changed = false;
	}
	return false;
}


function textareaSize() {
	var area = document.getElementById("textarea");
	area.style.height = 0;
	area.style.height = "calc(2rem + " + area.scrollHeight + "px)";
	//console.log(area.value);
	//for (var a in areas) {
		//a.style.height = 0;
		//a.style.height = "calc(2rem + " + a.scrollHeight + "px)";
		//console.log(a.value);
	//}
	return false
}
