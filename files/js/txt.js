function txtUpdate(file, pass) {
	var body = document.getElementById("textarea").innerHTML;
	var url = "/txt?f=" + file + "&pass=" + pass + "&body=" + body + "&js=set";
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			return xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", url, false );
	xmlhttp.send();

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
