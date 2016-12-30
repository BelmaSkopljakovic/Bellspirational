function prikaziDoDeset(str) {
	if (str.length == 0) { 
		document.getElementById("instant_pretraga").innerHTML = "";
		document.getElementById("instant_pretraga").style.border = "0px";
	return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("instant_pretraga").innerHTML = this.responseText;
		  document.getElementById("instant_pretraga").style.border = "1px solid gray";
		}
	}
	xmlhttp.open("GET","instantPretraga.php?q="+str, true);
	xmlhttp.send();
}