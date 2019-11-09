var changed = false;
var txtFile = "";
var txtPass = "";

function txtReady(file, pass) {
	txtFile = file;
	txtPass = pass;
	//console.log("f: " + file + " p: " + pass);
	setInterval(function(){ txtUpdate(false); }, 5000);
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
	$("textarea").each(function(){
		this.style.height = "0";
		this.style.height = "calc(2rem + " + this.scrollHeight + "px)";
		//console.log(this.scrollHeight);
	});
	//console.log("resize");
	return false;
}
