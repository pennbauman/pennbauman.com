function txtUpdate(file, pass) {
	var body = document.getElementById("textarea").innerHTML;
	console.log(body);
	var url = "/txt?f=" + file + "&pass=" + pass + "&body=" + body + "&js=set";
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	console.log("response: " + xmlhttp.responseText);
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
