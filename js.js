(function (){
	var infos=document.getElementById("infos");
	infos.innerHTML='<span class="greent"><b>Ready !</b></span>';
})();

function dis(){
	var infos=document.getElementById("infos");
	if(document.getElementById("fi").value != ""){
	infos.innerHTML="<b class='ort'>We are uploading your file(s)... Please wait.</b>";
	var sbu=document.getElementById("sbu");
	//sbu.disabled = true;
	sbu.innerHTML='<div class="spinner"><div class="db1"></div><div class="db2"></div></div>';
	}else{
	event.preventDefault();
	infos.innerHTML='<span class="redt"><b>Please fill the input !</b></span>';
	}
}