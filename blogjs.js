//opmaak modus inschakelen
function iframe(){
	editor.document.designMode = "on";
}
//vet gedrukt
function bold(){
	editor.document.execCommand("bold", false, null);
}
//schuin
function italic(){
	editor.document.execCommand("italic", false, null);
}
//onderstrepen
function underline(){
	editor.document.execCommand("underline", false, null);
}
//invulveld-iframe submitten
function formsubmit(){
	document.getElementById("naam");
	document.getElementById("blogtitel");
	document.getElementById("blogtekstinvoer").value = window.frames["editor"].document.body.innerHTML;
	document.getElementById("login").submit();
}
